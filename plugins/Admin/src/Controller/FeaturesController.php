<?php
namespace Admin\Controller;
use Admin\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
require_once(ROOT . DS . 'vendor' . DS . "verot/class.upload.php/src" . DS . "class.upload.php");
/**
 * Features Controller
 *
 * @property \Admin\Model\Table\ServicesTable $Features
 */
class FeaturesController extends AppController{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
    }

    /**
     * index method
     * @return \Cake\Network\Response|void Redirects to the list data
    */
    public function index(){
        return $this->redirect(['plugin' => 'admin', 'controller' => 'Features', 'action' => 'listData']);
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
			if( (empty($session->read('permissions.'.strtolower('Features'))) || (!array_key_exists('list-data',$session->read('permissions.'.strtolower('Features')))) || $session->read('permissions.'.strtolower('Features').'.'.strtolower('list-data'))!=1) ){
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
			$FeaturesTable = TableRegistry::get('Admin.Features');
            $featuresDetails = $this->paginate($this->Features, $options);
            $this->set(compact('featuresDetails'));
            $this->set('_serialize', ['featuresDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }

    public function add(){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Features'))) || (!array_key_exists('add',$session->read('permissions.'.strtolower('Features')))) || $session->read('permissions.'.strtolower('Features').'.'.strtolower('add'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
		$FeaturesTable = TableRegistry::get('Admin.Features');
        $new_features = $FeaturesTable->newEntity();
        if ($this->request->is('post')) {
			if(array_key_exists('image', $this->request->data) && $this->request->data['image']['name']!=''){
                $image_sizes = getimagesize($this->request->data['image']['tmp_name']);
                $handle = new \Upload($this->request->data['image']);
                $handle->file_new_name_body = $new_name = 'hiw_'.time().rand(0,9);
                $handle->Process('uploads/features/');
                $handle->image_resize         = true;
                $handle->image_x              = 59;
                $handle->image_y              = 64;
                //$handle->image_ratio_y      = true;
                $handle->file_new_name_body = $new_name;
                $handle->Process('uploads/features/thumb/');
                if ($handle->processed) {
                    $this->request->data['image'] = $handle->file_dst_name;
                    $handle->clean();
                }
            }
			if(array_key_exists('image1', $this->request->data) && $this->request->data['image1']['name']!=''){
                $image_sizes1 = getimagesize($this->request->data['image1']['tmp_name']);
                $handle1 = new \Upload($this->request->data['image1']);
                $handle1->file_new_name_body = $new_name1 = 'hiw_medium_'.time().rand(0,9);
                $handle1->Process('uploads/features/');
                $handle1->image_resize         = true;
                $handle1->image_x              = 360;
                $handle1->image_y              = 200;
                //$handle->image_ratio_y       = true;
                $handle1->file_new_name_body = $new_name1;
                $handle1->Process('uploads/features/thumb1/');
                if ($handle1->processed) {
                    $this->request->data['image1'] = $handle1->file_dst_name;
                    $handle1->clean();
                }
            }
            $inserted_data = $FeaturesTable->patchEntity($new_features, $this->request->data);
            if ($savedData = $FeaturesTable->save($inserted_data)) {
                $this->Flash->success(__('New how it work has been created successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'features','action' => 'list-data']);
            } else {
                $this->Flash->error(__('How it work is not created.'));
            }
        }
        $this->set(compact('new_features'));
        $this->set('_serialize', ['new_features']);
    }
    
    public function edit($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Features'))) || (!array_key_exists('edit',$session->read('permissions.'.strtolower('Features')))) || $session->read('permissions.'.strtolower('Features').'.'.strtolower('edit'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        if($id == NULL){
            throw new NotFoundException(__('Page not found'));
        }
        $id = base64_decode($id);
		$FeatureTable = TableRegistry::get('Admin.Features');
        $existing_feature = $FeatureTable->get($id);
		if ($this->request->is(['post', 'put'])) {
			if(array_key_exists('image', $this->request->data) && $this->request->data['image']['name']!=''){
                $handle = new \Upload($this->request->data['image']);
                $handle->file_new_name_body = $new_name = 'hiw_'.time().rand(0,99);
                $handle->Process('uploads/features/');
                $handle->image_resize         = true;
                $handle->image_x              = 59;
                $handle->image_y              = 64;
                //$handle->image_ratio_y      = true;
                $handle->file_new_name_body = $new_name;
                $handle->Process('uploads/features/thumb/');
                if ($handle->processed) {
                    $this->request->data['image'] = $handle->file_dst_name;
                    $handle->clean();
					@unlink(WWW_ROOT."uploads/features/".$existing_feature->image);
					@unlink(WWW_ROOT."uploads/features/thumb/".$existing_feature->image);
                }
            }else{
                $this->request->data['image'] = $existing_feature->image;
            }
			if(array_key_exists('image1', $this->request->data) && $this->request->data['image1']['name']!=''){
                $handle1 = new \Upload($this->request->data['image1']);
                $handle1->file_new_name_body = $new_name1 = 'hiw_medium_'.time().rand(0,99);
                $handle1->Process('uploads/features/');
                $handle1->image_resize         = true;
                $handle1->image_x              = 360;
                $handle1->image_y              = 200;
                //$handle1->image_ratio_y      = true;
                $handle1->file_new_name_body   = $new_name1;
                $handle1->Process('uploads/features/thumb1/');
                if ($handle1->processed) {
                    $this->request->data['image1'] = $handle1->file_dst_name;
                    $handle1->clean();
					@unlink(WWW_ROOT."uploads/features/".$existing_feature->image1);
					@unlink(WWW_ROOT."uploads/features/thumb1/".$existing_feature->image1);
                }
            }else{
                $this->request->data['image1'] = $existing_feature->image1;
            }
            $updated_data = $FeatureTable->patchEntity($existing_feature, $this->request->data);
			if ($savedData = $FeatureTable->save($updated_data)) {
                $this->Flash->success(__('How it work has been updated successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'features','action' => 'list-data']);
            } else {
                $this->Flash->error(__('How it work is not updated.'));
            }
        }
        $this->set(compact('existing_feature','id'));
        $this->set('_serialize', ['existing_feature']);
    }	
	
	public function changeStatus($id = NULL, $status = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Features'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Features')))) || $session->read('permissions.'.strtolower('Features').'.'.strtolower('change-status'))!=1) ){
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
			$FeatureTable = TableRegistry::get('Admin.Features');
			$query = $FeatureTable->query();
			if($this->request->data['status'] == 'I'){	//request for making this as inactive
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'How it work inactivated successfully'));
				}else{
					echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
				}
			}else if($this->request->data['status'] == 'A'){
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'How it work activated successfully'));
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
	
	public function delete($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Features'))) || (!array_key_exists('delete',$session->read('permissions.'.strtolower('Features')))) || $session->read('permissions.'.strtolower('Features').'.'.strtolower('delete'))!=1) ){
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
			$FeatureTable = TableRegistry::get('Admin.Features');
			$data = $FeatureTable->get($id);
			@unlink(WWW_ROOT."uploads/features/".$data->image);
			@unlink(WWW_ROOT."uploads/features/thumb/".$data->image);
			@unlink(WWW_ROOT."uploads/features/thumb1/".$data->image1);
			$FeatureTable->delete($data);
			echo json_encode(array('type' => 'success', 'deleted_id' => $id, 'message' => 'How it work deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
		exit();
    }
	
	public function activeMultiple($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Features'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Features')))) || $session->read('permissions.'.strtolower('Features').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
		$this->request->allowMethod(['post']);
		$FeatureTable = TableRegistry::get('Admin.Features');
		if(!empty($this->request->data['id'])){
			foreach($this->request->data['id'] as $val_id){
				$FeatureTable->updateAll(['status'=>'A'], ['Features.id IN' => $this->request->data['id']]);
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
		if( (empty($session->read('permissions.'.strtolower('Features'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Features')))) || $session->read('permissions.'.strtolower('Features').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post']);
		if(!empty($this->request->data['id'])) {
			$FeatureTable = TableRegistry::get('Admin.Features');
			foreach($this->request->data['id'] as $val_id){
				$FeatureTable->updateAll(['status'=>'I'], ['Features.id' => $val_id]);				
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
		if( (empty($session->read('permissions.'.strtolower('Features'))) || (!array_key_exists('delete',$session->read('permissions.'.strtolower('Features')))) || $session->read('permissions.'.strtolower('Features').'.'.strtolower('delete'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post', 'delete']);
		if(!empty($this->request->data['id'])){
			$deleted_ids = array();
			$FeatureTable = TableRegistry::get('Admin.Features');
			foreach($this->request->data['id'] as $val_id){	
				$data = $FeatureTable->get($val_id);
				@unlink(WWW_ROOT."uploads/features/".$data->image);
				@unlink(WWW_ROOT."uploads/features/thumb/".$data->image);
				@unlink(WWW_ROOT."uploads/features/thumb1/".$data->image1);
				$FeatureTable->delete($data);
				$deleted_ids[] = $val_id;
			}
			echo json_encode(array('type' => 'success', 'deleted_ids' => $deleted_ids, 'message' => 'How it work(s) deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'deleted_ids' => '', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
        exit();
    }
	
}