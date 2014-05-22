<?php
App::uses('AppModel', 'Model');
/**
 * Te Model
 *
 */
class Te extends AppModel {
	public $actsAs = array(
        'Upload.Upload' => array(
            'foto' => array(
                'fields' => array(
                    'dir' => '/img/tes/'
                ),
                'thumbnailSizes' => array(
                    'vga' => '640x480',
                    'thumb' => '300x320'
                )
            )
        )
    );
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
