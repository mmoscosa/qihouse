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
    	if ($this->request->is('post')) {
    		$this->processPayment($this->data);
    	}

    	$logged = $this->loggedUser;
    	if($logged){
    		$this->loadModel('Address');
			$addresses = $this->Address->find('all', array(
			                              	'conditions' => array(
			                              	                      'usuario_id' => $logged['Usuario']['id']
			                              	                      ),
			                              	'recursive' => -1
			                              ));
    		$this->set(compact('addresses'));
    	}
    	$products = $this->cart();
    	$countries = $this->countryList();
    	$this->set(compact('countries', 'products'));
    }

    public function processPayment($data)
    {
    	$openpay = Configure::read('openpay');
		$openpay = Openpay::getInstance($openpay['merchant_id'], $openpay['private_key']);
		if($data['Product']['payment_method'] == "card"){
    		$chargeData = array(
			    'method' => 'card',
			    'source_id' => $data["token_id"],
			    'amount' => (float)$data["amount"],
			    'description' => $data["description"],
			    'device_session_id' => $data["deviceIdHiddenFieldName"]
		    );
    		if($charge = $openpay->charges->create($chargeData)){
    			$this->Cookie->delete('ShoppingCart');
    			return $this->redirect(array('action' => 'cart'));
    		}
		}elseif($data['Product']['payment_method'] == "store"){
			$chargeData = array(
			    'method' => 'store',
			    'amount' => (float)$data["amount"],
			    'description' => 'Qi House (qihouse.mx) Ventas en linea [tienda]');

			$charge = $openpay->charges->create($chargeData);
			if($charge){
				$this->Cookie->delete('ShoppingCart');
    			return $this->redirect(array('action' => 'cart'));	
			}
		}elseif($data['Product']['payment_method'] == "bank"){
			$chargeData = array(
			    'method' => 'bank_account',
			    'amount' => (float)$data["amount"],
			    'description' => 'Qi House (qihouse.mx) Ventas en linea [banco]');

			$charge = $openpay->charges->create($chargeData);
			if($charge){
				$this->Cookie->delete('ShoppingCart');
    			return $this->redirect(array('action' => 'cart'));
			}
		}# code...
    }
}
