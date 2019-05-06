<?php
namespace Admin\Controller;
use Admin\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
/**
 * Prices Controller
 *
 * @property \Admin\Model\Table\ServicesTable $Prices
 */
class PricesController extends AppController{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
    }
	
    /**
     * index method
     * @return \Cake\Network\Response|void Redirects to the list data
    */
    public function index(){
        return $this->redirect(['plugin' => 'admin', 'controller' => 'Prices', 'action' => 'listData']);
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
			if( (empty($session->read('permissions.'.strtolower('Prices'))) || (!array_key_exists('list-data',$session->read('permissions.'.strtolower('Prices')))) || $session->read('permissions.'.strtolower('Prices').'.'.strtolower('list-data'))!=1) ){
				$this->Flash->error(__("You don't have permission to access this page"));
				return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
			}
            $options = array();
            // ************** start search filter **************** //
            if($this->request->query('search') !== NULL){
				$options['conditions'] = ['OR'=>[
												'Prices.price_1 LIKE' => '%'.$this->request->query('search').'%',
												'Prices.price_2 LIKE' => '%'.$this->request->query('search').'%'
												]
										];
			}
            // *********** end of search filter *********************** //
            $options['order'] = array('id asc');
            $options['limit'] = $this->paginationLimit;
			$PricesTable = TableRegistry::get('Admin.Prices');
            $pricesDetails = $this->paginate($this->Prices, $options);
            $this->set(compact('pricesDetails'));
            $this->set('_serialize', ['pricesDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }

    public function addPrice(){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Prices'))) || (!array_key_exists('add-price',$session->read('permissions.'.strtolower('Prices')))) || $session->read('permissions.'.strtolower('Prices').'.'.strtolower('add-price'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
		$PricesTable = TableRegistry::get('Admin.Prices');
        $new_price = $PricesTable->newEntity();
        if ($this->request->is('post')) {
			if($this->request->data['price_type'] == 'U'){
				$this->request->data['price_2'] = NULL;
			}
			else if($this->request->data['price_type'] == 'A'){
				$this->request->data['price_1'] = NULL;
			}
			$inserted_data = $PricesTable->patchEntity($new_price, $this->request->data);			
			if ($savedData = $PricesTable->save($inserted_data)) {
                $this->Flash->success(__('New price has been created successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'prices','action' => 'list-data']);
            } else {
                $this->Flash->error(__('Price is not created.'));
            }
        }
        $this->set(compact('new_price'));
        $this->set('_serialize', ['new_price']);
    }
    
    public function editPrice($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Prices'))) || (!array_key_exists('edit-price',$session->read('permissions.'.strtolower('Prices')))) || $session->read('permissions.'.strtolower('Prices').'.'.strtolower('edit-price'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        if($id == NULL){
            throw new NotFoundException(__('Page not found'));
        }
        $id = base64_decode($id);
		$PriceTable = TableRegistry::get('Admin.Prices');
        $existing_price = $PriceTable->get($id);
		if ($this->request->is(['post', 'put'])) {
			if($this->request->data['price_type'] == 'U'){
				$this->request->data['price_2'] = NULL;
			}
			else if($this->request->data['price_type'] == 'A'){
				$this->request->data['price_1'] = NULL;
			}
            $updated_data = $PriceTable->patchEntity($existing_price, $this->request->data);
			if ($savedData = $PriceTable->save($updated_data)) {
                $this->Flash->success(__('Price has been updated successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'prices','action' => 'list-data']);
            } else {
                $this->Flash->error(__('Price is not updated.'));
            }
        }
        $this->set(compact('existing_price','id'));
        $this->set('_serialize', ['existing_price']);
    }	
	
	public function changeStatus($id = NULL, $status = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Prices'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Prices')))) || $session->read('permissions.'.strtolower('Prices').'.'.strtolower('change-status'))!=1) ){
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
			$HowitworkTable = TableRegistry::get('Admin.Prices');
			$query = $HowitworkTable->query();
			if($this->request->data['status'] == 'I'){	//request for making this as inactive
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'Price inactivated successfully'));
				}else{
					echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
				}
			}else if($this->request->data['status'] == 'A'){
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'Price activated successfully'));
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
	
	public function deletePrice($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Prices'))) || (!array_key_exists('delete-price',$session->read('permissions.'.strtolower('Prices')))) || $session->read('permissions.'.strtolower('Prices').'.'.strtolower('delete-price'))!=1) ){
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
			$PriceTable = TableRegistry::get('Admin.Prices');
			$data = $PriceTable->get($id);
			$PriceTable->delete($data);
			echo json_encode(array('type' => 'success', 'deleted_id' => $id, 'message' => 'Price deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
		exit();
    }
	
	public function activeMultiple($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Prices'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Prices')))) || $session->read('permissions.'.strtolower('Prices').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
		$this->request->allowMethod(['post']);
		$PriceTable = TableRegistry::get('Admin.Prices');
		if(!empty($this->request->data['id'])){
			foreach($this->request->data['id'] as $val_id){
				$PriceTable->updateAll(['status'=>'A'], ['Prices.id IN' => $this->request->data['id']]);
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
		if( (empty($session->read('permissions.'.strtolower('Prices'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Prices')))) || $session->read('permissions.'.strtolower('Prices').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post']);
		if(!empty($this->request->data['id'])) {
			$PriceTable = TableRegistry::get('Admin.Prices');
			foreach($this->request->data['id'] as $val_id){
				$PriceTable->updateAll(['status'=>'I'], ['Prices.id' => $val_id]);				
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
		if( (empty($session->read('permissions.'.strtolower('Prices'))) || (!array_key_exists('delete-price',$session->read('permissions.'.strtolower('Prices')))) || $session->read('permissions.'.strtolower('Prices').'.'.strtolower('delete-price'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post', 'delete']);
		if(!empty($this->request->data['id'])){
			$deleted_ids = array();
			$PriceTable = TableRegistry::get('Admin.Prices');
			foreach($this->request->data['id'] as $val_id){	
				$data = $PriceTable->get($val_id);
				$PriceTable->delete($data);
				$deleted_ids[] = $val_id;
			}
			echo json_encode(array('type' => 'success', 'deleted_ids' => $deleted_ids, 'message' => 'Price(s) deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'deleted_ids' => '', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
        exit();
    }
	
}