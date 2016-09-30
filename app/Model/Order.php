<?php
App::uses('AppModel', 'Model');
class Order extends AppModel {

//////////////////////////////////////////////////

    public $validate = array(
        
        'billing_address' => array(
            'rule1' => array(
                'rule' => array('notBlank'),
                'message' => 'Billing Address is invalid',
            ),
        ),
        'billing_city' => array(
            'rule1' => array(
                'rule' => array('notBlank'),
                'message' => 'Billing City is invalid',
            ),
        ),
        
        'shipping_address' => array(
            'rule1' => array(
                'rule' => array('notBlank'),
                'message' => 'Shipping Address is invalid',
            ),
        ),
        'shipping_city' => array(
            'rule1' => array(
                'rule' => array('notBlank'),
                'message' => 'Shipping City is invalid',
            ),
        )
    );

//////////////////////////////////////////////////

    public $hasMany = array(
        'OrderItem' => array(
            'className' => 'OrderItem',
            'foreignKey' => 'order_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        )
    );

//////////////////////////////////////////////////

}
