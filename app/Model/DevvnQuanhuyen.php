<?php
App::uses('AppModel', 'Model');
/**
 * DevvnQuanhuyen Model
 *
 */
class DevvnQuanhuyen extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'devvn_quanhuyen';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'maqh';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

}
