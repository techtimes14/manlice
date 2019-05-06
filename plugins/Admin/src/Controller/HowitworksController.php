<?php
namespace Admin\Controller;
use Admin\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
require_once(ROOT . DS . 'vendor' . DS . "verot/class.upload.php/src" . DS . "class.upload.php");
/**
 * Howitworks Controller
 *
 * @property \Admin\Model\Table\ServicesTable $Howitworks
 */
class HowitworksController extends AppController{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
    }

    /**
     * index method
     * @return \Cake\Network\Response|void Redirects to the list data
    */
    public function index(){
        return $this->redirect(['plugin' => 'admin', 'controller' => 'Howitworks', 'action' => 'listData']);
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
			if( (empty($session->read('permissions.'.strtolower('Howitworks'))) || (!array_key_exists('list-data',$session->read('permissions.'.strtolower('Howitworks')))) || $session->read('permissions.'.strtolower('Howitworks').'.'.strtolower('list-data'))!=1) ){
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
			$HowitworksTable = TableRegistry::get('Admin.Howitworks');
            $howitworksDetails = $this->paginate($this->Howitworks, $options);
            $this->set(compact('howitworksDetails'));
            $this->set('_serialize', ['howitworksDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }

    public function add(){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Howitworks'))) || (!array_key_exists('add',$session->read('permissions.'.strtolower('Howitworks')))) || $session->read('permissions.'.strtolower('Howitworks').'.'.strtolower('add'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
		$HowitworksTable = TableRegistry::get('Admin.Howitworks');
        $new_howitworks = $HowitworksTable->newEntity();
        if ($this->request->is('post')) {
			if(array_key_exists('image', $this->request->data) && $this->request->data['image']['name']!=''){
                $image_sizes = getimagesize($this->request->data['image']['tmp_name']);
                $handle = new \Upload($this->request->data['image']);
                $handle->file_new_name_body = $new_name = 'hiw_'.time().rand(0,9);
                $handle->Process('uploads/howitworks/');
                $handle->image_resize         = true;
                $handle->image_x              = 59;
                $handle->image_y              = 64;
                //$handle->image_ratio_y      = true;
                $handle->file_new_name_body = $new_name;
                $handle->Process('uploads/howitworks/thumb/');
                if ($handle->processed) {
                    $this->request->data['image'] = $handle->file_dst_name;
                    $handle->clean();
                }
            }
			if(array_key_exists('image1', $this->request->data) && $this->request->data['image1']['name']!=''){
                $image_sizes1 = getimagesize($this->request->data['image1']['tmp_name']);
                $handle1 = new \Upload($this->request->data['image1']);
                $handle1->file_new_name_body = $new_name1 = 'hiw_medium_'.time().rand(0,9);
                $handle1->Process('uploads/howitworks/');
                $handle1->image_resize         = true;
                $handle1->image_x              = 360;
                $handle1->image_y              = 200;
                //$handle->image_ratio_y       = true;
                $handle1->file_new_name_body = $new_name1;
                $handle1->Process('uploads/howitworks/thumb1/');
                if ($handle1->processed) {
                    $this->request->data['image1'] = $handle1->file_dst_name;
                    $handle1->clean();
                }
            }
            $inserted_data = $HowitworksTable->patchEntity($new_howitworks, $this->request->data);
            if ($savedData = $HowitworksTable->save($inserted_data)) {
                $this->Flash->success(__('New how it work has been created successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'howitworks','action' => 'list-data']);
            } else {
                $this->Flash->error(__('How it work is not created.'));
            }
        }
        $this->set(compact('new_howitworks'));
        $this->set('_serialize', ['new_howitworks']);
    }
    
    public function edit($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Howitworks'))) || (!array_key_exists('edit',$session->read('permissions.'.strtolower('Howitworks')))) || $session->read('permissions.'.strtolower('Howitworks').'.'.strtolower('edit'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        if($id == NULL){
            throw new NotFoundException(__('Page not found'));
        }
        $id = base64_decode($id);
		$HowitworkTable = TableRegistry::get('Admin.Howitworks');
        $existing_howitwork = $HowitworkTable->get($id);
		if ($this->request->is(['post', 'put'])) {
			if(array_key_exists('image', $this->request->data) && $this->request->data['image']['name']!=''){
                $handle = new \Upload($this->request->data['image']);
                $handle->file_new_name_body = $new_name = 'hiw_'.time().rand(0,99);
                $handle->Process('uploads/howitworks/');
                $handle->image_resize         = true;
                $handle->image_x              = 59;
                $handle->image_y              = 64;
                //$handle->image_ratio_y      = true;
                $handle->file_new_name_body = $new_name;
                $handle->Process('uploads/howitworks/thumb/');
                if ($handle->processed) {
                    $this->request->data['image'] = $handle->file_dst_name;
                    $handle->clean();
					@unlink(WWW_ROOT."uploads/howitworks/".$existing_howitwork->image);
					@unlink(WWW_ROOT."uploads/howitworks/thumb/".$existing_howitwork->image);
                }
            }else{
                $this->request->data['image'] = $existing_howitwork->image;
            }
			if(array_key_exists('image1', $this->request->data) && $this->request->data['image1']['name']!=''){
                $handle1 = new \Upload($this->request->data['image1']);
                $handle1->file_new_name_body = $new_name1 = 'hiw_medium_'.time().rand(0,99);
                $handle1->Process('uploads/howitworks/');
                $handle1->image_resize         = true;
                $handle1->image_x              = 360;
                $handle1->image_y              = 200;
                //$handle1->image_ratio_y      = true;
                $handle1->file_new_name_body   = $new_name1;
                $handle1->Process('uploads/howitworks/thumb1/');
                if ($handle1->processed) {
                    $this->request->data['image1'] = $handle1->file_dst_name;
                    $handle1->clean();
					@unlink(WWW_ROOT."uploads/howitworks/".$existing_howitwork->image1);
					@unlink(WWW_ROOT."uploads/howitworks/thumb1/".$existing_howitwork->image1);
                }
            }else{
                $this->request->data['image1'] = $existing_howitwork->image1;
            }
            $updated_data = $HowitworkTable->patchEntity($existing_howitwork, $this->request->data);
			if ($savedData = $HowitworkTable->save($updated_data)) {
                $this->Flash->success(__('How it work has been updated successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'howitworks','action' => 'list-data']);
            } else {
                $this->Flash->error(__('How it work is not updated.'));
            }
        }
        $this->set(compact('existing_howitwork','id'));
        $this->set('_serialize', ['existing_howitwork']);
    }	
	
	public function changeStatus($id = NULL, $status = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Howitworks'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Howitworks')))) || $session->read('permissions.'.strtolower('Howitworks').'.'.strtolower('change-status'))!=1) ){
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
			$HowitworkTable = TableRegistry::get('Admin.Howitworks');
			$query = $HowitworkTable->query();
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
		if( (empty($session->read('permissions.'.strtolower('Howitworks'))) || (!array_key_exists('delete',$session->read('permissions.'.strtolower('Howitworks')))) || $session->read('permissions.'.strtolower('Howitworks').'.'.strtolower('delete'))!=1) ){
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
			$HowitworkTable = TableRegistry::get('Admin.Howitworks');
			$data = $HowitworkTable->get($id);
			@unlink(WWW_ROOT."uploads/howitworks/".$data->image);
			@unlink(WWW_ROOT."uploads/howitworks/thumb/".$data->image);
			@unlink(WWW_ROOT."uploads/howitworks/thumb1/".$data->image1);
			$HowitworkTable->delete($data);
			echo json_encode(array('type' => 'success', 'deleted_id' => $id, 'message' => 'How it work deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
		exit();
    }
	
	public function activeMultiple($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Howitworks'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Howitworks')))) || $session->read('permissions.'.strtolower('Howitworks').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
		$this->request->allowMethod(['post']);
		$HowitworkTable = TableRegistry::get('Admin.Howitworks');
		if(!empty($this->request->data['id'])){
			foreach($this->request->data['id'] as $val_id){
				$HowitworkTable->updateAll(['status'=>'A'], ['Howitworks.id IN' => $this->request->data['id']]);
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
		if( (empty($session->read('permissions.'.strtolower('Howitworks'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Howitworks')))) || $session->read('permissions.'.strtolower('Howitworks').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post']);
		if(!empty($this->request->data['id'])) {
			$HowitworkTable = TableRegistry::get('Admin.Howitworks');
			foreach($this->request->data['id'] as $val_id){
				$HowitworkTable->updateAll(['status'=>'I'], ['Howitworks.id' => $val_id]);				
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
		if( (empty($session->read('permissions.'.strtolower('Howitworks'))) || (!array_key_exists('delete',$session->read('permissions.'.strtolower('Howitworks')))) || $session->read('permissions.'.strtolower('Howitworks').'.'.strtolower('delete'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post', 'delete']);
		if(!empty($this->request->data['id'])){
			$deleted_ids = array();
			$HowitworkTable = TableRegistry::get('Admin.Howitworks');
			foreach($this->request->data['id'] as $val_id){	
				$data = $HowitworkTable->get($val_id);
				@unlink(WWW_ROOT."uploads/howitworks/".$data->image);
				@unlink(WWW_ROOT."uploads/howitworks/thumb/".$data->image);
				@unlink(WWW_ROOT."uploads/howitworks/thumb1/".$data->image1);
				$HowitworkTable->delete($data);
				$deleted_ids[] = $val_id;
			}
			echo json_encode(array('type' => 'success', 'deleted_ids' => $deleted_ids, 'message' => 'How it work(s) deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'deleted_ids' => '', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
        exit();
    }
	
}