<?php
namespace Admin\Controller;
use Admin\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
require_once(ROOT . DS . 'vendor' . DS . "verot/class.upload.php/src" . DS . "class.upload.php");
/**
 * Testimonials Controller
 *
 * @property \Admin\Model\Table\TestimonialsTable $Testimonials
 */
class TestimonialsController extends AppController{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
    }

    /**
     * index method
     * @return \Cake\Network\Response|void Redirects to the list data
    */
    public function index(){
        return $this->redirect(['plugin' => 'admin', 'controller' => 'Testimonials', 'action' => 'listData']);
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
			if( (empty($session->read('permissions.'.strtolower('Testimonials'))) || (!array_key_exists('list-data',$session->read('permissions.'.strtolower('Testimonials')))) || $session->read('permissions.'.strtolower('Testimonials').'.'.strtolower('list-data'))!=1) ){
				$this->Flash->error(__("You don't have permission to access this page"));
				return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
			}
            $options = array();
            // ************** start search filter **************** //
            if($this->request->query('search') !== NULL){
				$options['conditions'] = array('name LIKE' => '%'.$this->request->query('search').'%');
			}
            // *********** end of search filter *********************** //
            $options['order'] = array('id asc');
            $options['limit'] = $this->paginationLimit;
			$TestimonialsTable = TableRegistry::get('Admin.Testimonials');
            $testimonialDetails = $this->paginate($this->Testimonials, $options);
            $this->set(compact('testimonialDetails'));
            $this->set('_serialize', ['testimonialDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }

    public function addTestimonial(){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Testimonials'))) || (!array_key_exists('add-testimonial',$session->read('permissions.'.strtolower('Testimonials')))) || $session->read('permissions.'.strtolower('Testimonials').'.'.strtolower('add-testimonial'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
		$TestimonialsTable = TableRegistry::get('Admin.Testimonials');
        $new_testimonial = $TestimonialsTable->newEntity();
        if ($this->request->is('post')) {
            if(array_key_exists('image', $this->request->data) && $this->request->data['image']['name']!=''){
                $image_sizes = getimagesize($this->request->data['image']['tmp_name']);
                $handle = new \Upload($this->request->data['image']);
                $handle->file_new_name_body = $new_name = 'testimonial_'.time().rand(0,9);
                $handle->Process('uploads/testimonial/');
                $handle->image_resize         = true;
                $handle->image_x              = 98;
                $handle->image_y              = 98;
                //$handle->image_ratio_y      = true;
                $handle->file_new_name_body = $new_name;
                $handle->Process('uploads/testimonial/thumb/');
                if ($handle->processed) {
                    $this->request->data['image'] = $handle->file_dst_name;
                    $handle->clean();
                }
            }
            $inserted_data = $TestimonialsTable->patchEntity($new_testimonial, $this->request->data);
            if ($savedData = $TestimonialsTable->save($inserted_data)) {
                $this->Flash->success(__('New testimonial has been created successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'testimonials','action' => 'list-data']);
            } else {
                $this->Flash->error(__('Testimonial is not created.'));
            }
        }
        $this->set(compact('new_testimonial'));
        $this->set('_serialize', ['new_testimonial']);
    }
    
    public function editTestimonial($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Testimonials'))) || (!array_key_exists('edit-testimonial',$session->read('permissions.'.strtolower('Testimonials')))) || $session->read('permissions.'.strtolower('Testimonials').'.'.strtolower('edit-testimonial'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        if($id == NULL){
            throw new NotFoundException(__('Page not found'));
        }
        $id = base64_decode($id);
		$TestimonialsTable = TableRegistry::get('Admin.Testimonials');
        $existing_testimonial = $TestimonialsTable->get($id);
		if ($this->request->is(['post', 'put'])) {
			if(array_key_exists('image', $this->request->data) && $this->request->data['image']['name']!=''){
                $handle = new \Upload($this->request->data['image']);
                $handle->file_new_name_body = $new_name = 'testimonial_'.time().rand(0,99);
                $handle->Process('uploads/testimonial/');
                $handle->image_resize         = true;
                $handle->image_x              = 98;
                $handle->image_y              = 98;
                //$handle->image_ratio_y      = true;
                $handle->file_new_name_body = $new_name;
                $handle->Process('uploads/testimonial/thumb/');
                if ($handle->processed) {
                    $this->request->data['image'] = $handle->file_dst_name;
                    $handle->clean();
					@unlink(WWW_ROOT."uploads/testimonial/".$existing_testimonial->image);
					@unlink(WWW_ROOT."uploads/testimonial/thumb/".$existing_testimonial->image);
                }
            }else{
                $this->request->data['image'] = $existing_testimonial->image;
            }
            $updated_data = $TestimonialsTable->patchEntity($existing_testimonial, $this->request->data);
			if ($savedData = $TestimonialsTable->save($updated_data)) {
                $this->Flash->success(__('Testimonial has been updated successfully'));
                return $this->redirect(['plugin' => 'admin','controller' => 'testimonials','action' => 'list-data']);
            } else {
                $this->Flash->error(__('Testimonial is not updated.'));
            }
        }
        $this->set(compact('existing_testimonial','id'));
        $this->set('_serialize', ['existing_testimonial']);
    }	
	
	public function changeStatus($id = NULL, $status = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Testimonials'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Testimonials')))) || $session->read('permissions.'.strtolower('Testimonials').'.'.strtolower('change-status'))!=1) ){
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
			$TestimonialsTable = TableRegistry::get('Admin.Testimonials');
			$query = $TestimonialsTable->query();
			if($this->request->data['status'] == 'I'){	//request for making this user as inactive
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'Testimonial inactivated successfully'));
				}else{
					echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
				}
			}else if($this->request->data['status'] == 'A'){
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'Testimonial activated successfully'));
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
	
	public function deleteTestimonial($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Testimonials'))) || (!array_key_exists('delete-testimonial',$session->read('permissions.'.strtolower('Testimonials')))) || $session->read('permissions.'.strtolower('Testimonials').'.'.strtolower('delete-testimonial'))!=1) ){
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
			$TestimonialsTable = TableRegistry::get('Admin.Testimonials');
			$testimonial_data = $TestimonialsTable->get($id);
			@unlink(WWW_ROOT."uploads/testimonial/".$testimonial_data->image);
			@unlink(WWW_ROOT."uploads/testimonial/thumb/".$testimonial_data->image);
			$TestimonialsTable->delete($testimonial_data);
			echo json_encode(array('type' => 'success', 'deleted_id' => $id, 'message' => 'Testimonial deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
		exit();
    }
	
	public function activeMultiple($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Testimonials'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Testimonials')))) || $session->read('permissions.'.strtolower('Testimonials').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
		$this->request->allowMethod(['post']);
		$TestimonialsTable = TableRegistry::get('Admin.Testimonials');
		if(!empty($this->request->data['id'])){
			foreach($this->request->data['id'] as $val_id){
				$TestimonialsTable->updateAll(['status'=>'A'], ['Testimonials.id IN' => $this->request->data['id']]);
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
		if( (empty($session->read('permissions.'.strtolower('Testimonials'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Testimonials')))) || $session->read('permissions.'.strtolower('Testimonials').'.'.strtolower('change-status'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post']);
		if(!empty($this->request->data['id'])) {
			$TestimonialsTable = TableRegistry::get('Admin.Testimonials');
			foreach($this->request->data['id'] as $val_id){
				$TestimonialsTable->updateAll(['status'=>'I'], ['Testimonials.id' => $val_id]);				
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
		if( (empty($session->read('permissions.'.strtolower('Testimonials'))) || (!array_key_exists('delete-testimonial',$session->read('permissions.'.strtolower('Testimonials')))) || $session->read('permissions.'.strtolower('Testimonials').'.'.strtolower('delete-testimonial'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->viewBuilder()->layout(false);
		$this->render(false);
        $this->request->allowMethod(['post', 'delete']);
		if(!empty($this->request->data['id'])){
			$deleted_ids = array();
			$TestimonialsTable = TableRegistry::get('Admin.Testimonials');
			foreach($this->request->data['id'] as $val_id){	
				$testimonial_data = $TestimonialsTable->get($val_id);
				@unlink(WWW_ROOT."uploads/testimonial/".$testimonial_data->image);
				@unlink(WWW_ROOT."uploads/testimonial/thumb/".$testimonial_data->image);
				$TestimonialsTable->delete($testimonial_data);
				$deleted_ids[] = $val_id;
			}
			echo json_encode(array('type' => 'success', 'deleted_ids' => $deleted_ids, 'message' => 'Testimonial(s) deleted successfully'));
		}else{
			echo json_encode(array('type' => 'error', 'deleted_ids' => '', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
        exit();
    }
	
}