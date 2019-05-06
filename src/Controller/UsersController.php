<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Routing\Router;

class UsersController extends AppController{
	public function beforeFilter(Event $event){
        parent::beforeFilter($event);
		$this->loadComponent('Email');
		$this->Cookie->configKey('User', [
            'expires' => '+10 days',
            'httpOnly' => true
        ]);
		
        $this->Auth->allow(['iambuyingStep1','iambuyingStep2','iambuyingStep3','iambuyingStep4','iambuyingStep5','iambuyingStep6','iambuyingStep7','iambuyingStep8','iamsellingStep1','iamsellingStep2','iamsellingStep3','iamsellingStep3ZipcodeChecking','iamsellingStep4','iamsellingStep5','iamsellingStep6','iamsellingStep7','iamsellingStep8','iamsellingStep9','iamsellingStep10','iamsellingStep11','iamsellingStep12','iamsellingbuyingStep1','iamsellingbuyingStep2','iamsellingbuyingStep3','iamsellingbuyingStep3ZipcodeChecking','iamsellingbuyingStep4','iamsellingbuyingStep5','iamsellingbuyingStep6','iamsellingbuyingStep7','iamsellingbuyingStep8','iamsellingbuyingStep9','iamsellingbuyingStep10','iamsellingbuyingStep11','iamsellingbuyingStep12']);
    }
    
	/********************* I'm Buying Section Start Here ************************/
    public function iambuyingStep1(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->delete('iambuying');
			$session->write('iambuying','');
			$all_prices	= $this->getPrice();
			$this->set(compact('all_prices'));
		}
    }
	public function iambuyingStep2(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iambuying.'.'price_id', $this->request->data['iambuying_price_id']);
			$all_states	= $this->getStateCityZipcode();
			$this->set(compact('all_states'));
		}
    }
	public function iambuyingStep3(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iambuying.'.'city', $this->request->data['iambuying_city']);
			$session->write('iambuying.'.'state_code', $this->request->data['iambuying_state_code']);
			$all_plans	= $this->getPlan();
			$this->set(compact('all_plans'));
		}
    }
	public function iambuyingStep4(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iambuying.'.'plan_id', $this->request->data['iambuying_plan_id']);
			$all_mortgage	= $this->getMortgageStatus();
			$this->set(compact('all_mortgage'));
		}
    }
	public function iambuyingStep5(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iambuying.'.'mortgage_id', $this->request->data['iambuying_mortgage_id']);
		}
    }
	public function iambuyingStep6(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iambuying.'.'iambuying_fullname', $this->request->data['iambuying_fullname']);
		}
    }
	public function iambuyingStep7(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iambuying.'.'iambuying_email', $this->request->data['iambuying_email']);
		}
    }
	public function iambuyingStep8(){
		if($this->request->is('post')){
			$session = $this->request->session();			
			$user_data['email'] 		= $session->read('iambuying.'.'iambuying_email');
			$user_data['password'] 		= 123456;
			$user_data['full_name'] 	= $session->read('iambuying.'.'iambuying_fullname');
			$user_data['phone'] 		= $this->request->data('iambuying_phone');
			$user_data['signup_ip'] 	= $this->getUserIP();
			$user_data['is_verified'] 	= 1;
			$user_data['created'] 		= date('Y-m-d H:i:s');
			$user_data['status'] 		= 'A';
			
			$userTable = TableRegistry::get('Users');
			$user = $userTable->newEntity();
			$create_user = $userTable->patchEntity($user,$user_data);			  
			if($userTable->save($create_user)) {
				$session->write('iambuying.'.'user_id', $create_user->id);
				$session->write('iambuying.'.'user_type', 'B');
				$session->write('iambuying.'.'created', date('Y-m-d H:i:s'));
				$session->write('iambuying.'.'modified', date('Y-m-d H:i:s'));
				
				$submissionTable = TableRegistry::get('Submission');
				$newSubmission = $submissionTable->newEntity();
				$data_to_insert = $submissionTable->patchEntity($newSubmission, $session->read('iambuying'));
				$submissionTable->save($data_to_insert);				
			}
			$session->delete('iambuying');
			$session->write('iambuying','');
		}
    }
	/********************* I'm Buying Section End Here ************************/

	/********************* I'm Selling Section Start Here ************************/
    public function iamsellingStep1(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->delete('iamselling');
			$session->write('iamselling','');
			$session->delete('iambuying');
			$session->write('iambuying','');
			$all_prices	= $this->getPrice();
			$this->set(compact('all_prices'));
		}
    }
	public function iamsellingStep2(){
		if($this->request->is('post')){
			$session = $this->request->session();			
			$session->write('iamselling.'.'price_id', $this->request->data['iamselling_price_id']);
			$all_properties	= $this->getProperty();
			$this->set(compact('all_properties'));
		}
    }
	public function iamsellingStep3(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamselling.'.'property_id', $this->request->data['iamselling_property_id']);
		}
    }
	public function iamsellingStep3ZipcodeChecking(){
		$this->render(false);
		if($this->request->is('post')){
			$session = $this->request->session();
			$exist = $this->checkingStateCityZipcode($this->request->data['iamselling_zipcode']);
			if($exist){
				$session->write('iamselling.'.'city', $exist['city']);
				$session->write('iamselling.'.'statecode', $exist['state_code']);
				echo 'exist';
			}else{
				echo 'not exist';
			}
		}
    }	
	public function iamsellingStep4(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamselling.'.'zip_code', $this->request->data['iamselling_zipcode']);
			$iamselling_city 		= $session->read('iamselling.'.'city');
			$iamselling_statecode 	= $session->read('iamselling.'.'statecode');
			$all_states	= $this->getStateCityZipcode();
			$this->set(compact('iamselling_city','iamselling_statecode','all_states'));
		}
    }
	public function iamsellingStep5(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamselling.'.'street_address', $this->request->data['iamselling_street_address']);
			$session->write('iamselling.'.'city', $this->request->data['iamselling_city']);
			$session->write('iamselling.'.'state_code', $this->request->data['iamselling_state_code']);
		}
    }
	public function iamsellingStep6(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamselling.'.'iamselling_fullname', $this->request->data['iamselling_fullname']);			
		}
    }
	public function iamsellingStep7(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamselling.'.'iamselling_email', $this->request->data['iamselling_email']);
			$user_data['email'] 		= $this->request->data['iamselling_email'];
			$user_data['password'] 		= 123456;
			$user_data['full_name'] 	= $session->read('iamselling.'.'iamselling_fullname');
			$user_data['signup_ip'] 	= $this->getUserIP();
			$user_data['is_verified'] 	= 1;
			$user_data['created'] 		= date('Y-m-d H:i:s');
			$user_data['status'] 		= 'A';
			
			$userTable = TableRegistry::get('Users');
			$user = $userTable->newEntity();
			$create_user = $userTable->patchEntity($user,$user_data);			  
			if($userTable->save($create_user)) {
				$session->write('iamselling.'.'user_id', $create_user->id);
				$session->write('iamselling.'.'user_type', 'S');
				$session->write('iamselling.'.'created', date('Y-m-d H:i:s'));
				$session->write('iamselling.'.'modified', date('Y-m-d H:i:s'));
				
				$submissionTable = TableRegistry::get('Submission');
				$newSubmission = $submissionTable->newEntity();
				$data_to_insert = $submissionTable->patchEntity($newSubmission, $session->read('iamselling'));
				$submissionTable->save($data_to_insert);
			}
		}
    }
	public function iamsellingStep8(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$all_prices	= $this->getPrice();
			$this->set(compact('all_prices'));
		}
    }
	public function iamsellingStep9(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iambuying.'.'price_id', $this->request->data['iambuying_price_id']);
			$iambuying_city 		= $session->read('iamselling.'.'city');
			$iambuying_state_code 	= $session->read('iamselling.'.'state_code');
			$all_states	= $this->getStateCityZipcode();
			$this->set(compact('iambuying_city','iambuying_state_code','all_states'));
		}
    }
	public function iamsellingStep10(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iambuying.'.'city', $this->request->data['iambuying_city']);
			$session->write('iambuying.'.'state_code', $this->request->data['iambuying_state_code']);
			$all_plans	= $this->getPlan();
			$this->set(compact('all_plans'));
		}
    }
	public function iamsellingStep11(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iambuying.'.'plan_id', $this->request->data['iambuying_plan_id']);			
			$all_mortgage	= $this->getMortgageStatus();
			$this->set(compact('all_mortgage'));
		}
    }
	public function iamsellingStep12(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iambuying.'.'mortgage_id', $this->request->data['iambuying_mortgage_id']);
			
			$user_id = $session->read('iamselling.'.'user_id');
			if($user_id != '') {
				$session->write('iambuying.'.'user_id', $user_id);
				$session->write('iambuying.'.'user_type', 'B');
				$session->write('iambuying.'.'created', date('Y-m-d H:i:s'));
				$session->write('iambuying.'.'modified', date('Y-m-d H:i:s'));
				
				$submissionTable 			= TableRegistry::get('Submission');
				$newSubmission1 			= $submissionTable->newEntity();
				$data_to_insert_for_buying 	= $submissionTable->patchEntity($newSubmission1, $session->read('iambuying'));
				$submissionTable->save($data_to_insert_for_buying);				
			}
			$session->delete('iamselling');
			$session->write('iamselling','');
			$session->delete('iambuying');
			$session->write('iambuying','');
		}
    }
	/********************* I'm Selling Section End Here ************************/
	
	/********************* I'm Selling Buying Section Start Here ************************/
    public function iamsellingbuyingStep1(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->delete('iamsellingbuying');
			$session->write('iamsellingbuying','');
			$all_prices	= $this->getPrice();
			$this->set(compact('all_prices'));
		}
    }
	public function iamsellingbuyingStep2(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamsellingbuying.'.'price_id', $this->request->data['iamsellingbuying_price_id']);
			$all_properties	= $this->getProperty();
			$this->set(compact('all_properties'));
		}
    }
	public function iamsellingbuyingStep3(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamsellingbuying.'.'property_id', $this->request->data['iamsellingbuying_property_id']);
		}
    }
	public function iamsellingbuyingStep3ZipcodeChecking(){
		$this->render(false);
		if($this->request->is('post')){
			$session = $this->request->session();
			$exist = $this->checkingStateCityZipcode($this->request->data['iamsellingbuying_zipcode']);
			if($exist){
				$session->write('iamsellingbuying.'.'city', $exist['city']);
				$session->write('iamsellingbuying.'.'statecode', $exist['state_code']);
				echo 'exist';
			}else{
				echo 'not exist';
			}
		}
    }	
	public function iamsellingbuyingStep4(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamsellingbuying.'.'zip_code', $this->request->data['iamsellingbuying_zipcode']);
			$iamsellingbuying_city 		= $session->read('iamsellingbuying.'.'city');
			$iamsellingbuying_statecode = $session->read('iamsellingbuying.'.'statecode');
			$all_states	= $this->getStateCityZipcode();
			$this->set(compact('iamsellingbuying_city','iamsellingbuying_statecode','all_states'));
		}
    }
	public function iamsellingbuyingStep5(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamsellingbuying.'.'street_address', $this->request->data['iamsellingbuying_street_address']);
			$session->write('iamsellingbuying.'.'city', $this->request->data['iamsellingbuying_city']);
			$session->write('iamsellingbuying.'.'state_code', $this->request->data['iamsellingbuying_state_code']);
		}
    }
	public function iamsellingbuyingStep6(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamsellingbuying.'.'full_name', $this->request->data['iamsellingbuying_fullname']);			
		}
    }
	public function iamsellingbuyingStep7(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamsellingbuying.'.'email', $this->request->data['iamsellingbuying_email']);
		}
    }
	public function iamsellingbuyingStep8(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamsellingbuying.'.'phone', $this->request->data['iamsellingbuying_phone']);
			
			$user_data['email'] 		= $session->read('iamsellingbuying.'.'email');
			$user_data['password'] 		= 123456;
			$user_data['full_name'] 	= $session->read('iamsellingbuying.'.'full_name');
			$user_data['signup_ip'] 	= $this->getUserIP();
			$user_data['is_verified'] 	= 1;
			$user_data['created'] 		= date('Y-m-d H:i:s');
			$user_data['status'] 		= 'A';
			
			$userTable = TableRegistry::get('Users');
			$user = $userTable->newEntity();
			$create_user = $userTable->patchEntity($user,$user_data);			  
			if($userTable->save($create_user)) {
				$session->write('iamsellingbuying.'.'userid', $create_user->id);
				
				$for_selling['user_id'] 		= $create_user->id;
				$for_selling['user_type'] 		= 'S';
				$for_selling['price_id'] 		= $session->read('iamsellingbuying.'.'price_id');
				$for_selling['street_address'] 	= $session->read('iamsellingbuying.'.'street_address');
				$for_selling['zip_code'] 		= $session->read('iamsellingbuying.'.'zip_code');
				$for_selling['city'] 			= $session->read('iamsellingbuying.'.'city');
				$for_selling['state_code'] 		= $session->read('iamsellingbuying.'.'state_code');
				$for_selling['property_id'] 	= $session->read('iamsellingbuying.'.'property_id');
				$for_selling['created'] 		= date('Y-m-d H:i:s');
				$for_selling['modified'] 		= date('Y-m-d H:i:s');
				
				$submissionTable = TableRegistry::get('Submission');
				$newSubmission = $submissionTable->newEntity();
				$data_to_insert = $submissionTable->patchEntity($newSubmission, $for_selling);
				$submissionTable->save($data_to_insert);
			}			
			$all_prices	= $this->getPrice();
			$this->set(compact('all_prices'));
		}
    }
	public function iamsellingbuyingStep9(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamsellingbuying.'.'price_id1', $this->request->data['iamsellingbuying_price_id1']);
			$iamsellingbuying_city 			= $session->read('iamsellingbuying.'.'city');
			$iamsellingbuying_state_code 	= $session->read('iamsellingbuying.'.'state_code');
			$all_states	= $this->getStateCityZipcode();
			$this->set(compact('iamsellingbuying_city','iamsellingbuying_state_code','all_states'));
		}
    }
	public function iamsellingbuyingStep10(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamsellingbuying.'.'city1', $this->request->data['iamsellingbuying_city1']);
			$session->write('iamsellingbuying.'.'state_code1', $this->request->data['iamsellingbuying_state_code1']);
			$all_plans	= $this->getPlan();
			$this->set(compact('all_plans'));
		}
    }
	public function iamsellingbuyingStep11(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamsellingbuying.'.'plan_id', $this->request->data['iamsellingbuying_plan_id']);			
			$all_mortgage	= $this->getMortgageStatus();
			$this->set(compact('all_mortgage'));
		}
    }
	public function iamsellingbuyingStep12(){
		if($this->request->is('post')){
			$session = $this->request->session();
			$session->write('iamsellingbuying.'.'mortgage_id', $this->request->data['iamsellingbuying_mortgage_id']);
			
			if( $session->read('iamsellingbuying.'.'userid') != '' ){
				$for_buying['user_id'] 		= $session->read('iamsellingbuying.'.'userid');
				$for_buying['user_type'] 	= 'B';
				$for_buying['price_id'] 	= $session->read('iamsellingbuying.'.'price_id1');
				$for_buying['city'] 		= $session->read('iamsellingbuying.'.'city1');
				$for_buying['state_code'] 	= $session->read('iamsellingbuying.'.'state_code1');
				$for_buying['plan_id'] 		= $session->read('iamsellingbuying.'.'plan_id');
				$for_buying['mortgage_id'] 	= $session->read('iamsellingbuying.'.'mortgage_id');
				$for_buying['created'] 		= date('Y-m-d H:i:s');
				$for_buying['modified'] 	= date('Y-m-d H:i:s');
				
				$submissionTable = TableRegistry::get('Submission');
				$newSubmission1 = $submissionTable->newEntity();
				$data_to_insert1 = $submissionTable->patchEntity($newSubmission1, $for_buying);
				$submissionTable->save($data_to_insert1);
			}
			$session->delete('iamsellingbuying');
			$session->write('iamsellingbuying','');
			$for_selling = '';
			$for_buying = '';
		}
    }
	/********************* I'm Selling Buying Section End Here ************************/
}