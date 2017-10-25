<?php
App::uses('AppModel', 'Model');
/**
 * Store Model
 *
 */
class Stocktype extends AppModel
{

/**
 * Use table
 *
 * @var mixed False or table name
 */
    public $useTable = 'type';

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'name';
}
