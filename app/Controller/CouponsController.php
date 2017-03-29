<?php
App::uses('AppController', 'Controller');
/**
 * Coupons Controller
 *
 * @property Coupon $Coupon
 */
class CouponsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Coupon->recursive = 0;
		$this->set('coupons', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Coupon->exists($id)) {
			throw new NotFoundException(__('Invalid coupon'));
		}
		$options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
		$this->set('coupon', $this->Coupon->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	
	public function add() {
		if ($this->request->is('post')) {
			$code = $this->request->data['Coupon']['code'];
			$coupon = $this->Coupon->findByCode($code);
			if(!empty($coupon)){
				$today = date('Y-m-d H:i:s');
				if($this->Tool->between($today, $coupon['Coupon']['time_start'], $coupon['Coupon']['time_end'])){
					$this->Session->write('payment.coupon', $coupon['Coupon']['code']);
					$this->Session->write('payment.discount', $coupon['Coupon']['percent']);
					$total = $this->Session->read('payment.total');
					$pay = $total - $coupon['Coupon']['percent']/100*$total;
					$this->Session->write('payment.pay', $pay);
				}else{
					$this->Session->setFlash('Mã giảm giá đã hết hạn!', 'default', array('class'=>'alert alert-danger'), 'coupon');	
				}
			}else{
				$this->Session->setFlash('Sai mã giảm giá!', 'default', array('class'=>'alert alert-danger'), 'coupon');
			}
			$this->redirect($this->referer());
		}
	}
	/*public function add() {
		if ($this->request->is('post')) {
			$this->Coupon->create();
			if ($this->Coupon->save($this->request->data)) {
				$this->Session->setFlash(__('The coupon has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coupon could not be saved. Please, try again.'));
			}
		}
	}*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Coupon->exists($id)) {
			throw new NotFoundException(__('Invalid coupon'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Coupon->save($this->request->data)) {
				$this->Session->setFlash(__('The coupon has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coupon could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
			$this->request->data = $this->Coupon->find('first', $options);
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
		$this->Coupon->id = $id;
		if (!$this->Coupon->exists()) {
			throw new NotFoundException(__('Invalid coupon'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Coupon->delete()) {
			$this->Session->setFlash(__('Coupon deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Coupon was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
