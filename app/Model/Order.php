<?php
App::uses('AppModel', 'Model','Log');
class Order extends AppModel {

//////////////////////////////////////////////////

    public $validate = array(
        

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
        ),
        'Financial' => array(
            'className' => 'Financial',
            'foreignKey' => 'detail',
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
