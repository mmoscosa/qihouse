<?php
App::uses('AppController', 'Controller');
/**
 * Detalles Controller
 *
 * @property Detalle $Detalle
 * @property PaginatorComponent $Paginator
 */
class DetallesController extends AppController {

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
		$this->checkAccess('admin');
		$this->Detalle->recursive = 0;
		$this->set('detalles', $this->Paginator->paginate());
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
		if (!$this->Detalle->exists($id)) {
			throw new NotFoundException(__('Invalid detalle'));
		}
		$options = array('conditions' => array('Detalle.' . $this->Detalle->primaryKey => $id));
		$this->set('detalle', $this->Detalle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($usuario_id = null, $tipo = null) {
		if(empty($usuario_id)){throw new NotFoundException(__('No se encuentra el usuario'));}
		if (!empty($tipo)) {
			$this->set(compact('tipo'));
		}
		if ($this->request->is('post')) {
			if(!empty($this->request->data['Detalle']['giro']) && $this->request->data['Detalle']['giro'] == 'Otro' && !empty($this->request->data['giro']['otro'])){
				$this->request->data['Detalle']['giro'] = $this->request->data['giro']['otro'];
			}
			$this->request->data['Detalle']['usuario_id'] = $usuario_id;
			$this->request->data['Detalle']['mas_info'] = json_encode($this->request->data['Detalle']['mas_info'], JSON_UNESCAPED_UNICODE);
			$this->request->data['Detalle']['por_que_toma_te'] = json_encode($this->request->data['Detalle']['por_que_toma_te'], JSON_UNESCAPED_UNICODE);
			$this->Detalle->create();
			if ($this->Detalle->save($this->request->data)) {
				//$this->Session->setFlash(__('The detalle has been saved.'));
				return $this->redirect(array('controller'=>'usuarios','action' => 'control_panel', $usuario_id));
			} else {
				//$this->Session->setFlash(__('The detalle could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Detalle->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->checkAccess();
		if (!$this->Detalle->exists($id)) {
			throw new NotFoundException(__('Invalid detalle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Detalle->save($this->request->data)) {
				//$this->Session->setFlash(__('The detalle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The detalle could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Detalle.' . $this->Detalle->primaryKey => $id));
			$this->request->data = $this->Detalle->find('first', $options);
		}
		$usuarios = $this->Detalle->Usuario->find('list');
		$this->set(compact('usuarios'));
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
		$this->Detalle->id = $id;
		if (!$this->Detalle->exists()) {
			throw new NotFoundException(__('Invalid detalle'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Detalle->delete()) {
			//$this->Session->setFlash(__('The detalle has been deleted.'));
		} else {
			//$this->Session->setFlash(__('The detalle could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
