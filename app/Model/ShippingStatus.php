<?php
App::uses('AppModel', 'Model');
/**
 * ShippingStatus Model
 *
 */
class ShippingStatus extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'shipping_status';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'status';

}
