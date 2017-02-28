<?php
App::uses('AppModel', 'Model');
/**
 * Financial Model
 *
 */
class Financial extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'financial';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

    public $belongsTo = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'detail',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true,
            'counterScope' => array(),
        )
    );

}
