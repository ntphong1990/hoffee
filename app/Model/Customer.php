<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 */
class Customer extends AppModel
{

/**
 * Use table
 *
 * @var mixed False or table name
 */
    public $useTable = 'customer';

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'name';

    public $belongsTo = array(
        'District' => array(
            'className' => 'District',
            'foreignKey' => 'district',
            'conditions' => '',
            'fields' => '',
            'order' => '',
        ),
        'Ward' => array(
            'className' => 'Ward',
            'foreignKey' => 'state',
            'conditions' => '',
            'fields' => '',
            'order' => '',
        ),
    );
}
