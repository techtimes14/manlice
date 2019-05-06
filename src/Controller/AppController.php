<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
//use Cake\Controller\Component\CookieComponent;
use Cake\Event\Event;
use Crypt\Crypt;
use Cake\ORM\TableRegistry;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public $paginationLimit = 5;
	
	public function initialize(){
        parent::initialize();
        $this->addCrpyt();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');
        $this->Cookie->name = 'RememberMe';
        $this->Cookie->time = 3600*720;  // or '30 days'
        $this->Cookie->path = '/listoffer/';
        $this->Cookie->domain = 'localhost';
        $this->Cookie->secure = false;  // i.e. only sent if using secure HTTPS
        $this->Cookie->key = 'qSI232qs*&sXOw!adre@34SAv!@*(XSL#$%)asGb$@11~_+!@#HKis~#^';
        $this->Cookie->httpOnly = true;

        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => '/'
            ],
            'loginRedirect' => [
                'controller' => 'users',
                'action' => 'myAccount'
            ],
            'logoutRedirect' => [
                'controller' => '/'
            ],
            'authError' => 'Invalid Credentials.',
            'authenticate' => [
                'Form' => [
                    'userModel' => DB_PREFIX.'users',
                    'fields' => ['username' => 'email', 'password' => 'password'],
                    'scope' => [DB_PREFIX.'users.status' => 'A']
                ]
            ],
            'storage' => [
                            'className' => 'Session',
                            'key' => 'Auth.Users'
                        ]
        ]);
        // access auth data as $Auth in view page
        
        $site_settings = $this->getSiteSettings();
        $this->RememberMe();
        $this->set('Auth', $this->Auth->user());
        		
		$user_related_details = '';
		if(!empty($this->Auth->user())){
			$userdata = $this->request->session()->read('Auth.Users');
			$UsersTable = TableRegistry::get('Users');
			$user_related_details = $UsersTable->get($userdata['id']);
		}		
		$this->set(compact('site_settings'));
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    /**
     * [RememberMe function is for checking whether user clicked on remember me or not previously.]
     */
    public function RememberMe(){
        $session = $this->request->session();
        if($session->read('Users.remember_me')!=''){
			$this->Cookie->write('RememberMe', $session->read('Users.remember_me'));
			$session->delete('Users.remember_me');
        }
        if($session->read('Users.logout')!=''){
          $this->Cookie->delete('RememberMe');
          $session->delete('Users.logout');
        }
        $user = TableRegistry::get('Users');
        if($this->Cookie->read('RememberMe')!=''){
          $user_data = $user->get($this->Cookie->read('RememberMe'));
          return $this->Auth->setUser($user_data);
        }
    }

    /**
     * [addCrpyt for password hassing]
     */
    public function addCrpyt()
    {
        require_once(ROOT . '/vendor' . DS  . 'Crypt' . DS . 'Crypt.php');
        /*
        * usage to hash $this->Crypt->hash(stringToHash)
        * usage to unhash $this->Crypt->unhash(hashedString)
        */
        $this->Crypt = new Crypt();
    }

    /**
     * [getSiteSettings for getting website settings.]
     * @return [Array Object] [all website settings data from the database]
     */
    public function getSiteSettings(){
        $settings = TableRegistry::get('Admin.CommonSetting');
        $site_settings = $settings->find('all')->first();
        return $site_settings;
    }
	
	/**
     * [getUserIP function is for to get user ip address]
     */
    public function getUserIP(){
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        if(filter_var($client, FILTER_VALIDATE_IP)){
            $ip = $client;
        }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
            $ip = $forward;
        }else{
            $ip = $remote;
        }
		return $ip;
    }

    /**
     * [generateRandomString to generate a random string all over the site sing this function]
     * @param  integer $length [length of the string default 10 ]
     * @return [String]
     */
    public function generateRandomString($length = 10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * [isDataExist for check if any data exist in the database or not]
     * @param  [string]  $modelName     [model name]
     * @param  [string]  $fieldName [field name which need to check]
     * @param  [stsing]  $data      [data to check]
     * @return boolean            [will return true if email exist]
     */
    public function isDataExist($modelName = NULL, $fieldName = NULL, $data = NULL){
        $tbl_reg = TableRegistry::get($modelName);
        $data = $tbl_reg->find('all', array('conditions'=>array($modelName.'.'.$fieldName => $data)))->toArray();
        if (empty($data)) {
            return false;
        } else {
            return true;
        }
    }    
    //getCmsData
	public function getCmsData($page_id=NULL){
        $CmsTable = TableRegistry::get('Cms');
        $data = $CmsTable->find('all',['conditions'=>['id'=>$page_id],'fields'=>['id','title','description']])->first()->toArray();
		return $data;
    }
	
	//getPrice
	public function getPrice(){
		$priceTable = TableRegistry::get('Price');
		$allprices	= $priceTable->find('all',['conditions'=>['status'=>'A'],'order'=>['id asc']]);
		return $allprices;
	}
	
	//getPlan
	public function getPlan(){
		$planTable = TableRegistry::get('Plan');
		$allplans	= $planTable->find('all',['conditions'=>['status'=>'A'],'order'=>['id asc']]);
		return $allplans;
	}
	
	//getMortgageStatus
	public function getMortgageStatus(){
		$mortgageTable	= TableRegistry::get('MortgageStatus');
		$allmortgage	= $mortgageTable->find('all',['conditions'=>['status'=>'A'],'order'=>['id asc']]);
		return $allmortgage;
	}
	
	//getProperty
	public function getProperty(){
		$propertyTable	= TableRegistry::get('Property');
		$allproperties	= $propertyTable->find('all',['conditions'=>['status'=>'A'],'order'=>['id asc']]);
		return $allproperties;
	}
	
	//getStateCityZipcode
	public function getStateCityZipcode(){
		ini_set('memory_limit','256M');
		$stateCityZipcodeTable 	= TableRegistry::get('StateCityZipcode');
		$data					= $stateCityZipcodeTable->find('all',['fields'=>['id','state_code'],'group'=>['state_code'],'order'=>['state_code asc']]);
		return $data;
	}
	
	//checkingStateCityZipcode
	public function checkingStateCityZipcode($zipcode=NULL){
		ini_set('memory_limit','256M');
		$stateCityZipcodeTable 	= TableRegistry::get('StateCityZipcode');
		$data					= $stateCityZipcodeTable->find('all',['conditions'=>['zip'=>$zipcode],'fields'=>['id','city','state_code'],'order'=>['state_code asc']])->first();
		return $data;
	}
}