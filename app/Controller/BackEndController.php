<?php
class BackEndController extends AppController {


    public function beforeFilter() {
        $this->Auth->allow();
        $this->autoRender = false;
    }



    public function getProduct(){

        $this->loadModel('Product');

        $this->Paginator = $this->Components->load('Paginator');
        $this->Paginator->settings = array(
            'Product' => array(
                'recursive' => -1,
                'contain' => array(
                    'Brand'
                ),
                'limit' => 20,
                'conditions' => array(
                    'Product.active' => 1,
                    'Brand.active' => 1
                ),
                'order' => array(
                    'Product.name' => 'ASC'
                ),
                'paramType' => 'querystring',
            )
        );

        $products = $this->Paginator->paginate('Product');
        return json_encode($products);
    }


    public function getCities(){
        $this->loadModel('DevvnTinhthanhpho');
        $this->loadModel('DevvnQuanhuyen');

        $cities = $this->DevvnTinhthanhpho->find('all');
        for ($i = 0 ; $i < count($cities) ; $i++) {
            $cities[$i]['DevvnTinhthanhpho']['states'] = $this->DevvnQuanhuyen->find('all',array('conditions' => array('matp' => $cities[$i]['DevvnTinhthanhpho']['matp'])));
           // var_dump($a);
        }
       // var_dump($cities);
        return json_encode($cities);
    }

    public function orderVer1(){

        $this->loadModel('Customer');
        $customer = null;
        if(!$this->Customer->find('first',array('conditions' => array(
            'phone' => $this->request->data['phone']
        )))){
            $customer = $this->Customer->create();
            $customer['Customer']['name'] = $this->request->data['first_name'];
            $customer['Customer']['lastname'] = $this->request->data['last_name'];
            $customer['Customer']['address'] = $this->request->data['billing_address'];
            $customer['Customer']['email'] = $this->request->data['email'];
            $customer['Customer']['phone'] = $this->request->data['phone'];
            $customer['Customer']['birthday'] = date('Y-m-d');
            $customer['Customer']['district'] = $this->request->data['billing_city'];
            $customer['Customer']['state'] =  $this->request->data['state'];
            $this->Customer->save($customer);
            $customer['Customer']['id'] = $this->Customer->inserted_ids[0];

        } else {
            $customer = $this->Customer->find('first',array('conditions' => array(
                'phone' => $this->request->data['phone']
            )));
        }

        $this->loadModel('Order');

        $this->loadModel('OrderItem');
        $this->loadModel('DevvnTinhthanhpho');
        $order = $this->Order->create();
        $order['Order']['first_name'] = $customer['Customer']['name'];
        $order['Order']['customer_id'] = $customer['Customer']['id'];
        $order['Order']['last_name'] = $customer['Customer']['lastname'];
        $order['Order']['email'] = $customer['Customer']['email'];
        $order['Order']['phone'] = $customer['Customer']['phone'];
        $order['Order']['billing_address'] = $this->request->data['billing_address'];
        $order['Order']['billing_address2'] = '';
        $city = $this->DevvnTinhthanhpho->find('first',array('conditions' => array('matp' => $customer['Customer']['district'])));
        if($city) {
            $order['Order']['billing_city'] = $city['DevvnTinhthanhpho']['name'];
        } else {
            $order['Order']['billing_city'] = '';
        }
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
        //  $a = $this->Order->saveAll($order);
        $a = $this->Order->saveAll($order);

        $this->loadModel('Log');
        $this->Log->newOrderApp($this->Order->inserted_ids[0]);
        $this->Order->set($order);

        return json_encode(true);

    }


    public function order(){

        $this->loadModel('Order');
        $this->loadModel('Customer');
        $this->loadModel('OrderItem');
        $this->loadModel('DevvnTinhthanhpho');
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
        $city = $this->DevvnTinhthanhpho->find('first',array('conditions' => array('matp' => $customer['Customer']['district'])));
        if($city) {
            $order['Order']['billing_city'] = ['DevvnTinhthanhpho']['name'];
        } else {
            $order['Order']['billing_city'] = '';
        }
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
      //  $a = $this->Order->saveAll($order);
        $a = $this->Order->saveAll($order);

            $this->loadModel('Log');
            $this->Log->newOrderApp($this->Order->inserted_ids[0]);
            $this->Order->set($order);

            return json_encode(true);

    }


    public function getUserInfo($phone){
        //$phone = $this->request->data['phone'];
        $this->loadModel('Customer');
        $customer = $this->Customer->find('first', array('conditions' => array('phone' => $phone)));

        return json_encode($customer);
    }
}