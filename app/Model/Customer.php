<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 */
class Customer extends AppModel {

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

}
