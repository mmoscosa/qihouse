<?php
App::uses('AppController', 'Controller');
/**
 * Extras Controller
 *
 * @property Extra $Extra
 * @property PaginatorComponent $Paginator
 */
class ExtrasController extends AppController {

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
		$this->Extra->recursive = 0;
		$this->set('extras', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->checkAccess();
		if (!$this->Extra->exists($id)) {
			throw new NotFoundException(__('Invalid extra'));
		}
		$options = array('conditions' => array('Extra.' . $this->Extra->primaryKey => $id));
		$this->set('extra', $this->Extra->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->checkAccess('admin');
		if ($this->request->is('post')) {
			$this->Extra->create();
			if ($this->Extra->save($this->request->data)) {
				$this->Session->setFlash(__('The extra has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The extra could not be saved. Please, try again.'));
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
		if (!$this->Extra->exists($id)) {
			throw new NotFoundException(__('Invalid extra'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Extra->save($this->request->data)) {
				$this->Session->setFlash(__('The extra has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The extra could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Extra.' . $this->Extra->primaryKey => $id));
			$this->request->data = $this->Extra->find('first', $options);
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
		$this->Extra->id = $id;
		if (!$this->Extra->exists()) {
			throw new NotFoundException(__('Invalid extra'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Extra->delete()) {
			$this->Session->setFlash(__('The extra has been deleted.'));
		} else {
			$this->Session->setFlash(__('The extra could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
