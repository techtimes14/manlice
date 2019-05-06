<?php
namespace Admin\Controller;
use Admin\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
require_once(ROOT . DS . 'vendor' . DS . "verot/class.upload.php/src" . DS . "class.upload.php");
/**
 * Properties Controller
 *
 * @property \Admin\Model\Table\PropertiesTable $Properties
 */
class PropertiesController extends AppController{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
    }

    /**
     * index method
     * @return \Cake\Network\Response|void Redirects to the list data
    */
    public function index(){
        return $this->redirect(['plugin' => 'admin', 'controller' => 'Properties', 'action' => 'listData']);
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
			if( (empty($session->read('permissions.'.strtolower('Properties'))) || (!array_key_exists('list-data',$session->read('permissions.'.strtolower('Properties')))) || $session->read('permissions.'.strtolower('Properties').'.'.strtolower('list-data'))!=1) ){
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
			$PropertiesTable = TableRegistry::get('Admin.Properties');
            $propertyDetails = $this->paginate($this->Properties, $options);
            $this->set(compact('propertyDetails'));
            $this->set('_serialize', ['propertyDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }

    public function addProperty(){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Properties'))) || (!array_key_exists('add-property',$session->read('permissions.'.strtolower('Properties')))) || $session->read('permissions.'.strtolower('Properties').'.'.strtolower('add-property'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
		$PropertiesTable = TableRegistry::get('Admin.Properties');
        $new_property = $PropertiesTable->newEntity();
        if ($this->request->is('post')) {
            if(array_key_exists('image', $this->request->data) && $this->request->data['image']['name']!=''){
                $image_sizes = getimagesize($this->request->data['image']['tmp_name']);
                $handle = new \Upload($this->request->data['image']);
                $handle->file_new_name_body = $new_name = 'property_'.time().rand(0,9);
                $handle->Process('uploads/property/');
                //$handle->image_resize         = true;
                //$handle->image_x              = 100;
                //$handle->image_y              = 100;
                //$handle->image_ratio_y      = true;
                $handle->file_new_name_body = $new_name;
                $handle->Process('uploads/property/thumb/');
                if ($handle->processed) {
                    $this->request->data['image'] = $handle->file_dst_name;
                    $handle->clean();
                }
            }
            $inserted_data = $PropertiesTable->patchEntity($new_property, $this->request->data);
            if ($savedData = $PropertiesTable->save($inserted_data)) {
                $this->Flash->success(__('New property has been created successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'properties','action' => 'list-data']);
            } else {
                $this->Flash->error(__('Property is not created.'));
            }
        }
        $this->set(compact('new_property'));
        $this->set('_serialize', ['new_property']);
    }
    
    public function editProperty($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Properties'))) || (!array_key_exists('edit-property',$session->read('permissions.'.strtolower('Properties')))) || $session->read('permissions.'.strtolower('Properties').'.'.strtolower('edit-property'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        if($id == NULL){
            throw new NotFoundException(__('Page not found'));
        }
        $id = base64_decode($id);
		$PropertiesTable = TableRegistry::get('Admin.Properties');
        $existing_property = $PropertiesTable->get($id);
		if ($this->request->is(['post', 'put'])) {
			if(array_key_exists('image', $this->request->data) && $this->request->data['image']['name']!=''){
                $handle = new \Upload($this->request->data['image']);
                $handle->file_new_name_body = $new_name = 'property_'.time().rand(0,99);
                $handle->Process('uploads/property/');
                //$handle->image_resize         = true;
                //$handle->image_x              = 100;
                //$handle->image_y              = 100;
                //$handle->image_ratio_y      = true;
                $handle->file_new_name_body = $new_name;
                $handle->Process('uploads/property/thumb/');
                if ($handle->processed) {
                    $this->request->data['image'] = $handle->file_dst_name;
                    $handle->clean();
					@unlink(WWW_ROOT."uploads/property/".$existing_property->image);
					@unlink(WWW_ROOT."uploads/property/thumb/".$existing_property->image);
                }
            }else{
                $this->request->data['image'] = $existing_property->image;
            }
            $updated_data = $PropertiesTable->patchEntity($existing_property, $this->request->data);
			if ($savedData = $PropertiesTable->save($updated_data)) {
                $this->Flash->success(__('Property has been updated successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'properties','action' => 'list-data']);
            } else {
                $this->Flash->error(__('Property is not updated.'));
            }
        }
        $this->set(compact('existing_property','id'));
        $this->set('_serialize', ['existing_property']);
    }	
	
	public function changeStatus($id = NULL, $status = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Properties'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Properties')))) || $session->read('permissions.'.strtolower('Properties').'.'.strtolower('change-status'))!=1) ){
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
			$PropertiesTable = TableRegistry::get('Admin.Properties');
			$query = $PropertiesTable->query();
			if($this->request->data['status'] == 'I'){	//request for making this user as inactive
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'Property inactivated successfully'));
				}else{
					echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
				}
			}else if($this->request->data['status'] == 'A'){
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'Property activated successfully'));
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
	
	public function deleteProperty($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Properties'))) || (!array_key_exists('delete-property',$session->read('permissions.'.strtolower('Properties')))) || $session->read('permissions.'.strtolower('Properties').'.'.strtolower('delete-property'))!=1) ){
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
			$PropertiesTable = TableRegistry::get('Admin.Properties');
			$data = $PropertiesTable->get($id);
			@unlink(WWW_ROOT."uploads/property/".$data->image);
			@unlink(WWW_ROOT."uploads/property/thumb/".$data->image);
			$PropertiesTable->delete($data);
			echo json_encode(array('type' => 'success', 'deleted_id' => $id, 'message' => 'Property deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
		exit();
    }
	
	public function activeMultiple($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Properties'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Properties')))) || $session->read('permissions.'.strtolower('Properties').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
		$this->request->allowMethod(['post']);
		$PropertiesTable = TableRegistry::get('Admin.Properties');
		if(!empty($this->request->data['id'])){
			foreach($this->request->data['id'] as $val_id){
				$PropertiesTable->updateAll(['status'=>'A'], ['Properties.id IN' => $this->request->data['id']]);
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
		if( (empty($session->read('permissions.'.strtolower('Properties'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Properties')))) || $session->read('permissions.'.strtolower('Properties').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post']);
		if(!empty($this->request->data['id'])) {
			$PropertiesTable = TableRegistry::get('Admin.Properties');
			foreach($this->request->data['id'] as $val_id){
				$PropertiesTable->updateAll(['status'=>'I'], ['Properties.id' => $val_id]);				
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
		if( (empty($session->read('permissions.'.strtolower('Properties'))) || (!array_key_exists('delete-property',$session->read('permissions.'.strtolower('Properties')))) || $session->read('permissions.'.strtolower('Properties').'.'.strtolower('delete-property'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post', 'delete']);
		if(!empty($this->request->data['id'])){
			$deleted_ids = array();
			$PropertiesTable = TableRegistry::get('Admin.Properties');
			foreach($this->request->data['id'] as $val_id){	
				$data = $PropertiesTable->get($val_id);
				@unlink(WWW_ROOT."uploads/property/".$data->image);
				@unlink(WWW_ROOT."uploads/property/thumb/".$data->image);
				$PropertiesTable->delete($data);
				$deleted_ids[] = $val_id;
			}
			echo json_encode(array('type' => 'success', 'deleted_ids' => $deleted_ids, 'message' => 'Property(s) deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'deleted_ids' => '', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
        exit();
    }
	
}