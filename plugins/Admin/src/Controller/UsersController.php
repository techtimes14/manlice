<?php
namespace Admin\Controller;
use Admin\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
require_once(ROOT . DS . 'vendor' . DS . "verot/class.upload.php/src" . DS . "class.upload.php");

/**
 * Users Controller
 *
 * @property \Admin\Model\Table\UsersTable $User
 */
class UsersController extends AppController{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
    }

    public function index(){
        return $this->redirect(['plugin' => 'admin', 'controller' => 'users', 'action' => 'list-data']);
    }

    public function listData(){
        try {
			$session = $this->request->session();
			if( (empty($session->read('permissions.'.strtolower('Users'))) || (!array_key_exists('list-data',$session->read('permissions.'.strtolower('Users')))) || $session->read('permissions.'.strtolower('Users').'.'.strtolower('list-data'))!=1) ){
				$this->Flash->error(__("You don't have permission to access this page."));
				return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
			}
            // ************** start search filter **************** //
            if ($this->request->is('get')) {
				if (isset($this->request->query['search']) && !empty($this->request->query['search'])){					
                    $name = explode(' ', $this->request->query['search']);
                    if (isset($name[1])) {
                        if (!empty($name[1])) {
                           $options['conditions']['OR'][] = array('OR' => array('Users.full_name LIKE' => $name[0].'%'));
                        } else {
                            $options['conditions']['OR'][] = array('OR' => array('Users.full_name LIKE' => $name[0].'%'));
                        }
                    } else {
                        $options['conditions']['OR'][] = array('OR' => array('Users.full_name LIKE' => $name[0].'%'));
                    }
                }                
            }
			$options['order'] = array('Users.id DESC');
            $options['limit'] = $this->paginationLimit;            
            $userDetails = $this->paginate($this->Users, $options);			
			//pr($userDetails); die;
			
			$UsersTable = TableRegistry::get('Users');
			$alphabet_options['conditions']	= ['Users.status'=>'A'];
			$alphabet_options['fields']		= ['Users.id','Users.full_name'];
			$alphabet_options['order'] 		= ['Users.full_name'=>'ASC'];
			$all_characters = $UsersTable->find('all', $alphabet_options)->toArray();
			$alphabets_only=array();
			if(!empty($all_characters)){
				foreach($all_characters as $characters){
					$key = strtolower(substr($characters['full_name'],0,1));
					$alphabets_only[$key][] = $characters;
				}
			}			
            $this->set(compact('userDetails','alphabets_only'));
            $this->set('_serialize', ['userDetails']);
        } catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }

    public function addUser(){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Users'))) || (!array_key_exists('add-user',$session->read('permissions.'.strtolower('Users')))) || $session->read('permissions.'.strtolower('Users').'.'.strtolower('add-user'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page."));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
		$UsersTable = TableRegistry::get('Admin.Users');
        $user = $UsersTable->newEntity();
        if ($this->request->is('post')) {
			$user = $UsersTable->patchEntity($user, $this->request->data);			
            if ($savedData = $UsersTable->save($user)) {
				$this->Flash->success(__('New user has been created successfully.'));
                return $this->redirect(['plugin' => 'admin', 'controller' => 'users', 'action' => 'list-data']);
            } else {
                $this->Flash->error(__('User is not created. There is an unexpected error. Try contacting the developers'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function editUser($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Users'))) || (!array_key_exists('edit-user',$session->read('permissions.'.strtolower('Users')))) || $session->read('permissions.'.strtolower('Users').'.'.strtolower('edit-user'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page."));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        if ($id == NULL) {
            throw new NotFoundException(__('Page not found'));
        }
        $id = base64_decode($id);
		$UsersTable = TableRegistry::get('Admin.Users');
        $user = $UsersTable->get($id, ['contain'=>[]]);
		//pr($user); die;
        if (empty($user)) {
            throw new NotFoundException(__('Page not found'));
        }
        // ***** if data recieved by post or put ***** //
        if ($this->request->is(['post', 'put'])) {
			$this->request->data['birthday']	= date('Y-m-d', strtotime($this->request->data['birthday']));
			$inserted_data = $UsersTable->patchEntity($user, $this->request->data);
            if ($savedData = $UsersTable->save($inserted_data)) {
				$this->Flash->success(__('User profile has been successfully updated'));
                return $this->redirect(['plugin' => 'Admin', 'controller' => 'users', 'action' => 'list-data']);
            } else {
                $this->Flash->error(__('User profile is not updated. There is an unexpected error. Try contacting the developers'));
            }
        }
		// ***** if data recieved by post or put ***** //
		$this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function deleteUser($id = NULL){
		$this->viewBuilder()->layout(false);
		$this->render(false);
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Users'))) || (!array_key_exists('delete-user',$session->read('permissions.'.strtolower('Users')))) || $session->read('permissions.'.strtolower('Users').'.'.strtolower('delete-user'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page."));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
		$id = isset($this->request->data['id'])?$this->request->data['id']:'';
		if($id == NULL){
            throw new NotFoundException(__('Page not found'));
        }
		$this->request->allowMethod(['post', 'delete']);
		if($id != ''){
			$UsersTable = TableRegistry::get('Admin.Users');			
			$user_data = $UsersTable->get($id);
			$UsersTable->delete($user_data);
			echo json_encode(array('type' => 'success', 'deleted_id' => $id, 'message' => 'User deleted successfully'));			
		}else{
			echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
		exit();
    }

    public function deleteMultiple($id = NULL){
        $this->viewBuilder()->layout(false);
		$this->render(false);
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Users'))) || (!array_key_exists('delete-user',$session->read('permissions.'.strtolower('Users')))) || $session->read('permissions.'.strtolower('Users').'.'.strtolower('delete-user'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page."));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->request->allowMethod(['post', 'delete']);
		if(!empty($this->request->data['id'])){
			$deleted_users_count = 0;
			foreach($this->request->data['id'] as $val_id){
				$UsersTable = TableRegistry::get('Admin.Users');			
				$user_data = $UsersTable->get($val_id);
				$UsersTable->delete($user_data);
				
				$deleted_user_ids[] = $val_id;
				$deleted_users_count++;
				$non_deleted_users_count = 0;				
			}			
			if( (count($this->request->data['id']) == $deleted_users_count) && ($non_deleted_users_count == 0) ){
				$deleted_user_ids = $this->request->data['id'];
				echo json_encode(array('type' => 'success', 'deleted_ids' => $deleted_user_ids, 'delete_count' => '1', 'message' => 'User(s) deleted successfully'));
			}
			else{
				echo json_encode(array('type' => 'warning', 'deleted_ids' => $deleted_user_ids, 'delete_count' => '3', 'message' => 'Some user(s) related question(s) exist, delete question(s) first!!!'));
			}
		}else{
			echo json_encode(array('type' => 'error', 'deleted_ids' => '', 'delete_count' => '', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
        exit();
    }
    
    public function activeMultiple($id = NULL){
        $this->viewBuilder()->layout(false);
		$this->render(false);
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Users'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Users')))) && $session->read('permissions.'.strtolower('Users').'.'.strtolower('change-status'))!=1) ){
			/*echo json_encode(array('permission error'));
			exit();*/
			$this->Flash->error(__("You don't have permission to access this page."));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->request->allowMethod(['post']);
		$UsersTable = TableRegistry::get('Admin.Users');
		if(!empty($this->request->data['id'])){
			$UsersTable->updateAll(['status'=>'A'],  ['Users.id IN' => $this->request->data['id']]);
			$ids = $this->request->data['id'];			
			echo json_encode($ids);
		}else{
			$ids = '';
			echo $ids;
		}
        exit();
    }
    
	public function inactiveMultiple($id = NULL){
        $this->viewBuilder()->layout(false);
		$this->render(false);
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Users'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Users')))) || $session->read('permissions.'.strtolower('Users').'.'.strtolower('change-status'))!=1) ){
			/*echo json_encode(array('type' => 'error', 'delete_count' => '', 'message' => "You don't have permission to access this page"));
			exit();*/
			$this->Flash->error(__("You don't have permission to access this page."));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->request->allowMethod(['post']);		
		if(!empty($this->request->data['id'])){
			$non_activated_users_count=0; $activated_users_count=0;
			$QuestionsTable = TableRegistry::get('Admin.Questions');
			$UsersTable = TableRegistry::get('Admin.Users');
			foreach($this->request->data['id'] as $val_id){				
				$question_data = $QuestionsTable->find('all')->where(['Questions.user_id' => $val_id, 'Questions.status' => 'A'])->count();
				if( $question_data == 0 ){
					$UsersTable->updateAll(['status'=>'I'], ['id' => $val_id]);
					$activated_users_count++;
					$non_activated_users_count = 0;						
				}
				else{
					$activated_users_count = 0;
					$non_activated_users_count++;					
				}				
			}
			
			if( (count($this->request->data['id']) == $activated_users_count) && ($non_activated_users_count == 0) ){
				echo json_encode(array('type' => 'success', 'delete_count' => '1', 'message' => 'Users successfully inactivated'));
			}
			else if( ($activated_users_count == 0) && (count($this->request->data['id']) == $non_activated_users_count) ){
				echo json_encode(array('type' => 'error', 'delete_count' => '2', 'message' => 'Selected user related question(s) exist, inactive question(s) first!!!'));
			}
			else{
				echo json_encode(array('type' => 'warning', 'delete_count' => '3', 'message' => 'Some user(s) related question(s) exist, inactive question(s) first!!!'));
			}
		}else{
			echo json_encode(array('type' => 'error', 'delete_count' => '', 'message' => 'There is an unexpected error. Try contacting the developers'));
		}
		exit();
    }
    
	public function changeStatus($id = NULL, $status = NULL){
        $this->viewBuilder()->layout(false);
		$this->render(false);
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Users'))) || (!array_key_exists('change-status',$session->read('permissions.'.strtolower('Users')))) || $session->read('permissions.'.strtolower('Users').'.'.strtolower('change-status'))!=1) ){
			/*echo json_encode(array('type' => 'error', 'message' => "You don't have permission to access this page"));
			exit();*/
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $this->request->allowMethod(['post', 'ajax', 'put']);
		$id = $this->request->data['id'];
		if($id == NULL){
            throw new NotFoundException(__('Page not found'));
        }
		if($id != ''){
			$UsersTable = TableRegistry::get('Admin.Users');
			$query = $UsersTable->query();
			if($this->request->data['status'] == 'I'){	//request for making this user as inactive
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'User successfully inactivated'));
				}else{
					echo json_encode(array('type' => 'error', 'message' => 'There is an unexpected error. Try contacting the developers'));
				}
			}else if($this->request->data['status'] == 'A'){
				if($query->update()
				->set(['status' => $this->request->data['status']])
				->where(['id' => $id])
				->execute()){
					echo json_encode(array('type' => 'success', 'message' => 'User successfully activated'));
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
	
	public function userAccountSetting($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Users'))) || (!array_key_exists('user-account-setting',$session->read('permissions.'.strtolower('Users')))) || $session->read('permissions.'.strtolower('Users').'.'.strtolower('user-account-setting'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page."));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        if ($id == NULL) {
            throw new NotFoundException(__('Page not found'));
        }
        $id = base64_decode($id);
		$UserAccountSettingTable = TableRegistry::get('Admin.UserAccountSetting');
        $existing_account_settings = $UserAccountSettingTable->find('all',['contain'=>['Users'=>['fields'=>['id','email','notification_email']]],'conditions'=>['user_id'=>$id]])->first();
		$QuestionTable = TableRegistry::get('Admin.Questions');
		$question_categories = $this->getQuestionCategories();	//mention in AppController
        if (empty($id)) {
            throw new NotFoundException(__('Page not found'));
        }
        // ***** if data recieved by post or put ***** //
        if ($this->request->is(['post', 'put'])){
			$account_settings = $UserAccountSettingTable->find('all',['conditions'=>['user_id'=>$id]])->first();
			if(empty($account_settings)){
				$this->request->data['user_id']	= $existing_account_settings['user_id'];
				$settings = $UserAccountSettingTable->newEntity();
				$data_to_insert = $UserAccountSettingTable->patchEntity($settings, $this->request->data);
				if($savedData = $UserAccountSettingTable->save($data_to_insert)){
					$this->Flash->success(__('Account settings successfully updated.'));					
					return $this->redirect(['plugin' => 'admin', 'controller' => 'users', 'action' => 'list-data']);					
				}else{
					return $this->redirect(['plugin' => 'admin', 'controller' => 'users', 'action' => 'list-data']);
					$this->Flash->error(__('There was an unexpected error. Try again later or contact the developers.'));					
				}
			}else{
				$this->request->data['user_id']	= $existing_account_settings['user_id'];
				if(!array_key_exists('response_to_my_question_notification',$this->request->data)){
					$this->request->data['response_to_my_question_notification'] = 0;
				}
				if(!array_key_exists('news_notification',$this->request->data)){
					$this->request->data['news_notification'] = 0;
				}
				if(!array_key_exists('follow_twitter',$this->request->data)){
					$this->request->data['follow_twitter'] = 0;
				}
				if(!array_key_exists('posting_new_question_notification',$this->request->data)){
					$this->request->data['posting_new_question_notification'] = 0;
					$this->request->data['category_id'] = 0;
				}
				$data_to_update = $UserAccountSettingTable->patchEntity($existing_account_settings, $this->request->data);
				if($savedData = $UserAccountSettingTable->save($data_to_update)){
					$this->Flash->success(__('Account settings successfully updated.'));
					return $this->redirect(['plugin' => 'admin', 'controller' => 'users', 'action' => 'list-data']);
				}else{
					return $this->redirect(['plugin' => 'admin', 'controller' => 'users', 'action' => 'list-data']);
					$this->Flash->error(__('There was an unexpected error. Try again later or contact the developers.'));					
				}
			}
        }
		// ***** if data recieved by post or put ***** //		
		$this->set(compact('existing_account_settings','question_categories'));
        $this->set('_serialize', ['existing_account_settings']);
    }
	
	public function userChangePassword($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Users'))) || (!array_key_exists('user-change-password',$session->read('permissions.'.strtolower('Users')))) || $session->read('permissions.'.strtolower('Users').'.'.strtolower('user-change-password'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page."));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        if ($id == NULL) {
            throw new NotFoundException(__('Page not found'));
        }
        $id = base64_decode($id);
		if (empty($id)) {
            throw new NotFoundException(__('Page not found'));
        }
		$UserTable = TableRegistry::get('Admin.Users');
		$password = $UserTable->get($id);
        // ***** if data recieved by post or put ***** //
        if ($this->request->is(['post', 'put'])){
			$this->request->data['password'] = $this->request->data['new_password'];
            $password = $UserTable->patchEntity($password, $this->request->data, ['validate' => 'password']);
			if($UserTable->save($password)){
				$this->Flash->success(__('Password successfully updated.'));					
				return $this->redirect(['plugin' => 'admin', 'controller' => 'users', 'action' => 'list-data']);					
			}else{
				$this->Flash->error(__('There was an unexpected error. Try again later or contact the developers.'));
				return $this->redirect(['plugin' => 'admin', 'controller' => 'users', 'action' => 'list-data']);				
			}
        }
		// ***** if data recieved by post or put ***** //		
		$this->set(compact('password'));
        $this->set('_serialize', ['password']);
    }
	
	//all submitted details for a particular user
	public function userSubmittedDetails($user_id=NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('Users'))) || (!array_key_exists('user-submitted-details',$session->read('permissions.'.strtolower('Users')))) || $session->read('permissions.'.strtolower('Users').'.'.strtolower('user-submitted-details'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page."));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
		$user_id = isset($user_id)?base64_decode($user_id):'';
		if ($user_id == NULL) {
            throw new NotFoundException(__('Page not found'));
        }
		//submitted questions start//
		$QuestionTable = TableRegistry::get('Questions');
		$submitted_questions = $QuestionTable->find('all',['contain'=>['QuestionCategories'],'conditions'=>['user_id'=>$user_id],'fields'=>['id','category_id','user_id','name','is_featured','status','created','QuestionCategories.id','QuestionCategories.name'],'order'=>['Questions.id DESC']])->toArray();
		//submitted questions end//
		
		//submitted question comments//
		$QuestionCommentTable = TableRegistry::get('Admin.QuestionComments');
		$comment_details = $QuestionCommentTable->find('all',['contain'=>['Questions'=>['fields'=>['id','user_id','name']]],'conditions'=>['QuestionComments.user_id'=>$user_id],'fields'=>['QuestionComments.id','QuestionComments.question_id','QuestionComments.user_id','QuestionComments.comment','QuestionComments.status','QuestionComments.created'],'order'=>['QuestionComments.id DESC']])->toArray();
		//submitted question comments//
		
		//submitted question answers//
		$QuestionAnswersTable = TableRegistry::get('Admin.QuestionAnswers');
		$answer_details = $QuestionAnswersTable->find('all',['contain'=>['Questions'=>['fields'=>['id','user_id','name']]],'conditions'=>['QuestionAnswers.user_id'=>$user_id],'fields'=>['QuestionAnswers.id','QuestionAnswers.question_id','QuestionAnswers.user_id','QuestionAnswers.learning_path_recommendation','QuestionAnswers.status','QuestionAnswers.created'],'order'=>['QuestionAnswers.id DESC']])->toArray();		
		//submitted question answers//
		
		//submitted answer comments//
		$AnswerCommentTable = TableRegistry::get('Admin.AnswerComment');			
		$answer_comment_details = $AnswerCommentTable->find('all',['contain'=>['Questions'=>['fields'=>['id','user_id','name']]],'conditions'=>['AnswerComment.user_id'=>$user_id],'fields'=>['AnswerComment.id','AnswerComment.question_id','AnswerComment.user_id','AnswerComment.comment','AnswerComment.status','AnswerComment.created'],'order'=>['AnswerComment.id DESC']])->toArray();		
		//submitted answer comments//
		
		$this->set(compact('submitted_questions','comment_details','answer_details','answer_comment_details'));
		//pr($answer_comment_details); die;
	}	
	
}
