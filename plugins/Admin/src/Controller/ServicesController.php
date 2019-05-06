<?php
namespace Admin\Controller;
use Admin\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
require_once(ROOT . DS . 'vendor' . DS . "verot/class.upload.php/src" . DS . "class.upload.php");
/**
 * Services Controller
 *
 * @property \Admin\Model\Table\ServicesTable $Services
 */
class ServicesController extends AppController{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
    }

    /**
     * index method
     * @return \Cake\Network\Response|void Redirects to the list data
    */
    public function index(){
        return $this->redirect(['plugin' => 'admin', 'controller' => 'Services', 'action' => 'listData']);
    }

    /**
     * List Content Category Data
     * @param  string|null $page page type.
     * @return \Cake\Network\Response|void renders view.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */    
    public function listData($page = NULL){
        try{
			$session = $this->request->session();
			if( (empty($session->read('permissions.'.strtolower('Services'))) || (!array_key_exists('list-data',$session->read('permissions.'.strtolower('Services')))) || $session->read('permissions.'.strtolower('Services').'.'.strtolower('list-data'))!=1) ){
				$this->Flash->error(__("You don't have permission to access this page"));
				return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
			}
            $options = array();
            // ************** start search filter **************** //
            if($this->request->query('search') !== NULL){
				$options['conditions'] = array('title LIKE' => '%'.$this->request->query('search').'%');
			}
            // *********** end of search filter *********************** //
            $options['order'] = array('id asc');
            $options['limit'] = $this->paginationLimit;
			$ServicesTable = TableRegistry::get('Admin.Services');
            $serviceDetails = $this->paginate($this->Services, $options);
            $this->set(compact('serviceDetails'));
            $this->set('_serialize', ['serviceDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }

    public function addService(){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Services'))) || (!array_key_exists('add-service',$session->read('permissions.'.strtolower('Services')))) || $session->read('permissions.'.strtolower('Services').'.'.strtolower('add-service'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
		$ServicesTable = TableRegistry::get('Admin.Services');
        $new_service = $ServicesTable->newEntity();
        if ($this->request->is('post')) {
            if(array_key_exists('image', $this->request->data) && $this->request->data['image']['name']!=''){
                $image_sizes = getimagesize($this->request->data['image']['tmp_name']);
                $handle = new \Upload($this->request->data['image']);
                $handle->file_new_name_body = $new_name = 'service_'.time().rand(0,9);
                $handle->Process('uploads/service/');
                $handle->image_resize         = true;
                $handle->image_x              = 360;
                $handle->image_y              = 300;
                //$handle->image_ratio_y      = true;
                $handle->file_new_name_body = $new_name;
                $handle->Process('uploads/service/thumb/');
                if ($handle->processed) {
                    $this->request->data['image'] = $handle->file_dst_name;
                    $handle->clean();
                }
            }
            $inserted_data = $ServicesTable->patchEntity($new_service, $this->request->data);
            if ($savedData = $ServicesTable->save($inserted_data)) {
                $this->Flash->success(__('New service has been created successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'services','action' => 'list-data']);
            } else {
                $this->Flash->error(__('Service is not created.'));
            }
        }
        $this->set(compact('new_service'));
        $this->set('_serialize', ['new_service']);
    }
    
    public function editService($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Services'))) || (!array_key_exists('edit-service',$session->read('permissions.'.strtolower('Services')))) || $session->read('permissions.'.strtolower('Services').'.'.strtolower('edit-service'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        if($id == NULL){
            throw new NotFoundException(__('Page not found'));
        }
        $id = base64_decode($id);
		$ServicesTable = TableRegistry::get('Admin.Services');
        $existing_service = $ServicesTable->get($id);
		if ($this->request->is(['post', 'put'])) {
			if(array_key_exists('image', $this->request->data) && $this->request->data['image']['name']!=''){
                $handle = new \Upload($this->request->data['image']);
                $handle->file_new_name_body = $new_name = 'service_'.time().rand(0,99);
                $handle->Process('uploads/service/');
                $handle->image_resize         = true;
                $handle->image_x              = 360;
                $handle->image_y              = 300;
                //$handle->image_ratio_y      = true;
                $handle->file_new_name_body = $new_name;
                $handle->Process('uploads/service/thumb/');
                if ($handle->processed) {
                    $this->request->data['image'] = $handle->file_dst_name;
                    $handle->clean();
					@unlink(WWW_ROOT."uploads/service/".$existing_service->image);
					@unlink(WWW_ROOT."uploads/service/thumb/".$existing_service->image);
                }
            }else{
                $this->request->data['image'] = $existing_service->image;
            }
            $updated_data = $ServicesTable->patchEntity($existing_service, $this->request->data);
			if ($savedData = $ServicesTable->save($updated_data)) {
                $this->Flash->success(__('Service has been updated successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'services','action' => 'list-data']);
            } else {
                $this->Flash->error(__('Service is not updated.'));
            }
        }
        $this->set(compact('existing_service','id'));
        $this->set('_serialize', ['existing_service']);
    }	
	
	public function changeStatus($id = NULL, $status = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Services'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Services')))) || $session->read('permissions.'.strtolower('Services').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post', 'ajax', 'put']);
		$id = $this->request->data['id'];
		if($id == NULL){
            throw new NotFoundException(__('Page not found'));
        }
		if($id != ''){
			$ServicesTable = TableRegistry::get('Admin.Services');
			$query = $ServicesTable->query();
			if($this->request->data['status'] == 'I'){	//request for making this user as inactive
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'Service inactivated successfully'));
				}else{
					echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
				}
			}else if($this->request->data['status'] == 'A'){
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'Service activated successfully'));
				}else{
					echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
				}
			}else{
				echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
			}			
		}else{
			echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developer'));
		}
        exit();
    }
	
	public function deleteService($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Services'))) || (!array_key_exists('delete-service',$session->read('permissions.'.strtolower('Services')))) || $session->read('permissions.'.strtolower('Services').'.'.strtolower('delete-service'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
		$this->viewBuilder()->layout(false);
		$this->render(false);		
		$id = isset($this->request->data['id'])?$this->request->data['id']:'';
		if($id == NULL){
            throw new NotFoundException(__('Page not found'));
        }
		$this->request->allowMethod(['post', 'delete']);
		if($id != ''){
			$ServicesTable = TableRegistry::get('Admin.Services');
			$data = $ServicesTable->get($id);
			@unlink(WWW_ROOT."uploads/service/".$data->image);
			@unlink(WWW_ROOT."uploads/service/thumb/".$data->image);
			$ServicesTable->delete($data);
			echo json_encode(array('type' => 'success', 'deleted_id' => $id, 'message' => 'Service deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
		exit();
    }
	
	public function activeMultiple($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Services'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Services')))) || $session->read('permissions.'.strtolower('Services').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
		$this->request->allowMethod(['post']);
		$ServicesTable = TableRegistry::get('Admin.Services');
		if(!empty($this->request->data['id'])){
			foreach($this->request->data['id'] as $val_id){
				$ServicesTable->updateAll(['status'=>'A'], ['Services.id IN' => $this->request->data['id']]);
			}
			$ids = $this->request->data['id'];
			echo json_encode($ids);
		}else{
			$ids = '';
			echo $ids;
		}
        exit();
    }
	
	public function inactiveMultiple($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Services'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Services')))) || $session->read('permissions.'.strtolower('Services').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post']);
		if(!empty($this->request->data['id'])) {
			$ServicesTable = TableRegistry::get('Admin.Services');
			foreach($this->request->data['id'] as $val_id){
				$ServicesTable->updateAll(['status'=>'I'], ['Services.id' => $val_id]);				
			}
			$ids = $this->request->data['id'];
			echo json_encode($ids);
		}else{
			$ids = '';
			echo $ids;
		}
        exit();
    }
	
	public function deleteMultiple($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Services'))) || (!array_key_exists('delete-service',$session->read('permissions.'.strtolower('Services')))) || $session->read('permissions.'.strtolower('Services').'.'.strtolower('delete-service'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post', 'delete']);
		if(!empty($this->request->data['id'])){
			$deleted_ids = array();
			$ServicesTable = TableRegistry::get('Admin.Services');
			foreach($this->request->data['id'] as $val_id){	
				$data = $ServicesTable->get($val_id);
				@unlink(WWW_ROOT."uploads/service/".$data->image);
				@unlink(WWW_ROOT."uploads/service/thumb/".$data->image);
				$ServicesTable->delete($data);
				$deleted_ids[] = $val_id;
			}
			echo json_encode(array('type' => 'success', 'deleted_ids' => $deleted_ids, 'message' => 'Service(s) deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'deleted_ids' => '', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
        exit();
    }
	
}