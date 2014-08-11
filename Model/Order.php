<?php
App::uses('AppModel', 'Model');
/**
 * Order Model
 *
 * @property User $User
 * @property Address $Address
 * @property Product $Product
 */
class Order extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Address' => array(
			'className' => 'Address',
			'joinTable' => 'orders_addresses',
			'foreignKey' => 'order_id',
			'associationForeignKey' => 'address_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Product' => array(
			'className' => 'Product',
			'joinTable' => 'orders_products',
			'foreignKey' => 'order_id',
			'associationForeignKey' => 'product_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
