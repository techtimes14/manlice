<?php
namespace Admin\Controller;
use Admin\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
require_once(ROOT . DS . 'vendor' . DS . "verot/class.upload.php/src" . DS . "class.upload.php");
/**
 * MortgageStatuses Controller
 *
 * @property \Admin\Model\Table\MortgageStatusesTable $MortgageStatuses
 */
class MortgageStatusesController extends AppController{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
    }

    /**
     * index method
     * @return \Cake\Network\Response|void Redirects to the list data
     */
    
    public function index(){
        return $this->redirect(['plugin' => 'admin', 'controller' => 'MortgageStatuses', 'action' => 'listData']);
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
			if( (empty($session->read('permissions.'.strtolower('MortgageStatuses'))) || (!array_key_exists('list-data',$session->read('permissions.'.strtolower('MortgageStatuses')))) || $session->read('permissions.'.strtolower('MortgageStatuses').'.'.strtolower('list-data'))!=1) ){
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
            $mortgageStatusDetails = $this->paginate($this->MortgageStatuses, $options);
            $this->set(compact('mortgageStatusDetails'));
            $this->set('_serialize', ['mortgageStatusDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }

    public function addMortgageStatus(){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('MortgageStatuses'))) || (!array_key_exists('add-mortgage-status',$session->read('permissions.'.strtolower('MortgageStatuses')))) || $session->read('permissions.'.strtolower('MortgageStatuses').'.'.strtolower('add-mortgage-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
		$MortgageStatusTable = TableRegistry::get('Admin.MortgageStatuses');
        $new_mortgagestatus = $MortgageStatusTable->newEntity();
        if ($this->request->is('post')) {
            $inserted_data = $MortgageStatusTable->patchEntity($new_mortgagestatus, $this->request->data);
            if ($savedData = $MortgageStatusTable->save($inserted_data)) {
                $this->Flash->success(__('New mortgage status has been created successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'mortgageStatuses','action' => 'list-data']);
            } else {
                $this->Flash->error(__('Mortgage status is not created.'));
            }
        }
        $this->set(compact('new_mortgagestatus'));
        $this->set('_serialize', ['new_mortgagestatus']);
    }
    
    public function editMortgageStatus($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('MortgageStatuses'))) || (!array_key_exists('edit-mortgage-status',$session->read('permissions.'.strtolower('MortgageStatuses')))) || $session->read('permissions.'.strtolower('MortgageStatuses').'.'.strtolower('edit-mortgage-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        if($id == NULL){
            throw new NotFoundException(__('Page not found'));
        }
        $id = base64_decode($id);
		$MortgageStatusTable = TableRegistry::get('Admin.MortgageStatuses');
        $existing_mortgagestatus = $MortgageStatusTable->get($id, ['contain' => []]);
		if ($this->request->is(['post', 'put'])) {
			$updated_data = $MortgageStatusTable->patchEntity($existing_mortgagestatus, $this->request->data);
			if($savedData = $MortgageStatusTable->save($updated_data)) {
                $this->Flash->success(__('Mortgage status has been updated successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'mortgageStatuses','action' => 'list-data']);
            } else {
                $this->Flash->error(__('Mortgage status is not updated.'));
            }
        }
        $this->set(compact('existing_mortgagestatus','id'));
        $this->set('_serialize', ['existing_mortgagestatus']);
    }	
	
	public function changeStatus($id = NULL, $status = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('MortgageStatuses'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('MortgageStatuses')))) || $session->read('permissions.'.strtolower('MortgageStatuses').'.'.strtolower('change-status'))!=1) ){
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
			$MortgageStatusTable = TableRegistry::get('Admin.MortgageStatuses');
			$query = $MortgageStatusTable->query();
			if($this->request->data['status'] == 'I'){	//request for making this as inactive
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'Mortgage status inactivated successfully'));
				}else{
					echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
				}
			}else if($this->request->data['status'] == 'A'){
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'Mortgage status activated successfully'));
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
	
	public function deleteMortgageStatus($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('MortgageStatuses'))) || (!array_key_exists('delete-mortgage-status',$session->read('permissions.'.strtolower('MortgageStatuses')))) || $session->read('permissions.'.strtolower('MortgageStatuses').'.'.strtolower('delete-mortgage-status'))!=1) ){
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
			$MortgageStatusTable = TableRegistry::get('Admin.MortgageStatuses');
			$data = $MortgageStatusTable->get($id);
			$MortgageStatusTable->delete($data);
			echo json_encode(array('type' => 'success', 'deleted_id' => $id, 'message' => 'Mortgage status deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
		exit();
    }
	
	public function activeMultiple($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('MortgageStatuses'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('MortgageStatuses')))) || $session->read('permissions.'.strtolower('MortgageStatuses').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
		$this->request->allowMethod(['post']);
		$MortgageStatusesTable = TableRegistry::get('Admin.MortgageStatuses');
		if(!empty($this->request->data['id'])){
			foreach($this->request->data['id'] as $val_id){
				$MortgageStatusesTable->updateAll(['status'=>'A'], ['MortgageStatuses.id IN' => $this->request->data['id']]);
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
		if( (empty($session->read('permissions.'.strtolower('MortgageStatuses'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('MortgageStatuses')))) || $session->read('permissions.'.strtolower('MortgageStatuses').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post']);
		if(!empty($this->request->data['id'])) {
			$MortgageStatusTable = TableRegistry::get('Admin.MortgageStatuses');
			foreach($this->request->data['id'] as $val_id){
				$MortgageStatusTable->updateAll(['status'=>'I'], ['MortgageStatuses.id' => $val_id]);				
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
		if( (empty($session->read('permissions.'.strtolower('MortgageStatuses'))) || (!array_key_exists('delete-mortgage-status',$session->read('permissions.'.strtolower('MortgageStatuses')))) || $session->read('permissions.'.strtolower('MortgageStatuses').'.'.strtolower('delete-mortgage-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post', 'delete']);
		if(!empty($this->request->data['id'])){
			$deleted_ids = array();
			$MortgageStatusTable = TableRegistry::get('Admin.MortgageStatuses');
			foreach($this->request->data['id'] as $val_id){	
				$data = $MortgageStatusTable->get($val_id);
				$MortgageStatusTable->delete($data);
				$deleted_ids[] = $val_id;
			}
			echo json_encode(array('type' => 'success', 'deleted_ids' => $deleted_ids, 'message' => 'Mortgage status(s) deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'deleted_ids' => '', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
        exit();
    }
	
}