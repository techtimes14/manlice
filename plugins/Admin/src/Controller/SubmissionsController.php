<?php
namespace Admin\Controller;
use Admin\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
/**
 * Submissions Controller
 *
 * @Submissions \Admin\Model\Table\PropertiesTable $Submissions
 */
class SubmissionsController extends AppController{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
    }

    /**
     * index method
     * @return \Cake\Network\Response|void Redirects to the list data
    */
    public function index(){
        return $this->redirect(['plugin' => 'admin', 'controller' => 'submissions', 'action' => 'propertySaleListData']);
    }

    /**
     * List Property for Sell
     * @param  string|null $page page type.
     * @return \Cake\Network\Response|void renders view.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */    
    public function propertySellListData($page = NULL){
        try{
			$session = $this->request->session();
			if( (empty($session->read('permissions.'.strtolower('Submissions'))) || (!array_key_exists('property-sell-list-data',$session->read('permissions.'.strtolower('Submissions')))) || $session->read('permissions.'.strtolower('Submissions').'.'.strtolower('property-sell-list-data'))!=1) ){
				$this->Flash->error(__("You don't have permission to access this page"));
				return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
			}
            $options = array();
            $options['contain'] 	= ['Users'=>['fields'=>['id','email','full_name']],'Prices'=>['fields'=>['id','price_type','price_1','price_2']],'Properties'=>['fields'=>['id','title']],'MortgageStatuses'=>['fields'=>['id','title']],'Plans'=>['fields'=>['id','title']]];
            $options['conditions'] 	= ['user_type'=>'S'];
			$options['order'] 		= ['id'=>'asc'];
            $options['limit'] 		= $this->paginationLimit;
			$SubmissionsTable 		= TableRegistry::get('Admin.Submissions');
            $propertyforsaleDetails = $this->paginate($this->Submissions, $options);
			//pr($propertyforsaleDetails); die;
			$this->set(compact('propertyforsaleDetails'));
            $this->set('_serialize', ['propertyforsaleDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }
	
	/**
     * View Property for Sell
     * @param  string|null $page page type.
     * @return \Cake\Network\Response|void renders view.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */    
    public function viewPropertySell($id = NULL){
        try{
			$session = $this->request->session();
			if( (empty($session->read('permissions.'.strtolower('Submissions'))) || (!array_key_exists('view-property-sell',$session->read('permissions.'.strtolower('Submissions')))) || $session->read('permissions.'.strtolower('Submissions').'.'.strtolower('view-property-sell'))!=1) ){
				$this->Flash->error(__("You don't have permission to access this page"));
				return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
			}
			$id = base64_decode($id);
			if($id == NULL){
				throw new NotFoundException(__('Page not found'));
			}
            $SubmissionsTable 		= TableRegistry::get('Admin.Submissions');
            $propertyforsaleDetails = $SubmissionsTable->find('all',['contain'=>['Users'=>['fields'=>['id','email','full_name','phone']],'Prices'=>['fields'=>['id','price_type','price_1','price_2']],'Properties'=>['fields'=>['id','title']],'MortgageStatuses'=>['fields'=>['id','title']],'Plans'=>['fields'=>['id','title']]],'conditions'=>['Submissions.id'=>$id,'Submissions.user_type'=>'S']])->first()->toArray();
			//pr($propertyforsaleDetails); die;
			$this->set(compact('propertyforsaleDetails'));
            $this->set('_serialize', ['propertyforsaleDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }
	
	/**
     * Delete Property for Sell
     * @param  string|null $page page type.
     * @return \Cake\Network\Response|void renders view.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */    
    public function deletePropertySell($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Submissions'))) || (!array_key_exists('delete-property-sell',$session->read('permissions.'.strtolower('Submissions')))) || $session->read('permissions.'.strtolower('Submissions').'.'.strtolower('delete-property-sell'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post', 'delete']);
		if(!empty($this->request->data['id'])){
			$deleted_ids = array();
			$submissionsTable = TableRegistry::get('Admin.Submissions');
			foreach($this->request->data['id'] as $val_id){	
				$data = $submissionsTable->get($val_id);
				$submissionsTable->delete($data);
				$deleted_ids[] = $val_id;
			}
			echo json_encode(array('type' => 'success', 'deleted_ids' => $deleted_ids, 'message' => 'Property(s) deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'deleted_ids' => '', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
        exit();
    }
	
	/**
     * Match Property Sell
     * @param  string|null $page page type.
     * @return \Cake\Network\Response|void renders view.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */    
    public function matchingPropertySellListData($id = NULL, $state_code = NULL, $city = NULL, $price = NULL){
        try{
			$session = $this->request->session();
			if( (empty($session->read('permissions.'.strtolower('Submissions'))) || (!array_key_exists('matching-property-sell-list-data',$session->read('permissions.'.strtolower('Submissions')))) || $session->read('permissions.'.strtolower('Submissions').'.'.strtolower('matching-property-sell-list-data'))!=1) ){
				$this->Flash->error(__("You don't have permission to access this page"));
				return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
			}
			if($id == NULL && $state_code == NULL && $city == NULL){
				throw new NotFoundException(__('Page not found'));
			}
			$id 		= isset($id)?base64_decode($id):'';
			$state_code = isset($state_code)?base64_decode($state_code):'';
			$city 		= isset($city)?base64_decode($city):'';
			$price 		= isset($price)?base64_decode($price):0;
			
            $options = array();
            $options['contain'] 	= ['Users'=>['fields'=>['id','email','full_name']],'Prices'=>['fields'=>['id','price_type','price_1','price_2']],'Properties'=>['fields'=>['id','title']],'MortgageStatuses'=>['fields'=>['id','title']],'Plans'=>['fields'=>['id','title']]];
            $options['conditions'] 	= [
										'Submissions.user_type'=>'S',
										'Submissions.id NOT IN'=>$id,
										'OR' => [
												'Submissions.state_code' => $state_code,
												'Submissions.city'		 => $city,
												'Submissions.price_id'	 => $price
												]
									  ];
			$options['order'] 		= ['id'=>'asc'];
            $options['limit'] 		= $this->paginationLimit;
			$SubmissionsTable 		= TableRegistry::get('Admin.Submissions');
            $propertyforsaleDetails = $this->paginate($this->Submissions, $options);
			$this->set(compact('propertyforsaleDetails'));
            $this->set('_serialize', ['propertyforsaleDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }
	
	/**
     * List Property to Buy
     * @param  string|null $page page type.
     * @return \Cake\Network\Response|void renders view.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */    
    public function propertyBuyListData($page = NULL){
        try{
			$session = $this->request->session();
			if( (empty($session->read('permissions.'.strtolower('Submissions'))) || (!array_key_exists('property-buy-list-data',$session->read('permissions.'.strtolower('Submissions')))) || $session->read('permissions.'.strtolower('Submissions').'.'.strtolower('property-buy-list-data'))!=1) ){
				$this->Flash->error(__("You don't have permission to access this page"));
				return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
			}
            $options = array();
            $options['contain'] 	= ['Users'=>['fields'=>['id','email','full_name']],'Prices'=>['fields'=>['id','price_type','price_1','price_2']],'Properties'=>['fields'=>['id','title']],'MortgageStatuses'=>['fields'=>['id','title']],'Plans'=>['fields'=>['id','title']]];
            $options['conditions'] 	= ['user_type'=>'B'];
			$options['order'] 		= ['id'=>'asc'];
            $options['limit'] 		= $this->paginationLimit;
			$SubmissionsTable 		= TableRegistry::get('Admin.Submissions');
            $propertytobuyDetails = $this->paginate($this->Submissions, $options);
			//pr($propertytobuyDetails); die;
			$this->set(compact('propertytobuyDetails'));
            $this->set('_serialize', ['propertytobuyDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }
	
	/**
     * View Property for Buy
     * @param  string|null $page page type.
     * @return \Cake\Network\Response|void renders view.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */    
    public function viewPropertyBuy($id = NULL){
        try{
			$session = $this->request->session();
			if( (empty($session->read('permissions.'.strtolower('Submissions'))) || (!array_key_exists('view-property-buy',$session->read('permissions.'.strtolower('Submissions')))) || $session->read('permissions.'.strtolower('Submissions').'.'.strtolower('view-property-buy'))!=1) ){
				$this->Flash->error(__("You don't have permission to access this page"));
				return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
			}
			$id = base64_decode($id);
			if($id == NULL){
				throw new NotFoundException(__('Page not found'));
			}
            $SubmissionsTable 		= TableRegistry::get('Admin.Submissions');
            $propertytobuyDetails = $SubmissionsTable->find('all',['contain'=>['Users'=>['fields'=>['id','email','full_name','phone']],'Prices'=>['fields'=>['id','price_type','price_1','price_2']],'Properties'=>['fields'=>['id','title']],'MortgageStatuses'=>['fields'=>['id','title']],'Plans'=>['fields'=>['id','title']]],'conditions'=>['Submissions.id'=>$id,'Submissions.user_type'=>'B']])->first()->toArray();
			//pr($propertytobuyDetails); die;
			$this->set(compact('propertytobuyDetails'));
            $this->set('_serialize', ['propertytobuyDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }
	
	/**
     * Delete Property for Buy
     * @param  string|null $page page type.
     * @return \Cake\Network\Response|void renders view.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */    
    public function deletePropertyBuy($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Submissions'))) || (!array_key_exists('delete-property-buy',$session->read('permissions.'.strtolower('Submissions')))) || $session->read('permissions.'.strtolower('Submissions').'.'.strtolower('delete-property-buy'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post', 'delete']);
		if(!empty($this->request->data['id'])){
			$deleted_ids = array();
			$submissionsTable = TableRegistry::get('Admin.Submissions');
			foreach($this->request->data['id'] as $val_id){	
				$data = $submissionsTable->get($val_id);
				$submissionsTable->delete($data);
				$deleted_ids[] = $val_id;
			}
			echo json_encode(array('type' => 'success', 'deleted_ids' => $deleted_ids, 'message' => 'Property(s) deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'deleted_ids' => '', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
        exit();
    }
	
	/**
     * Matching Property to Buy List Data
     * @param  string|null $page page type.
     * @return \Cake\Network\Response|void renders view.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */    
    public function matchingPropertyBuyListData($id = NULL, $state_code = NULL, $city = NULL, $price = NULL){
        try{
			$session = $this->request->session();
			if( (empty($session->read('permissions.'.strtolower('Submissions'))) || (!array_key_exists('property-buy-list-data',$session->read('permissions.'.strtolower('Submissions')))) || $session->read('permissions.'.strtolower('Submissions').'.'.strtolower('property-buy-list-data'))!=1) ){
				$this->Flash->error(__("You don't have permission to access this page"));
				return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
			}
			if($id == NULL && $state_code == NULL && $city == NULL && $price == NULL){
				throw new NotFoundException(__('Page not found'));
			}
			$id 		= isset($id)?base64_decode($id):0;
			$state_code = isset($state_code)?base64_decode($state_code):'';
			$city 		= isset($city)?base64_decode($city):'';
			$price 		= isset($price)?base64_decode($price):0;
			
			$options = array();
            $options['contain'] 	= ['Users'=>['fields'=>['id','email','full_name']],'Prices'=>['fields'=>['id','price_type','price_1','price_2']],'Properties'=>['fields'=>['id','title']],'MortgageStatuses'=>['fields'=>['id','title']],'Plans'=>['fields'=>['id','title']]];
            $options['conditions'] 	= [
										'Submissions.user_type'=>'B',
										'Submissions.id NOT IN'=>$id,
										'OR' => [
												'Submissions.state_code' => $state_code,
												'Submissions.city'		 => $city,
												'Submissions.price_id'	 => $price
												]
									  ];
			$options['order'] 		= ['id'=>'asc'];
            $options['limit'] 		= $this->paginationLimit;
			$SubmissionsTable 		= TableRegistry::get('Admin.Submissions');
            $propertytobuyDetails = $this->paginate($this->Submissions, $options);
			$this->set(compact('propertytobuyDetails'));
            $this->set('_serialize', ['propertytobuyDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }
	
	
}