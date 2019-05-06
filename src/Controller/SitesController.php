<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Routing\Router;
/**
 * Sites Controller is for manage all the cms pages and and home page of the site.
 *
 * @property \Admin\Model\Table\Cms $Cms
 */
class SitesController extends AppController{
	
	public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->loadComponent('Email');
        $this->Auth->allow();
    }
    
    /**
     * [homePage function is for home page of the site]
     * 
     */
    public function homePage(){
        $BannersTable 		= TableRegistry::get('Banners');
		$all_banners 		= $BannersTable->find('all',['conditions'=>['status'=>'A'],'order'=>['id asc']])->toArray();
		$TestimonialTable 	= TableRegistry::get('Testimonial');
		$all_testimonials 	= $TestimonialTable->find('all',['conditions'=>['status'=>'A'],'order'=>['id asc']])->toArray();
		$clients_about_us	= $this->getCmsData(4);
		$ServiceTable 		= TableRegistry::get('Service');
		$all_services 		= $ServiceTable->find('all',['conditions'=>['status'=>'A'],'order'=>['id asc']])->toArray();
		$HowitworkTable 	= TableRegistry::get('Howitwork');
		$all_howitworks 	= $HowitworkTable->find('all',['conditions'=>['status'=>'A'],'order'=>['id asc']])->toArray();
		$howitworks_data	= $this->getCmsData(5);
		$sercices_data		= $this->getCmsData(6);
		
		$this->set(compact('all_banners','all_testimonials','clients_about_us','all_services','all_howitworks','howitworks_data','sercices_data'));
    }

	/**
	* howItWork is for how it work page
	*/
	public function howItWorks(){
		$HowitworkTable 	= TableRegistry::get('Howitwork');
		$all_howitworks 	= $HowitworkTable->find('all',['conditions'=>['status'=>'A'],'order'=>['id asc']])->toArray();
		$cms_data	= $this->getCmsData(5);
		$this->set(compact('all_howitworks','cms_data'));
	}
	
	/**
	* aboutUs is for about us page
	*/
	public function aboutUs(){
		$cms_data	= $this->getCmsData(2);
		$this->set(compact('cms_data'));
	}
	
	/**
	* contactUs is for contact us page
	*/
	public function contactUs(){
		$title = 'Contact Us';
		$ContactTable = TableRegistry::get('Contact');
		$contact = $ContactTable->newEntity();
		if($this->request->is('post')){
			$data_to_insert = $ContactTable->patchEntity($contact, $this->request->data);
			if($ContactTable->save($data_to_insert)){
				$settings = $this->getSiteSettings();
				$this->loadComponent('Email');
				$this->Email->contactsAdmin($this->request->data, $settings);
				$this->Flash->success(__('Thank you for your message - we will be back with you soon.'));
				return $this->redirect($this->referer());
			}else{
				$this->Flash->error(__('There was an unexpected error. Try again later or contact the Admin.'));
				return $this->redirect($this->referer());
			}			
        }
		$cms_data	= $this->getCmsData(8);
		$this->set(compact('cms_data','contact'));
	}
}