<?php
App::uses('AppController', 'Controller');
/**
 * Books Controller
 *
 * @property Book $Book
 */
class BooksController extends AppController {

	public $paginate = array(
		'order' => array('created'=>'desc'),
		'limit' => 5
		);
/**
 * index method
 * hiển thị 10 quyển sách mới nhất trên trang chủ
 * @return void
 */
	public function index() {
		//$this->Book->recursive = 0;
		//$this->set('books', $this->paginate());
		$books = $this->Book->latest();
		$this->set('books',$books);
	}
/**
 * latest_books method
 * hiển thị tất cả quyển sách và sắp xếp theo thứ tự từ mới đến cũ
 * phân trang dữ liệu
 */
	public function latest_books(){
		$this->paginate = array(
			'fields' => array('id','title','slug','image','sale_price'),
			'order' => array('created'=>'desc'),
			'limit' => 5,
			'contain' => array(
				'Writer' => array('name','slug')
				),
			'conditions' => array('published' => 1),
			'paramType' => 'querystring'
			);
		$books = $this->paginate();
		$this->set('books',$books);
	}

/**
 * view method
 * Xem thông tin chi tiết một quyển sách
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($slug = null) {
		$options = array(
			'conditions' => array(
				'Book.slug' => $slug
			));
		$book = $this->Book->find('first', $options);
		//pr($book);
		if (empty($book)) {
			throw new NotFoundException(__('Không tìm thấy quyển sách này!'));
		}
		$this->set('book', $book);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Book->create();
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Book->Category->find('list');
		$writers = $this->Book->Writer->find('list');
		$this->set(compact('categories', 'writers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Book->exists($id)) {
			throw new NotFoundException(__('Invalid book'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
			$this->request->data = $this->Book->find('first', $options);
		}
		$categories = $this->Book->Category->find('list');
		$writers = $this->Book->Writer->find('list');
		$this->set(compact('categories', 'writers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Book->delete()) {
			$this->Session->setFlash(__('Book deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Book was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
