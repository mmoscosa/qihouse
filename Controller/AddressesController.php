<?php
App::uses('AppController', 'Controller');
/**
 * Addresses Controller
 *
 * @property Address $Address
 * @property PaginatorComponent $Paginator
 */
class AddressesController extends AppController {

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
		$this->Address->recursive = 0;
		$this->set('addresses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		$options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
		$this->set('address', $this->Address->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = null;
		if ($this->request->is('post')) {
			$this->Address->create();
			if ($this->Address->save($this->request->data)) {
				if($this->request->data['Address']['type'] == 1){
					$address_id = $this->Address->getLastInsertId();
					$openPayId = $this->__saveUserOpenPay($this->request->data);
					if($openPayId){
						$updatedAddress = $this->__updateAddress($address_id, $openPayId);
						if($updatedAddress){
							$this->Session->setFlash(__('The address has been saved.'));
							return $this->redirect(array('action' => 'index'));
						}
					}
				}else{
					$this->Session->setFlash(__('The address has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Address->Usuario->find('list');
		
		$countries = $this->countryList();
		$this->set(compact('usuarios', 'countries'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
			$this->request->data = $this->Address->find('first', $options);
		}
		$usuarios = $this->Address->Usuario->find('list');
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
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid address'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Address->delete()) {
			$this->Session->setFlash(__('The address has been deleted.'));
		} else {
			$this->Session->setFlash(__('The address could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function __updateAddress($address_id = null, $openPayId = null)
	{
		$this->layout = null;
    	$this->autoRender = false;
		$this->Address->id = $address_id;
		$this->Address->set(array(
		    'openpayId' => $openPayId,
		));
		if($this->Address->save()){
			return true;
		}
	}
	public function __saveUserOpenPay($data= null)
	{
		$this->layout = null;
    	$this->autoRender = false;
    	$this->loadModel('Usuario');
		$usuario = $this->Usuario->find('first', array('conditions'=>array('Usuario.id'=>$data['Address']['usuario_id']), 'fields'=>array('email'), 'recursive'=>2));
		
		$customerData = array(
		    'name' => $usuario['Detalle']['nombre'],
		    'last_name' => $usuario['Detalle']['apellido'],
		    'external_id'=> $usuario['Usuario']['id'],
		    'email' => $usuario['Usuario']['email'],
		    'phone_number' => $data['Address']['phone_number'],
		    'address' => array(
		            'line1' => $data['Address']['address_1'],
		            'line2' => $data['Address']['address_2'],
		            'postal_code' => $data['Address']['postal_code'],
		            'state' => $data['Address']['state'],
		            'city' => $data['Address']['city'],
		            'country_code' => $data['Address']['country_code'])
	    );
		$openpayData = Configure::read('openpay');
		$openpay = Openpay::getInstance($openpayData["merchant_id"], $openpayData["private_key"]);
		$customer = $openpay->customers->add($customerData);
		
		$today = date("Y-m-d");  
		$findData = array(
		    'creation[gte]' => $today,
		    'creation[lte]' => $today,
		    'offset' => 0);

		$customerList = $openpay->customers->getList($findData);
		
		foreach ($customerList as $key => $customer) {
			if($customer->serializableData['email'] == $usuario['Usuario']['email']){
				$openPayId = $customer->id;
				break;
			}
		}
		return $openPayId;
	}
}
