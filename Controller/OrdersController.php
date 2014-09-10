<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'Openpay', array('file' => 'Openpay/Openpay.php'));
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

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
		$this->Order->recursive = 0;
		$this->set('orders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Order->Usuario->find('list');
		$addresses = $this->Order->Address->find('list');
		$products = $this->Order->Product->find('list');
		$this->set(compact('usuarios', 'addresses', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$usuarios = $this->Order->Usuario->find('list');
		$addresses = $this->Order->Address->find('list');
		$products = $this->Order->Product->find('list');
		$this->set(compact('usuarios', 'addresses', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('The order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function payment_slip($id = null) {
		$this->layout = null ;
		$openpay = Configure::read('openpay');
		$openpay = Openpay::getInstance($openpay['merchant_id'], $openpay['private_key']);
		$order = $this->Order->find('first', array('conditions'=>array('Order.id'=>$id)));
		$openpayDetails = $openpay->charges->get($order['Order']['token_id']);
		$this->set(compact('openpayDetails', 'order'));
	}

	public function bank_transfer($id = null) {
		$this->layout = null ;
		$openpay = Configure::read('openpay');
		$openpay = Openpay::getInstance($openpay['merchant_id'], $openpay['private_key']);
		$order = $this->Order->find('first', array('conditions'=>array('Order.id'=>$id)));
		$openpayDetails = $openpay->charges->get($order['Order']['token_id']);
		$this->set(compact('openpayDetails', 'order'));
	}
}
