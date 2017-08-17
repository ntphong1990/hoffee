<?php
App::uses('AppModel', 'Model');
/**
 * Stock Model
 *
 * @property Product $Product
 */
class Stock extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'stock';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function out($store_id,$product_id,$quantity,$order_id){
		
			$data = [];
			$data['product_id'] = $product_id;
			$data['store_id'] = $store_id;
			$data['type'] = 0;
			$data['quantity'] = -intval($quantity);
			$data['order_id'] = $order_id;
			//var_dump($data);die();
			$this->save($data);

	}
}
