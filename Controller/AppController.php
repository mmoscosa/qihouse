<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array(
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	);
	public $components = array(
	                            'DebugKit.Toolbar',
	                            'Session',
	                            'Cookie'
	                           );
	public function beforeFilter() {
		parent::beforeFilter();
		if($this->Cookie->check('login') || $this->Session->check('login')){
			$this->loadModel('Usuario');
			$loggedUser = $this->Usuario->find('first', $this->getLogged());
			$this->set(compact('loggedUser'));
			$this->loggedUser = $loggedUser;
		}
    }

    public function checkAccess($role = null)
    {
    	if ($this->Cookie->check('login') || $this->Session->check('login')) {
    		if ($role == 'admin') {
	    		$loggedUser = $this->Usuario->find('first', $this->getLogged());
	    		if($loggedUser['Usuario']['tipo'] !== '0'){
		    		$this->Session->setFlash(__('No tienes permiso a este sitio.'), 'alert-box', array('class'=>'alert-danger alert-content'));
					$this->redirect(array('controller'=>'Usuarios','action' => 'landing'));
					exit();
	    		}
	    	} elseif ($role == 'negocio') {
	    		$loggedUser = $this->Usuario->find('first', $this->getLogged());
	    		if($loggedUser['Usuario']['tipo'] !== '1'){
		    		$this->Session->setFlash(__('No tienes permiso a este sitio.'), 'alert-box', array('class'=>'alert-danger alert-content'));
					$this->redirect(array('controller'=>'Usuarios','action' => 'landing'));
					exit();
	    		}
	    	} elseif ($role == 'particular') {
	    		$loggedUser = $this->Usuario->find('first', $this->getLogged());
	    		if($loggedUser['Usuario']['tipo'] !== '2'){
		    		$this->Session->setFlash(__('No tienes permiso a este sitio.'), 'alert-box', array('class'=>'alert-danger alert-content'));
					$this->redirect(array('controller'=>'Usuarios','action' => 'landing'));
					exit();
	    		}
	    	}
    	}else{
    		$this->Session->setFlash(__('No tienes acceso a este sitio. Favor de crear una cuenta'), 'alert-box', array('class'=>'alert-warning alert-content'));
			$this->redirect(array('controller'=>'Usuarios','action' => 'landing'));
			exit();
    	}
    }

    public function getLogged()
    {
    	if($this->Session->check('login')){
			$id = $this->Session->read('login');
			$options = array('recursive'=>0, 'conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			return $options;
		}else{
			$id = $this->Cookie->read('login');
			$options = array('recursive'=>0,'conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			return $options;
		}
    }
}
