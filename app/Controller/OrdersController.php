<?php
App::uses('AppController', 'Controller');
class OrdersController extends AppController {

////////////////////////////////////////////////////////////

    public function admin_index() {

        $this->Paginator = $this->Components->load('Paginator');

        $this->Paginator->settings = array(
            'Order' => array(
                'recursive' => -1,
                'contain' => array(
                ),
                'conditions' => array(
                    'Order.status <> 3'
                ),
                'order' => array(
                    'Order.created' => 'DESC'
                ),
                'limit' => 20,
                'paramType' => 'querystring',
            )
        );
        $orders = $this->Paginator->paginate();

        $this->set(compact('orders'));
    }

    public function admin_temp() {
        $this->Paginator = $this->Components->load('Paginator');

        $this->Paginator->settings = array(
            'Order' => array(
                'recursive' => -1,
                'contain' => array(
                ),
                'conditions' => array(
                    'status' => 3
                ),
                'order' => array(
                    'Order.created' => 'DESC'
                ),
                'limit' => 20,
                'paramType' => 'querystring',
            )
        );
        $orders = $this->Paginator->paginate();

        $this->set(compact('orders'));
    }


    public function admin_create(){
        $this->loadModel('Product');
        $this->loadModel('Brand');
        $this->loadModel('Customer');
        $products = $this->Product->find('all', array(
            'order'=>array('brand_id DESC')
        ));
        $reproduct = [];
        $brand = -1;
        foreach ($products as $key => $value){
            if($brand != $value['Product']['brand_id']){

                $brand = $value['Product']['brand_id'];
                $reproduct[$brand]['brand_name'] = $this->Brand->find('first',array(
                    'conditions' => array('id' => $brand)
                ))['Brand']['name'];
                $reproduct[$brand]['data'] = [];
                array_push($reproduct[$brand]['data'],$value);
            } else {
                array_push($reproduct[$brand]['data'],$value);
            }

        }

        $this->set('products',$reproduct);

        $customer = $this->Customer->find('all');
        $this->set('customers',$customer);

        if ($this->request->is('post') || $this->request->is('put')) {
            return json_encode('asd');
                die();


        } else {

        }
        //var_dump($reproduct);die();
    }

    public function admin_submit(){
        $this->autoRender = false;
        $this->loadModel('Customer');
        $this->loadModel('OrderItem');
        $customer = $this->Customer->find('first',array('conditions' => array(
            'id' => $this->request->data['customerid']
        )));

        $order = $this->Order->create();
        $order['Order']['first_name'] = $customer['Customer']['name'];
        $order['Order']['customer_id'] = $customer['Customer']['id'];
      $order['Order']['last_name'] = $customer['Customer']['lastname'];
      $order['Order']['email'] = $customer['Customer']['email'];
      $order['Order']['phone'] = $customer['Customer']['phone'];
      $order['Order']['billing_address'] = $customer['Customer']['address'];
      $order['Order']['billing_address2'] = '';
      $order['Order']['billing_city'] = '';
      $order['Order']['note'] = '';
      $order['Order']['direct'] = '1';
      $order['Order']['shipping_address'] = '';
      $order['Order']['shipping_city'] = '';
      $order['Order']['order_type'] = 'direct';
      $order['Order']['order_item_count'] = 1;
      $order['Order']['quantity'] = 1;
      $order['Order']['weight'] = '0';
      $order['Order']['subtotal'] = $this->request->data['subtotal'];
      $order['Order']['voucher'] = 0;
      $order['Order']['code'] = '';
      $order['Order']['discount'] = 0;
        $order['Order']['note'] = $this->request->data['note'];
        $order['Order']['shipping'] = $this->request->data['shipping'];
      $order['Order']['total'] = $this->request->data['total'];
      $order['Order']['status'] = $this->request->data['status'];

        $orderItems = json_decode($this->request->data['orderitem']);
        $order['OrderItem'] = array();
        $weight = 0;
        foreach ($orderItems as $key => $value){
            $orderItem = array();

            $orderItem['product_id'] = $value->id;
          $orderItem['name'] = $value->name;
          $orderItem['weight'] = $value->weight * $value->quanlity;
          $orderItem['price'] = $value->price;
          $orderItem['quantity'] = $value->quanlity;
          $orderItem['subtotal'] = $value->quanlity * $value->price;
            $weight = $weight + $orderItem['weight'];
            array_push($order['OrderItem'],$orderItem);
        }
        if($order['Order']['status'] == 1) {
            $order['Financial'] = array();
            $fee = array();
            $fee['type'] = 1;
            $fee['value'] = $order['Order']['total'];
            $fee['note'] = 'Đơn đặt hàng từ ' . $customer['Customer']['name'];
            $fee['kind'] = 1;
            array_push($order['Financial'], $fee);
        }
        $order['Order']['weight'] = $weight;
       // var_dump($order);die();
       $a = $this->Order->saveAll($order);

        $this->Order->set($order);

        return json_encode('');
        //return $this->redirect(array('action' => 'index'));
    }

    public function admin_correct(){
        $this->autoRender = false;
        $this->loadModel('Customer');
        $orders = $this->Order->find('all');
        foreach ($orders as $key => $value){
            if(!$this->Customer->find('first',array('conditions' => array(
                'phone' => $value['Order']['phone']
            )))){
                $customer = $this->Customer->create();
                $customer['Customer']['name'] = $value['Order']['first_name'];
                $customer['Customer']['lastname'] = $value['Order']['last_name'];
                $customer['Customer']['address'] = $value['Order']['billing_address'];
                $customer['Customer']['email'] = $value['Order']['email'];
                $customer['Customer']['phone'] = $value['Order']['phone'];
                $customer['Customer']['birthday'] = date('Y-m-d');

                $this->Customer->save($customer);

            }
        }
    }

    public function admin_thu(){
        $this->autoRender = false;
        $this->loadModel('Financial');
        $orders = $this->Order->find('all');
        foreach ($orders as $key => $value){

                $customer = $this->Financial->create();
                $customer['Financial']['type'] = 1;
                $customer['Financial']['value'] = $value['Order']['total'];
                $customer['Financial']['note'] = 'Đơn đặt hàng từ '.$value['Order']['first_name'];
                $customer['Financial']['kind'] = 1;
                $customer['Financial']['detail'] = $value['Order']['id'];


                $this->Financial->save($customer);


        }
    }

////////////////////////////////////////////////////////////

    public function admin_view($id = null) {
        $order = $this->Order->find('first', array(
            'recursive' => 1,
            'conditions' => array(
                'Order.id' => $id
            )
        ));
        $this->loadModel('Financial');
       $fees = $this->Financial->find('all',array('conditions' => array(
            'detail' => $id
        )));
        $this->loadModel('ShippingStatus');
        $status = $this->ShippingStatus->find('all');
        $this->set('status',$status);

        $fee = 0;
        foreach ($fees as $key => $value){
            $fee = $fee + $value['Financial']['value'];
        }
       // var_dump($fee);die();
        if (empty($order)) {
            return $this->redirect(array('action'=>'index'));
        }
        $this->set(compact('order'));
        $this->set('fee',$fee);
        if ($this->request->is('post') || $this->request->is('put')) {
           // var_dump( $this->request->data);
            if($this->request->data['Order']['money'] != ''){
                $customer = $this->Financial->create();
                $customer['Financial']['type'] = 1;
                $customer['Financial']['value'] = intval($this->request->data['Order']['money']);
                $customer['Financial']['note'] = 'Đơn đặt hàng từ '.$order['Order']['first_name'];
                $customer['Financial']['kind'] = 1;
                $customer['Financial']['detail'] = $id;
                $this->Financial->save($customer);
            }

            if($fee + intval($this->request->data['Order']['money']) >= $order['Order']['total']){
                $order['Order']['status'] = 1;
            }
            $order['Order']['shipping_status'] = $this->request->data['Order']['shipping_status'];
            $order['Order']['note'] = $this->request->data['Order']['note'];
            if($this->Order->save($order)){
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->flash('The order could not be saved. Please, try again.');
            }

        }
    }

////////////////////////////////////////////////////////////

    public function admin_edit($id = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException('Invalid order');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Order->save($this->request->data)) {
                $this->Flash->flash('The order has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->flash('The order could not be saved. Please, try again.');
            }
        } else {
            $this->request->data = $this->Order->read(null, $id);
        }
    }

////////////////////////////////////////////////////////////

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException('Invalid order');
        }
        if ($this->Order->delete()) {
            $this->Flash->flash('Order deleted');
            return $this->redirect(array('action'=>'index'));
        }
        $this->Flash->flash('Order was not deleted');
        return $this->redirect(array('action' => 'index'));
    }

////////////////////////////////////////////////////////////

}
