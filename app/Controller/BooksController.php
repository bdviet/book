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
 * Hàm xử lý get_keyword
 */
	public function get_keyword(){
		if($this->request->is('post')){
			$this->Book->set($this->request->data);
			if($this->Book->validates()){
				$keyword = $this->request->data['Book']['keyword'];
			}else{
				$errors = $this->Book->validationErrors;
				$this->Session->write('search_validation',$errors);
			}
			$this->redirect(array('action'=>'search','keyword'=>$keyword));
		}
	}

/**
 * tìm kiếm sách
 */	
	public function search(){
		$notfound = false;
		//pr($this->request->params);
		//pr($this->passedArgs);
		if(!empty($this->request->params['named']['keyword'])){
			$keyword = $this->request->params['named']['keyword'];
			$this->paginate = array(
				'fields' => array('title','image','sale_price','slug'),
				'contain' => array('Writer.name','Writer.slug'),
				'order' => array('Book.created'=>'desc'),
				'conditions'=> array(
					'Book.published' => 1,
					'or'=>array(
						'title like' => '%'.$keyword.'%',
						'Writer.name like' => '%'.$keyword.'%',)
					),
				'joins' => array(
					array(
						'table' => 'books_writers',
						'alias' => 'BookWriter',
						'conditions' => 'BookWriter.book_id = Book.id'
						),
					array(
						'table' => 'writers',
						'alias' => 'Writer',
						'conditions' => 'BookWriter.writer_id = Writer.id'
						)
					),
				'limit'=>5
				);
			$books = $this->paginate('Book');
			//$books = $this->Book->find('all',);
			//pr($books);
			if(!empty($books)){
				$this->set('results',$books);
			}else{
				$notfound = true;
			}
			$this->set('keyword',$keyword);
		}
		if($this->Session->check('search_validation')){
			$this->set('errors',$this->Session->read('search_validation'));
			$this->Session->delete('search_validation');
		}
		$this->set('notfound',$notfound);
	}


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
			),
			'contain' => array(
				'Writer'=>array('name','slug')
				),
			);
		$book = $this->Book->find('first', $options);
		//pr($book);
		if (empty($book)) {
			throw new NotFoundException(__('Không tìm thấy quyển sách này!'));
		}
		$this->set('book', $book);
		//hiển thị comments
		$this->loadModel('Comment');
		$comments = $this->Comment->find('all',array(
			'conditions' => array(
				'book_id' => $book['Book']['id']
				),
			'order' => array('Comment.created'=>'asc'),
			'contain' => array(
				'User' => array('username')
				)
			));
		//pr($comments);
		$this->set('comments',$comments);
		//hiển thị sách liên quan
		$related_books = $this->Book->find('all',array(
			'fields'=>array('title','image','sale_price','slug'),
			'conditions' => array(
				'category_id' => $book['Book']['category_id'],
				'Book.id <>' => $book['Book']['id'],
				'published' => 1
				),
			'limit' => 5,
			'order'=> 'rand()',
			'contain' => array(
				'Writer'=> array('name','slug')
				)
			));
		//pr($related_books);
		$this->set('related_books',$related_books);
		//báo lỗi xác thực dữ liệu khi gởi comment
		if($this->Session->check('comment_errors')){
			$errors = $this->Session->read('comment_errors');
			$this->set('errors',$errors);
			$this->Session->delete('comment_errors');
		}


	}

	public function update_comment(){
		$books = $this->Book->find('all',array(
			'fields'=>'id',
			'contain' => 'Comment'
			));
		//pr($books);
		foreach ($books as $book) {
			//echo count($book['Comment']).'<br>';
			if(count($book['Comment'])>0){
				$this->Book->updateAll(
					array('comment_count'=>count($book['Comment'])),
					array('Book.id'=>$book['Book']['id'])
					);
			}
		}
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
