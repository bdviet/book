<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

/**
 * Menu categories
 */
	public function menu(){
		if($this->request->is('requested')){
			$categories = $this->Category->find('all',array(
			'recursive'=>-1,
			'order' => array('name'=>'asc')
			));
			return $categories;
		}
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
	}

/**
 * view method
 * Xem chi tiết một danh mục sách, 
 * phân trang dữ liệu books của danh mục đang xem
 * @throws NotFoundException
 * @param string $slug
 * @return void
 */
	public function view($slug = null) {
		$options = array(
			'conditions' => array('Category.slug' => $slug),
			'recursive' => -1
			);
		$category = $this->Category->find('first', $options);
		if (empty($category)) {
			throw new NotFoundException(__('Không tìm thấy'));
		}
		$this->set('category', $category);
		//phân trang dữ liệu books
		$this->paginate = array(
			'fields' => array('id','title','slug','image','sale_price'),
			'order' => array('created'=>'desc'),
			'limit' => 5,
			'contain' => array(
				'Writer' => array('name','slug'),
				'Category'=> array('slug')
				),
			'conditions' => array(
				'published' => 1,
				'Category.slug' => $slug
				),
			'paramType' => 'querystring'
			);
		$books = $this->paginate('Book');
		$this->set('books',$books);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Category->delete()) {
			$this->Flash->success(__('The category has been deleted.'));
		} else {
			$this->Flash->error(__('The category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
