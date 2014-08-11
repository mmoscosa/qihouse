<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 * @property User $User
 */
class Address extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $displayField = 'address_1';
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
	public $hasMany = array(
		'Card' => array(
			'className' => 'Card',
			'foreignKey' => 'usuario_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}

