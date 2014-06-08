<?php
App::uses('AppController', 'Controller');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsuariosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->checkAccess('admin');
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function control_panel($id = null) {
		$this->checkAccess();
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
		$this->set('usuario', $this->Usuario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->checkAccess('admin');
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
	}


/**
 * add method
 *
 * @return void
 */
	public function register($tipo = null) {
		if ($this->request->is('post')) {
			$this->request->data['Usuario']['tipo'] = $tipo;
			$this->request->data['Usuario']['password'] = md5($this->request->data['Usuario']['password']);
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$usuario_id = $this->Usuario->getLastInsertId();
				return $this->redirect(array('controller' => 'detalles','action' => 'add', $usuario_id));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
	}

public function landing()
{
	if (!empty($this->loggedUser)) {
		return $this->redirect(array('action' => 'control_panel', $this->loggedUser['Usuario']['id']));
	}
	$this->set('title_for_layout', 'Membresia');
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
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			$this->request->data = $this->Usuario->find('first', $options);
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
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('The usuario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The usuario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function login()
	{
		if ($this->request->is('post')) {
			$data = $this->request['data']['Usuario'];
			$password = md5($data['password']);
			$usuario = $this->Usuario->find('first', array(
			                                'recursive' => 0,
			                                'conditions' => array('AND' => array(
				                                                      'Usuario.email' => $data['email'],
				                                                      'Usuario.password' => $password,
				                                                     )
			                                                      ),
			                                ));
			if (!empty($usuario)) {
				if(!empty($remember)){
					$this->Cookie->write('login', $usuario['Usuario']['id']);
				}else{
					$this->Session->write('login', $usuario['Usuario']['id']);
				}
				$this->Session->setFlash(__('Qi House te da la bienvenida a tu espacio!'), 'alert-box', array('class'=>'alert-success alert-content'));
				return $this->redirect(array('action' => 'control_panel', $usuario['Usuario']['id']));
			}else{
				if(Router::fullbaseUrl().'/' == $this->referer()){
					$this->redirect($this->referer());
					exit();
				}else{
					$this->Session->setFlash(__('Hubo un problema, favor de intentar de nuevo'), 'alert-box', array('class'=>'alert-danger alert-content'));
					$this->redirect($this->referer());
					exit();
				}
			}
		}
	}

	public function logout($id = null) {
		$this->Session->destroy('login');
		if ($this->Cookie->check('login')) {
			$this->Cookie->destroy('login')
		}
		if(Router::fullbaseUrl().'/' == $this->referer()){
			$this->redirect($this->referer());
			exit();
		}elseif(strpos($this->referer(),'control_panel')){
			$this->Session->setFlash(__('Logout exitoso'), 'alert-box', array('class'=>'alert-info alert-content'));
			$this->redirect(array('controller'=>'Usuarios', 'action'=>'landing'));
			exit();
		}else{
			$this->Session->setFlash(__('Logout exitoso'), 'alert-box', array('class'=>'alert-info alert-content'));
			$this->redirect($this->referer());
			exit();
		}
	}
}
