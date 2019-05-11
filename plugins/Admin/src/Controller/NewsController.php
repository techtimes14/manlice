<?php
namespace Admin\Controller;
use Admin\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;
require_once(ROOT . DS . 'vendor' . DS . "verot/class.upload.php/src" . DS . "class.upload.php");
/**
 * News Controller
 *
 * @property \Admin\Model\Table\NewsTable $News
 */
class NewsController extends AppController{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
    }

    /**
     * index method
     * @return \Cake\Network\Response|void Redirects to the list data
    */
    public function index(){
        return $this->redirect(['plugin' => 'admin', 'controller' => 'News', 'action' => 'listData']);
    }

    /**
     * List Content Category Data
     * @param  string|null $page page type.
     * @return \Cake\Network\Response|void renders view.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function listCategory($page = NULL){
        try{
			$session = $this->request->session();
			if( (empty($session->read('permissions.'.strtolower('News'))) || (!array_key_exists('list-category',$session->read('permissions.'.strtolower('News')))) || $session->read('permissions.'.strtolower('News').'.'.strtolower('list-category'))!=1) ){
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
            $NewsCategoriesTable = TableRegistry::get('Admin.NewsCategories');
            $this->loadModel('Admin.NewsCategories');
            $categoryDetails = $this->paginate($this->NewsCategories, $options);
            $this->set(compact('categoryDetails'));
            $this->set('_serialize', ['categoryDetails']);
        }catch (NotFoundException $e) {
            throw new NotFoundException(__('There is an unexpected error'));
        }
    }

    public function addNewsCategory($id = NULL){
		$session = $this->request->session();
		if( (empty($session->read('permissions.'.strtolower('News'))) || (!array_key_exists('add-news-category',$session->read('permissions.'.strtolower('News')))) || $session->read('permissions.'.strtolower('News').'.'.strtolower('add-news-category'))!=1) ){
			$this->Flash->error(__("You don't have permission to access this page"));
			return $this->redirect(['plugin' => 'admin', 'controller' => 'admin-details', 'action' => 'dashboard']);
		}
        $NewsCategoriesTable = TableRegistry::get('Admin.NewsCategories');
        if($id != '') {
            $id = base64_decode($id);
            $news_categories = $NewsCategoriesTable->get($id);
            if ($this->request->is(['post', 'put'])) {
                $updated_data = $NewsCategoriesTable->patchEntity($news_categories, $this->request->data);
                if ($savedData = $NewsCategoriesTable->save($updated_data)) {
                    $this->Flash->success(__('Category has been updated successfully'));
                    return $this->redirect(['plugin' => 'admin','controller' => 'news','action' => 'list-category']);
                } else {
                    $this->Flash->error(__('Category is not updated.'));
                }
            }
            $this->set(compact('news_categories','id'));
        }
        else {
            $news_categories = $NewsCategoriesTable->newEntity();
            if ($this->request->is('post')) {
                $this->request->data['slug'] = strtolower(Inflector::slug($this->request->data['title']));
                $options['conditions']	= ['NewsCategories.slug'=>$this->request->data['slug']];
                $exist = $NewsCategoriesTable->find('all', $options)->toArray();

                if(!$exist) {
                    $inserted_data = $NewsCategoriesTable->patchEntity($news_categories, $this->request->data);

                    if ($savedData = $NewsCategoriesTable->save($inserted_data)) {
                        $this->Flash->success(__('New category has been created successfully'));
                        return $this->redirect(['plugin' => 'admin','controller' => 'news','action' => 'list-category']);
                    } else {
                        $this->Flash->error(__('Category is not created.'));
                    }
                } else {
                    $this->Flash->error(__('Category already exists.'));
                }
            }
            $this->set(compact('news_categories'));
        }
        $this->set('_serialize', ['news_categories']);
    }

}
?>