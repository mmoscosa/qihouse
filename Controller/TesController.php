<?php
App::uses('AppController', 'Controller');
/**
 * Tes Controller
 *
 * @property Te $Te
 * @property PaginatorComponent $Paginator
 */
class TesController extends AppController {

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
		$this->Te->recursive = 0;
		$this->set('tes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Te->exists($id)) {
			throw new NotFoundException(__('Invalid te'));
		}
		$options = array('conditions' => array('Te.' . $this->Te->primaryKey => $id));
		$this->set('te', $this->Te->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Te->create();
			if ($this->Te->save($this->request->data)) {
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
		if (!$this->Te->exists($id)) {
			throw new NotFoundException(__('Invalid te'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Te->save($this->request->data)) {
				$this->Session->setFlash(__('The te has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The te could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Te.' . $this->Te->primaryKey => $id));
			$this->request->data = $this->Te->find('first', $options);
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
		$this->Te->id = $id;
		if (!$this->Te->exists()) {
			throw new NotFoundException(__('Invalid te'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Te->delete()) {
			$this->Session->setFlash(__('The te has been deleted.'));
		} else {
			$this->Session->setFlash(__('The te could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
