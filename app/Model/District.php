<?php
App::uses('AppModel', 'Model');
/**
 * DevvnTinhthanhpho Model
 *
 */
class District extends AppModel
{

/**
 * Use table
 *
 * @var mixed False or table name
 */
    public $useTable = 'province';

/**
 * Primary key field
 *
 * @var string
 */
    public $primaryKey = 'id';

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'name';
}
