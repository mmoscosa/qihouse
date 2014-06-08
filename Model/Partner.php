<?php
App::uses('AppModel', 'Model');
/**
 * Partner Model
 *
 */
class Partner extends AppModel {
	public $actsAs = array(
        'Upload.Upload' => array(
            'logo' => array(
                'fields' => array(
                    'dir' => '/img/partners/'
                ),
                'thumbnailSizes' => array(
                    'xvga' => '1024x768',
                    'vga' => '640x480',
                    'carousel' => '130x130',
                    'thumb' => '80x80'
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
