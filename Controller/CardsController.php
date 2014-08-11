<?php
App::uses('AppController', 'Controller');
/**
 * Tes Controller
 *
 * @property Te $Te
 * @property PaginatorComponent $Paginator
 */
class CardsController extends AppController {

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
		$this->set('title_for_layout', 'Galeria del Te');
		$this->Card->recursive = 0;
		$this->set('cards', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Card->exists($id)) {
			throw new NotFoundException(__('Invalid te'));
		}
		$options = array('conditions' => array('Te.' . $this->Card->primaryKey => $id));
		$this->set('te', $this->Card->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($user_id = null) {
		$addresses = $this->Card->Address->find('list', array(
		                                      'conditions'=>array('Address.usuario_id'=>$user_id, 'Address.type'=>1),
		                                      ));
		$this->set(compact('addresses'));

		if ($this->request->is('post')) {
			$this->Card->create();
			if ($this->Card->save($this->request->data)) {
				$this->Session->setFlash(__('The te has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The te could not be saved. Please, try again.'));
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
		$this->checkAccess('admin');
		if (!$this->Card->exists($id)) {
			throw new NotFoundException(__('Invalid te'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Card->save($this->request->data)) {
				$this->Session->setFlash(__('The te has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The te could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Te.' . $this->Card->primaryKey => $id));
			$this->request->data = $this->Card->find('first', $options);
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
		$this->checkAccess('admin');
		$this->Card->id = $id;
		if (!$this->Card->exists()) {
			throw new NotFoundException(__('Invalid te'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Card->delete()) {
			$this->Session->setFlash(__('The te has been deleted.'));
		} else {
			$this->Session->setFlash(__('The te could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
