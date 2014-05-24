<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */

	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function home()
	{
		$this->set('title_for_layout', 'Home');
		$this->layout = 'slider';
	}

	public function contacto()
	{

		$this->set('title_for_layout', 'Contacto');
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$email = new CakeEmail('mailgun');
			$email->from(array($data['Contacto']['email'] => $data['Contacto']['nombre']));
			$email->to('info@qihouse.mx');
			$email->subject('Contact Form');
			$email->send($data['Contacto']['mensaje']);
		}
	}

	public function nosotros()
	{
		$this->set('title_for_layout', 'Nosotros');
	}

	public function club() {
		$this->set('title_for_layout', 'Club del Te');
		$this->loadModel('Partner');
		$partners = $this->Partner->find('all');
		$this->set(compact('partners'));

	}
}
