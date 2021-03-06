<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'Openpay', array('file' => 'Openpay/Openpay.php'));
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');
	public $helpers = array('Markdown.Markdown');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->checkAccess('admin');
		$this->Product->recursive = 0;
		$this->set('products', $this->Paginator->paginate());
	}

	public function tes($tipo = null) {
		$this->set('title_for_layout', 'Galeria del Te');
		if (!empty($tipo)) {
			$Subcategory = $this->Product->Subcategory->find('first', array(
		                                           'recursive'=>0,
		                                           'conditions'=>array(
		                                                           		'Subcategory.subcategory' => $tipo    
		                                                               ),
		                                           'fields'=>array(
		                                                           	'Subcategory.id'
		                                                           ),
		                                           ));
			$subcategory = (!empty($Subcategory)) ? $Subcategory['Subcategory']['id'] : $this->redirect(array('action' => 'tes')); ;
			$this->set('title_for_layout', 'Galeria del Te - '.$tipo);
		}
		$category = $this->Product->Category->find('first', array(
		                                           'recursive'=>0,
		                                           'conditions'=>array(
		                                                               	'Category.category' => 'Te'
		                                                               ),
		                                           'fields'=>array(
		                                                           	'Category.id'
		                                                           ),
		                                           ));
		$category = $category['Category']['id'];
		if (!empty($Subcategory)) {
			$options = array('Product.category_id'=>$category, 'Product.subcategory_id'=> $subcategory);
		}else{
			$options = array('Product.category_id'=>$category);
		}
		$tes = $this->Product->find('all', array(
		                            'recursive' => -1,
		                            'conditions'=>$options,
		                            ));
		$this->set(compact('tes'));
	}

	public function comments($id = null)
	{
		$this->checkAccess();
		$this->layout = NULL;
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid te'));
		}
		$this->set(compact('id'));
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->checkAccess('admin');
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Product->Category->find('list');
		$subcategories = $this->Product->Subcategory->find('list');
		$this->set(compact('categories','subcategories'));
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
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$categories = $this->Product->Category->find('list');
		$subcategories = $this->Product->Subcategory->find('list');
		$this->set(compact('categories','subcategories'));
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


    public function addToCart($id = null, $quantity = null) {
    	$this->autoRender = false;
    	$this->layout = null;
    	if ($this->request->is('post')) {	    	
	    	if (!$this->Product->exists($this->data['Product']['id'])) {
				throw new NotFoundException(__('Invalid product'));
			}
			$id = $this->data['Product']['id'];
			$quantity = $this->data['Product']['cantidad'];
		}
			$product = $this->Product->find('first', array(
			                                'conditions'=>array(
			                                                    'Product.id' => $id,
			                                                    ),
			                                'fields'=>array(
			                                                'Product.id',
			                                                'Product.name',
			                                                'Product.photo',
			                                                'Product.price',
			                                                'Category.category',
			                                                'Subcategory.subcategory',
			                                                ),
			                                ));
			$product['Cantidad'] = $quantity;
			if($this->Cookie->check('ShoppingCart')){
	    		$products = $this->Cookie->read('ShoppingCart');
	    		$temp = array();
	    		foreach ($products as $key => $cartProduct) {
	    			if(!is_array($cartProduct)){continue;}
	    			if($product['Product']['id'] == $cartProduct['Product']['id']){
	    				$productSubtotal = $cartProduct['Product']['price'] * $cartProduct['Cantidad'];
	    				continue;
	    			}
	    			array_push($temp, $cartProduct);
	      		}
	      		if(isset($productSubtotal)){
	      			$temp['Subtotal'] = $products['Subtotal'] - $productSubtotal;
					$temp['Shipping'] = $products['Shipping'];
					$this->Cookie->delete('ShoppingCart');
					$this->Cookie->write('ShoppingCart', $temp);
					$products = $this->Cookie->read('ShoppingCart');
	      		}
	    	}else{
	    		$products = array();
	    		$products['Shipping'] = 40;
	    		$products['Subtotal'] = 0;
	    	}
	    	$products['Subtotal'] = $products['Subtotal'] + ($product['Product']['price'] * $product['Cantidad']);
  			if($products['Subtotal']  >= 600){
  				$products['Shipping'] = 0;
  			}
	    	array_push($products, $product);
	    	$this->Cookie->write('ShoppingCart', $products);
	    	return $this->redirect(array('action' => 'cart'));
    	
	}

	public function cart() {
		if ($this->Cookie->check('ShoppingCart')) {
			$products = $this->Cookie->read('ShoppingCart');
			$empty = false;
			foreach ($products as $key => $product) {
				if(!is_array($product)){continue;}
				$empty = true;
			}
			if($empty == true){
				$this->set(compact('products'));
				return $products;
			}
		}
	}

	public function removeFromCart($id = null){
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Cookie->check('ShoppingCart')) {
			$products = $this->Cookie->read('ShoppingCart');
			$temp = array();
			foreach ($products as $key => $product) {
				if(!is_array($product)){continue;}
				if ($product['Product']['id'] == $id) {
					$productSubtotal = $product['Product']['price'] * $product['Cantidad'];
					continue;
				}
				array_push($temp, $product);
			}
			$temp['Subtotal'] = $products['Subtotal'] - $productSubtotal;
			$temp['Shipping'] = $products['Shipping'];

			$this->Cookie->delete('ShoppingCart');
			$this->Cookie->write('ShoppingCart', $temp);
			$this->redirect($this->referer());
		}

	}

	public function modifyProduct($id=null)
	{
		$this->layout = null;	
		$product = $this->Product->find('first',
		                                array(
		                                      'conditions'=>array('Product.id'=>$id)
		                                      )
		                                );
		$this->set(compact('product'));
		if ($this->request->is('post')) {
			$id = $this->data['Product']['id'];
			$quantity = $this->data['Product']['cantidad'];
			$this->addToCart($id, $quantity);
		}
	}
    public function emptyCart()
    {
    	$this->Cookie->delete('ShoppingCart');
    	return $this->redirect(array('action' => 'cart'));
    }

    public function checkout($value='')
    {
    	if(empty($this->Cookie->check('ShoppingCart'))){
    		return $this->redirect(array('action' => 'cart'));
    	}
    	if ($this->request->is('post')) {
    		$this->processPayment($this->data);
    	}

    	$logged = $this->loggedUser;
    	if($logged){
    		$this->loadModel('Address');
    		$allAddresses = $this->Address->find('all', array(
			                              	'conditions' => array(
			                              	                      'usuario_id' => $logged['Usuario']['id'],
			                              	                      ),
			                              	'recursive' => -1
			                              ));
			$shippingAddresseses = $this->Address->find('list', array(
			                              	'conditions' => array(
			                              	                      'usuario_id' => $logged['Usuario']['id'],
			                              	                      'type' => 1
			                              	                      ),
			                              	'recursive' => -1
			                              ));
			$billingAddresseses = $this->Address->find('list', array(
			                              	'conditions' => array(
			                              	                      'usuario_id' => $logged['Usuario']['id'],
			                              	                      'type' => 2
			                              	                      ),
			                              	'recursive' => -1
			                              ));
    		$this->set(compact('shippingAddresseses', 'billingAddresseses', 'allAddresses'));
    	}
    	$products = $this->cart();
    	$countries = $this->countryList();
    	$this->set(compact('countries', 'products'));
    }

    public function processPayment($data)
    {
    	
		if($data['Product']['payment_method'] == "card"){
    		$this->saveCard($data);
		}elseif($data['Product']['payment_method'] == "store"){
			$this->saveStore($data);
		}elseif($data['Product']['payment_method'] == "bank"){
			$this->saveBank($data);
		}
    }

    public function saveStore($data)
    {	
    	$openpay = $this->loadOpenPay();
    	$chargeData = array(
		    'method' => 'store',
		    'amount' => (float)$data["amount"],
		    'description' => 'Qi House (qihouse.mx) Ventas en linea [tienda]');
		$charge = $openpay->charges->create($chargeData);
		
		if($charge){
			$order = $this->saveOrder($data, $charge); 
			$this->saveHABTM($data, $order);
			$this->saveAddress($data, $order);
			
			$this->Cookie->delete('ShoppingCart');
			return $this->redirect(array('controller'=>'orders','action' => 'payment_slip', $order));	
		}
    }

    public function saveCard($data)
    {
    	$openpay = $this->loadOpenPay();
    	$chargeData = array(
		    'method' => 'card',
		    'source_id' => $data["token_id"],
		    'amount' => (float)$data["amount"],
		    'description' => $data["description"],
		    'device_session_id' => $data["deviceIdHiddenFieldName"]
	    );
    	$charge = $openpay->charges->create($chargeData);

		if($charge){
			$order = $this->saveOrder($data, $charge); 
			$this->saveHABTM($data, $order);
			$this->saveAddress($data, $order);
			$this->Cookie->delete('ShoppingCart');
			return $this->redirect(array('controller'=>'orders','action' => 'card_invoice', $order));	
		}
    }

    public function saveBank($data)
    {
    	$openpay = $this->loadOpenPay();
    	$chargeData = array(
		    'method' => 'bank_account',
		    'amount' => (float)$data["amount"],
		    'description' => 'Qi House (qihouse.mx) Ventas en linea [banco]');

		$charge = $openpay->charges->create($chargeData);
		if($charge){
			$order = $this->saveOrder($data, $charge); 
			$this->saveHABTM($data, $order);
			$this->saveAddress($data, $order);
			$this->Cookie->delete('ShoppingCart');
			return $this->redirect(array('controller'=>'orders','action' => 'bank_transfer', $order));	
		}
    }

    public function saveOrder($data, $charge)
    {
    	$this->loadModel('Order');
    	$tmp = array(
		                   'token_id' => $charge->id,
		                   'total' => $data['amount'],
		                   'descripcion' => $data['description'],
		                   );
		if(!empty($this->loggedUser)){
			$tmp['usuario_id'] = $this->loggedUser['Usuario']['id'];
		}
		$this->Order->create();
		$this->Order->save($tmp);
		$orderId = $this->Order->getLastInsertID();
		return $orderId;
    }

    public function saveHABTM($data, $orderId)
    {
    	$this->loadModel('OrdersProduct');
    	$products = $this->Cookie->read('ShoppingCart');
    	foreach ($products as $key => $product) {
			if(!is_array($product)){continue;}
			$saveData = array(
			                  	'order_id' => $orderId,
			                  	'product_id' => $product['Product']['id'],
			                  	'quantity' => $product['Cantidad'],
			                  	'subtotal' => $product['Cantidad'] * $product['Product']['price']
			                  );
			$this->OrdersProduct->create();
			$this->OrdersProduct->save($saveData);
		}
    }

    public function saveAddress($data, $orderId)
    {
    	$this->loadModel('Address');
    	if(empty($data['Shipping']['id'])){
    		if(empty($data['Product']['savedShipping'])){
				$addressData = array(
				                     'type' => 1,
				                     'recipient' => $data['Shipping']['recipient'],
				                     'address_1' => $data['Shipping']['address_1'],
				                     'address_2' => $data['Shipping']['address_2'],
				                     'phone_number' => $data['Shipping']['phone_number'],
				                     'country_code' => $data['Shipping']['country_code'],
				                     'state' => $data['Shipping']['state'],
				                     'city' => $data['Shipping']['city'],
				                     'postal_code' => $data['Shipping']['postal_code'],
				                     );
				if($data['Product']['save_shipping'] == 1){
					$addressData['usuario_id'] = $data['Shipping']['usuario_id'];
				}
				$this->Address->create();	
				$this->Address->save($addressData);
				$addressId = $this->Address->getLastInsertID();
				$this->linkAddress($addressId, $orderId);
    		}else{
    			$addressId = $data['Product']['savedShipping'];
				$this->linkAddress($addressId, $orderId);
    		}
		}

		if(empty($data['Billing']['id'])){
			if(empty($data['Product']['savedBilling'])){
				if($data['Product']['same_shipping'] == true){
					if(empty($data['Product']['savedShipping'])){
						$addressData = array(
					                     'type' => 2,
					                     'recipient' => $data['Shipping']['recipient'],
					                     'address_1' => $data['Shipping']['address_1'],
					                     'address_2' => $data['Shipping']['address_2'],
					                     'phone_number' => $data['Shipping']['phone_number'],
					                     'country_code' => $data['Shipping']['country_code'],
					                     'state' => $data['Shipping']['state'],
					                     'city' => $data['Shipping']['city'],
					                     'postal_code' => $data['Shipping']['postal_code'],
					                     );
						if($data['Product']['save_billing'] == 1){
							$addressData['usuario_id'] = $data['Shipping']['usuario_id'];
						}
						$this->Address->create();	
						$this->Address->save($addressData);
						$addressId = $this->Address->getLastInsertID();
						$this->linkAddress($addressId, $orderId);
					}
				}else{
					$addressData = array(
					                     'type' => 2,
					                     'address_1' => $data['Billing']['address_1'],
					                     'address_2' => $data['Billing']['address_2'],
					                     'phone_number' => $data['Billing']['phone_number'],
					                     'country_code' => $data['Billing']['country_code'],
					                     'state' => $data['Billing']['state'],
					                     'city' => $data['Billing']['city'],
					                     'postal_code' => $data['Billing']['postal_code'],
					                     );
					if($data['Product']['save_billing'] == 1){
						$addressData['usuario_id'] = $data['Billing']['usuario_id'];
					}
					$this->Address->create();	
					$this->Address->save($addressData);
					$addressId = $this->Address->getLastInsertID();
					$this->linkAddress($addressId, $orderId);
				}
			}else{
				$addressId = $data['Product']['savedBilling'];
				$this->linkAddress($addressId, $orderId);
			}
		}
    }

    public function linkAddress($addressId, $orderId)
    {
    	$this->loadModel('OrdersAddress');
		$saveData = array(
		                  	'order_id' => $orderId,
		                  	'address_id' => $addressId,
		                  );
		$this->OrdersAddress->create();
		$this->OrdersAddress->save($saveData);
    }
    public function loadOpenPay()
    {
    	$openpay = Configure::read('openpay');
		$openpay = Openpay::getInstance($openpay['merchant_id'], $openpay['private_key']);
		return $openpay;
    }
}
