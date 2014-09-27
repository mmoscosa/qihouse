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
    	$checkCart = $this->Cookie->check('ShoppingCart');
    	if(empty($checkCart)){
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
    	try{
	    	$openpay = $this->loadOpenPay();
	    	$chargeData = array(
			    'method' => 'store',
			    'amount' => (float)$data["amount"],
			    'description' => $data["description"]);
			$charge = $openpay->charges->create($chargeData);
    	}catch(exception $e){
    		$this->Session->setFlash(__('Hubo un problema al generar tu recibo, favor de intentar de nuevo (Lamentamos cualquier inconveniente que esto ocasionó)'), 'alert-box', array('class'=>'alert-danger alert-content'));
    		$this->redirect(array('action' => 'checkout'));
    	}
		
		if($charge){
			$data['description'] = 'Qi House (qihouse.mx) Ventas en linea [tienda]';
			$order = $this->saveOrder($data, $charge); 
			$this->saveHABTM($data, $order);
			$this->saveAddress($data, $order);
			$this->sendMails($order, $data);
			$this->Cookie->delete('ShoppingCart');
			return $this->redirect(array('controller'=>'orders','action' => 'payment_slip', $order));	
		}
    }

    public function saveCard($data)
    {	
    	try{
	    	$openpay = $this->loadOpenPay();
	    	$chargeData = array(
			    'method' => 'card',
			    'source_id' => $data["token_id"],
			    'amount' => (float)$data["amount"],
			    'description' => $data["description"],
			    'device_session_id' => $data["deviceIdHiddenFieldName"]
		    );
	    	$charge = $openpay->charges->create($chargeData);	
    	}catch(exception $e){
    		$this->Session->setFlash(__('Hubo un problema al generar ficha de pago, favor de intentar de nuevo (Lamentamos cualquier inconveniente que esto ocasionó)'), 'alert-box', array('class'=>'alert-danger alert-content'));
    		$this->redirect(array('action' => 'checkout'));
    	}
		if($charge){
			$data['description'] = 'Qi House (qihouse.mx) Ventas en linea [Tarjeta]';
			$order = $this->saveOrder($data, $charge); 
			$this->saveHABTM($data, $order);
			$this->saveAddress($data, $order);
			$this->sendMails($order, $data);
			$this->Cookie->delete('ShoppingCart');
			return $this->redirect(array('controller'=>'orders','action' => 'card_invoice', $order));	
		}
    }

    public function saveBank($data)
    {
    	try{
	    	$openpay = $this->loadOpenPay();
	    	$chargeData = array(
			    'method' => 'bank_account',
			    'amount' => (float)$data["amount"],
			    'description' => $data["description"]);
    	}catch(exception $e){
    		$this->Session->setFlash(__('Hubo un problema con los datos de tu tarjeta, favor de revisar los datos e intentar de nuevo (Lamentamos cualquier inconveniente que esto ocasionó)'), 'alert-box', array('class'=>'alert-danger alert-content'));
    		$this->redirect(array('action' => 'checkout'));
    	}

		$charge = $openpay->charges->create($chargeData);
		if($charge){
			$data['description'] = 'Qi House (qihouse.mx) Ventas en linea [banco]';
			$order = $this->saveOrder($data, $charge); 
			$this->saveHABTM($data, $order);
			$this->saveAddress($data, $order);
			$this->sendMails($order, $data);
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
				if(!empty($data['Product']['save_shipping'])){
					if($data['Product']['save_shipping'] == 1){
						$addressData['usuario_id'] = $data['Shipping']['usuario_id'];
					}
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
							$this->Address->create();	
							$this->Address->save($addressData);
							$addressId = $this->Address->getLastInsertID();
							$this->linkAddress($addressId, $orderId);
						}
					}
				}else{
					if($data['Billing']['address_1'] !== 'parseley'){
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
						if(!empty($data['Product']['save_billing'])){
							if($data['Product']['save_billing'] == 1){
								$addressData['usuario_id'] = $data['Billing']['usuario_id'];
								$this->Address->create();	
								$this->Address->save($addressData);
								$addressId = $this->Address->getLastInsertID();
								$this->linkAddress($addressId, $orderId);
							}
						}
					}
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
    	Openpay::setProductionMode($openpay['production']);
		$openpay = Openpay::getInstance($openpay['merchant_id'], $openpay['private_key']);
		return $openpay;
    }

   	public function sendMails($order, $data)
   	{
   		if($data['Shipping']['recipientEmail']){
   			if($data['Product']['payment_method'] == 'store'){
	   			$orderUrl = Router::url(array('controller'=>'orders','action' => 'payment_slip', $order), true);
	   			$options = 'Al haber haber elegido la opcion de pagar en tienda de conveniencia, es necesario se realice el pago  en cualquiera de las tiendas participantes antes de que enviemos cualquier orden. ';
	   			$optionsQiHouse = 'El Cliente eligio pagar via Tienda por lo que es importante revisemos OpenPay para verificar el pago haya sido hecho antes de enviar cualquier pedido';
   			}elseif($data['Product']['payment_method'] == 'bank'){
	   			$orderUrl = Router::url(array('controller'=>'orders','action' => 'bank_transfer', $order), true);
	   			$options = 'Al haber haber elegido la opcion de pagar en banco, es necesario realices la transferencia SPEI antes de que enviemos cualquier orden. ';
	   			$optionsQiHouse = 'El Cliente eligio pagar via Banco por lo que es importante revisemos OpenPay para verificar el pago haya sido hecho antes de enviar cualquier pedido';
   			}elseif($data['Product']['payment_method'] == 'card'){
	   			$orderUrl = Router::url(array('controller'=>'orders','action' => 'card_invoice', $order), true);
	   			$options = '';
	   			$optionsQiHouse = '';
   			}

   			$messagge = "
Hola {$data['Shipping']['recipient']},

Hemos recibido tu pedido y nos pondremos en contacto contigo dentro de las siguientes 24 horas.

Puedes acceder a tu pedido dirigiendote a la siguiente direccione electronica:

{$orderUrl}

{$options}

Saludos Cordiales,

Atentamente
Qi House
   			";
	   		$clientEmail = new CakeEmail();
			$clientEmail->from(array('ventas@qihouse.mx' => 'Ventas Qi House'));
			$clientEmail->to($data['Shipping']['recipientEmail']);
			$clientEmail->subject('Pedido QiHouse');
			$clientEmail->send($messagge);
   		}
   			$messagge = "
{$data['Shipping']['recipient']} Acaba de hacer un pedido. Debemos ponernos en contacto con el cliente dentro de las siguientes 24 horas.

Puedes acceder al pedido a en la siguiente direccione electronica:

{$orderUrl}

{$optionsQiHouse}

Felicidades por una venta mas!

Atentamente
Qi House
   			";
		$qihouseEmail = new CakeEmail();
		$qihouseEmail->from(array('ventas@qihouse.mx' => 'Pedido Qi House'));
		$qihouseEmail->to('ventas@qihouse.mx');
		$qihouseEmail->subject('Pedido QiHouse');
		$qihouseEmail->send($messagge);
   	}
}
