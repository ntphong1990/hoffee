<?php
App::uses('AppModel', 'Model');
/**
 * Ward Model
 *
 */
class Ward extends AppModel
{

/**
 * Use table
 *
 * @var mixed False or table name
 */
    public $useTable = 'district';

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
