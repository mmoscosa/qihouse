<?php
App::uses('AppModel', 'Model');
/**
 * OrdersProduct Model
 *
 * @property Order $Order
 * @property Prodcut $Prodcut
 */
class OrdersProduct extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Prodcut' => array(
			'className' => 'Prodcut',
			'foreignKey' => 'prodcut_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
