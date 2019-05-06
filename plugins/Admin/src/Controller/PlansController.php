<?php
namespace Admin\Controller;
use Admin\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
require_once(ROOT . DS . 'vendor' . DS . "verot/class.upload.php/src" . DS . "class.upload.php");
/**
 * Plans Controller
 *
 * @property \Admin\Model\Table\PlansTable $Plans
 */
class PlansController extends AppController{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
    }

    /**
     * index method
     * @return \Cake\Network\Response|void Redirects to the list data
    */
    public function index(){
        return $this->redirect(['plugin' => 'admin', 'controller' => 'Plans', 'action' => 'listData']);
    }

    public function listData($page = NULL){
        try{
			$session = $this->request->session();
			if( (empty($session->read('permissions.'.strtolower('Plans'))) || (!array_key_exists('list-data',$session->read('permissions.'.strtolower('Plans')))) || $session->read('permissions.'.strtolower('Plans').'.'.strtolower('list-data'))!=1) ){
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
			$PlansTable = TableRegistry::get('Admin.Plans');
            $planDetails = $this->paginate($this->Plans, $options);
            $this->set(compact('planDetails'));
            $this->set('_serialize', ['planDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }

    public function addPlan(){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Plans'))) || (!array_key_exists('add-plan',$session->read('permissions.'.strtolower('Plans')))) || $session->read('permissions.'.strtolower('Plans').'.'.strtolower('add-plan'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
		$PlansTable = TableRegistry::get('Admin.Plans');
        $new_plan = $PlansTable->newEntity();
        if ($this->request->is('post')) {
            $inserted_data = $PlansTable->patchEntity($new_plan, $this->request->data);
            if ($savedData = $PlansTable->save($inserted_data)) {
                $this->Flash->success(__('New plan has been created successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'plans','action' => 'list-data']);
            } else {
                $this->Flash->error(__('Plan is not created.'));
            }
        }
        $this->set(compact('new_plan'));
        $this->set('_serialize', ['new_plan']);
    }
    
    public function editPlan($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Plans'))) || (!array_key_exists('edit-plan',$session->read('permissions.'.strtolower('Plans')))) || $session->read('permissions.'.strtolower('Plans').'.'.strtolower('edit-plan'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        if($id == NULL){
            throw new NotFoundException(__('Page not found'));
        }
        $id = base64_decode($id);
		$PlansTable = TableRegistry::get('Admin.Plans');
        $existing_plan = $PlansTable->get($id);
		if ($this->request->is(['post', 'put'])) {
			$updated_data = $PlansTable->patchEntity($existing_plan, $this->request->data);
			if ($savedData = $PlansTable->save($updated_data)) {
                $this->Flash->success(__('Plan has been updated successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'plans','action' => 'list-data']);
            } else {
                $this->Flash->error(__('Plan is not updated.'));
            }
        }
        $this->set(compact('existing_plan','id'));
        $this->set('_serialize', ['existing_plan']);
    }	
	
	public function changeStatus($id = NULL, $status = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Plans'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Plans')))) || $session->read('permissions.'.strtolower('Plans').'.'.strtolower('change-status'))!=1) ){
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
			$PlansTable = TableRegistry::get('Admin.Plans');
			$query = $PlansTable->query();
			if($this->request->data['status'] == 'I'){	//request for making this user as inactive
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'Plan inactivated successfully'));
				}else{
					echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
				}
			}else if($this->request->data['status'] == 'A'){
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'Plan activated successfully'));
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
	
	public function deletePlan($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Plans'))) || (!array_key_exists('delete-plan',$session->read('permissions.'.strtolower('Plans')))) || $session->read('permissions.'.strtolower('Plans').'.'.strtolower('delete-plan'))!=1) ){
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
			$PlansTable = TableRegistry::get('Admin.Plans');
			$data = $PlansTable->get($id);
			$PlansTable->delete($data);
			echo json_encode(array('type' => 'success', 'deleted_id' => $id, 'message' => 'Plan deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
		exit();
    }
	
	public function activeMultiple($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Plans'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Plans')))) || $session->read('permissions.'.strtolower('Plans').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
		$this->request->allowMethod(['post']);
		$PlansTable = TableRegistry::get('Admin.Plans');
		if(!empty($this->request->data['id'])){
			foreach($this->request->data['id'] as $val_id){
				$PlansTable->updateAll(['status'=>'A'], ['Plans.id IN' => $this->request->data['id']]);
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
		if( (empty($session->read('permissions.'.strtolower('Plans'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Plans')))) || $session->read('permissions.'.strtolower('Plans').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post']);
		if(!empty($this->request->data['id'])) {
			$PlansTable = TableRegistry::get('Admin.Plans');
			foreach($this->request->data['id'] as $val_id){
				$PlansTable->updateAll(['status'=>'I'], ['Plans.id' => $val_id]);				
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
		if( (empty($session->read('permissions.'.strtolower('Plans'))) || (!array_key_exists('delete-plan',$session->read('permissions.'.strtolower('Plans')))) || $session->read('permissions.'.strtolower('Plans').'.'.strtolower('delete-plan'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post', 'delete']);
		if(!empty($this->request->data['id'])){
			$deleted_ids = array();
			$PlansTable = TableRegistry::get('Admin.Plans');
			foreach($this->request->data['id'] as $val_id){	
				$data = $PlansTable->get($val_id);
				$PlansTable->delete($data);
				$deleted_ids[] = $val_id;
			}
			echo json_encode(array('type' => 'success', 'deleted_ids' => $deleted_ids, 'message' => 'Plan(s) deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'deleted_ids' => '', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
        exit();
    }
	
}