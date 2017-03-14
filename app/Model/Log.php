<?php
App::uses('AppModel', 'Model');
/**
 * Log Model
 *
 */
class Log extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'log';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


    public function newOrder($id,$message = null){
        $log = $this->create();
        $log['Log']['item_id'] = $id;
        $log['Log']['user_id'] = 0;
        $log['Log']['detail'] = 'New order from web' ;
        $log['Log']['created'] = date('Y-m-d h:m:s');
        $this->save($log);

    }

    public function saveOrder($id,$message = null){
        $log = $this->create();
        $log['Log']['item_id'] = $id;
        $log['Log']['user_id'] = AuthComponent::user('id');
        $log['Log']['detail'] = '(#'.AuthComponent::user('id').')'.AuthComponent::user('name').' has created new order' ;
        $log['Log']['created'] = date('Y-m-d h:m:s');
        $this->save($log);

    }

    public function editOrder($id,$message = null){
        $log = $this->create();
        $log['Log']['item_id'] = $id;
        $log['Log']['action'] = 1;
        $log['Log']['user_id'] = AuthComponent::user('id');
        $log['Log']['detail'] = '(#'.AuthComponent::user('id').')'.AuthComponent::user('name').' has change '.$message ;
        $log['Log']['created'] = date('Y-m-d h:m:s');
        $this->save($log);
    }

    public function deleteOrder($id){
        $log = $this->create();
        $log['Log']['item_id'] = $id;
        $log['Log']['action'] = 2;
        $log['Log']['user_id'] = AuthComponent::user('id');
        $log['Log']['detail'] = '(#'.AuthComponent::user('id').')'.AuthComponent::user('name').' has delete '.$id ;
        $log['Log']['created'] = date('Y-m-d h:m:s');
        $this->save($log);
    }

}
