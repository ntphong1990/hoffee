<?php
class BackEndController extends AppController
{

    public function beforeFilter()
    {
        $this->Auth->allow();
        $this->autoRender = false;
    }

    public function getProduct()
    {

        $this->loadModel('Product');

        $this->Paginator = $this->Components->load('Paginator');
        // $this->Paginator->settings = array(
        //     'Product' => array(
        //         'recursive' => -1,
        //         'contain' => array(
        //             'Brand'
        //         ),
        //         'limit' => 20,
        //         'conditions' => array(
        //             'Product.active' => 1,
        //             'Brand.active' => 1
        //         ),
        //         'order' => array(
        //             'Product.name' => 'ASC'
        //         ),
        //         'paramType' => 'querystring',
        //     )
        // );

        $this->Paginator->settings = array(
            'recursive' => -1,
            'limit' => 20,
            'order' => array(
                'name' => 'ASC'
            ),
            'paramType' => 'querystring',
        );

        $products = $this->Paginator->paginate('Product');
        $listProduct = array();

        for ($i = 0; $i < count($products); $i++) {
            array_push($listProduct, $products[$i]['Product']);
        }

        return json_encode($listProduct);
    }


    public function getCities()
    {
        $this->loadModel('DevvnTinhthanhpho');
        $this->loadModel('DevvnQuanhuyen');

        $cities = $this->DevvnTinhthanhpho->find('all');
        $listCities = array();

        for ($i = 0; $i < count($cities); $i++) {
            $city = $cities[$i]['DevvnTinhthanhpho'];
            $states = $this->DevvnQuanhuyen->find('all', array('conditions' => array('matp' => $cities[$i]['DevvnTinhthanhpho']['matp'])));
            $listState = array();
            for ($j = 0; $j < count($states); $j++) {
                $state = $states[$j]['DevvnQuanhuyen'];
                array_push($listState, $state);
            }
            $city['states'] = $listState;
            array_push($listCities, $city);
        }

        return json_encode($listCities);
    }

    public function orderVer1()
    {

        $jsonData = $this->request->input('json_decode', true);

        $this->loadModel('Customer');
        $customer = null;

        $isCustomerExisted = $this->Customer->find('first', array('conditions' => array(
            'phone' => $this->request->data['phone']
        )));

        if (!$isCustomerExisted) {
            $customer = $this->Customer->create();
            $customer['Customer']['name'] = $jsonData['first_name'];
            $customer['Customer']['lastname'] = $jsonData['last_name'];
            $customer['Customer']['address'] = $jsonData['billing_address'];
            $customer['Customer']['email'] = $jsonData['email'];
            $customer['Customer']['phone'] = $jsonData['phone'];
            $customer['Customer']['birthday'] = date('Y-m-d');
            $customer['Customer']['district'] = $jsonData['billing_city'];
            $customer['Customer']['state'] = $jsonData['state'];

            $this->Customer->save($customer);

            $customer['Customer']['id'] = $this->Customer->inserted_ids[0];

        } else {
            $customer = $this->Customer->find('first', array('conditions' => array(
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
        $order['Order']['billing_address'] = $jsonData['billing_address'];
        $order['Order']['billing_address2'] = '';
        $city = $this->DevvnTinhthanhpho->find('first', array('conditions' => array('matp' => $customer['Customer']['district'])));
        if ($city) {
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
        $order['Order']['subtotal'] = $jsonData['subtotal'];
        $order['Order']['voucher'] = 0;
        $order['Order']['code'] = '';
        $order['Order']['discount'] = 0;
        $order['Order']['note'] = $jsonData['note'];
        $order['Order']['shipping'] = $jsonData['shipping'];
        $order['Order']['total'] = $jsonData['total'];
        $order['Order']['status'] = $jsonData['status'];

        $orderItems = json_decode($jsonData['orderitem']);
        $order['OrderItem'] = array();
        $weight = 0;
        foreach ($orderItems as $key => $value) {
            $orderItem = array();

            $orderItem['product_id'] = $value->id;
            $orderItem['name'] = $value->name;
            $orderItem['weight'] = $value->weight * $value->quanlity;
            $orderItem['price'] = $value->price;
            $orderItem['quantity'] = $value->quanlity;
            $orderItem['subtotal'] = $value->quanlity * $value->price;
            $weight = $weight + $orderItem['weight'];
            array_push($order['OrderItem'], $orderItem);
        }
        if ($order['Order']['status'] == 1) {
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


    public function order()
    {

        $this->loadModel('Order');
        $this->loadModel('Customer');
        $this->loadModel('OrderItem');
        $this->loadModel('DevvnTinhthanhpho');
        $customer = $this->Customer->find('first', array('conditions' => array(
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
        $city = $this->DevvnTinhthanhpho->find('first', array('conditions' => array('matp' => $customer['Customer']['district'])));
        if ($city) {
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
        foreach ($orderItems as $key => $value) {
            $orderItem = array();

            $orderItem['product_id'] = $value->id;
            $orderItem['name'] = $value->name;
            $orderItem['weight'] = $value->weight * $value->quanlity;
            $orderItem['price'] = $value->price;
            $orderItem['quantity'] = $value->quanlity;
            $orderItem['subtotal'] = $value->quanlity * $value->price;
            $weight = $weight + $orderItem['weight'];
            array_push($order['OrderItem'], $orderItem);
        }
        if ($order['Order']['status'] == 1) {
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


    public function getUserInfo($phone)
    {
        //$phone = $this->request->data['phone'];
        $this->loadModel('Customer');
        $customer = $this->Customer->find('first', array('conditions' => array('phone' => $phone)));

        return json_encode($customer);
    }


    public function searchCustomer($key)
    {

    }


    public function getPassword()
    {
        $jsonData = $this->request->input('json_decode', true);
        $response['result'] = 1;
        $response['code'] = "OK";
        $response['data'] = null;
        $email = $jsonData['email'];

        $this->loadModel('Customer');
        $customer = $this->Customer->find('first', array('conditions' => array('email' => $email)));
        $pass = '';
        if ($customer) {
            //$pass = $this->generateRandomString();
            $pass = '123456';
            $customer['Customer']['password'] = AuthComponent::password($pass);

            $this->Customer->save($customer);
            $customer['Customer']['password'] = $pass;
            App::uses('CakeEmail', 'Network/Email');
            $email = new CakeEmail('gmail');
            $email->from(array(Configure::read('Settings.ADMIN_EMAIL') => 'Hoffee'))
                ->cc(Configure::read('Settings.ADMIN_EMAIL'))
                ->cc('order@hoffee.vn')
                ->to($customer['Customer']['email'])
                ->subject('Hoffee - Get Password')
                ->template('password')
                ->emailFormat('html')
                ->viewVars(array('customer' => $customer))
                ->send();
            $response['data'] = $customer;
        } else {
            $response['result'] = 0;
            $response['code'] = "EMAIL_INVALID";
            $response['data'] = null;
        }
//UD5MEB

        return json_encode($response);
    }

    public function register()
    {
        $jsonData = $this->request->input('json_decode', true);
        $this->loadModel('Customer');
        $customer = null;

        $response = array();
        $response['result'] = 1;
        $response['code'] = "OK";
        $response['data'] = null;
        $isCustomerExisted = $this->Customer->find('first', array('conditions' => array(
            'phone' => $this->request->data['phone']
        )));

        if (!$isCustomerExisted) {
            $customer = $this->Customer->create();
            $customer['Customer']['name'] = $jsonData['first_name'];
            $customer['Customer']['lastname'] = $jsonData['last_name'];
            $customer['Customer']['address'] = $jsonData['billing_address'];
            $customer['Customer']['email'] = $jsonData['email'];
            $customer['Customer']['phone'] = $jsonData['phone'];
            $customer['Customer']['birthday'] = date('Y-m-d');
            $customer['Customer']['district'] = $jsonData['billing_city'];
            $customer['Customer']['state'] = $jsonData['state'];

            $this->Customer->save($customer);

            $customer['Customer']['id'] = $this->Customer->inserted_ids[0];
            $response['data'] = $customer;
        } else {
            $response['result'] = 0;
            $response['code'] = "EXISTED";
        }
        return json_encode($response);
    }


    public function login()
    {
        $jsonData = $this->request->input('json_decode', true);
        $email = $jsonData['email'];
        $pass = $jsonData['password'];

        $response['result'] = 1;
        $response['code'] = "OK";
        $response['data'] = null;
        $this->loadModel('Customer');
        $customer = $this->Customer->find('first', array('conditions' => array(
            'email' => $email,
            'password' => AuthComponent::password($pass)
        )));

        if ($customer) {
            $customer['Customer']['token'] = $this->getToken();
            $this->Customer->save($customer);
            $response['data'] = $customer;
        } else {
            $response['result'] = 0;
            $response['code'] = "LOGIN_INVALID";
            $response['data'] = null;
        }
        return json_encode($response);

    }

    public function me(){

        $response['result'] = 1;
        $response['code'] = "OK";
        $response['data'] = null;
        $jsonData = $this->request->input('json_decode', true);
        $token = $jsonData['token'];
        $this->loadModel('Customer');
        $customer = $this->Customer->find('first', array('conditions' => array(
            'token' => $token
        )));
        if ($customer) {
            $customer['Customer']['token'] = $this->getToken();
            $this->Customer->save($customer);
            $response['data'] = $customer;
        } else {
            $response['result'] = 0;
            $response['code'] = "TOKEN_EXPIRED";
            $response['data'] = null;
        }

        return json_encode($response);
    }

    function generateRandomString($length = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function getToken($length = 50)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}






