<?php
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');

class ShopController extends AppController
{

//////////////////////////////////////////////////

    public $components = array(
        'Cart',
        'Paypal',
        'AuthorizeNet'
    );

//////////////////////////////////////////////////

    public $uses = 'Product';

//////////////////////////////////////////////////

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->disableCache();
        //$this->layout = 'homelayout';
        //$this->Security->validatePost = false;
    }

//////////////////////////////////////////////////

    public function clear()
    {
        $this->Cart->clear();
        $this->Flash->danger('All item(s) removed from your shopping cart');
        return $this->redirect('/products');
    }

//////////////////////////////////////////////////

    public function add()
    {
        if ($this->request->is('post')) {
            $id = $this->request->data['Product']['id'];

            $quantity = isset($this->request->data['Product']['quantity']) ? $this->request->data['Product']['quantity'] : null;

            $productmodId = isset($this->request->data['mods']) ? $this->request->data['mods'] : null;

            $product = $this->Cart->add($id, $quantity, $productmodId);
        }
        if (!empty($product)) {
            $this->Flash->success($product['Product']['name'] . ' was added to your shopping cart.');
        } else {
            $this->Flash->danger('Unable to add this product to your shopping cart.');
        }
        $this->redirect($this->referer());
    }

//////////////////////////////////////////////////

    public function itemupdate()
    {
        if ($this->request->is('ajax')) {
            $id = $this->request->data['id'];

            $quantity = isset($this->request->data['quantity']) ? $this->request->data['quantity'] : null;

            if (isset($this->request->data['mods']) && ($this->request->data['mods'] > 0)) {
                $productmodId = $this->request->data['mods'];
            } else {
                $productmodId = null;
            }

            // echo $productmodId ;
            // die;

            $product = $this->Cart->add($id, $quantity, $productmodId);
        }
        $cart = $this->Session->read('Shop');
        echo json_encode($cart);
        $this->autoRender = false;
    }

//////////////////////////////////////////////////

    public function update()
    {
        $this->Cart->update($this->request->data['Product']['id'], 1);
    }

//////////////////////////////////////////////////

    public function remove($id = null)
    {
        $product = $this->Cart->remove($id);
        if (!empty($product)) {
            $this->Flash->danger($product['Product']['name'] . ' was removed from your shopping cart');
        }
        return $this->redirect(array('action' => 'cart'));
    }

//////////////////////////////////////////////////

    public function cartupdate()
    {
        if ($this->request->is('post')) {
            $this->loadModel('Voucher');
            $voucher = $this->Voucher->find('first', array(
                'conditions' => array(
                    'code' => $this->request->data['coupon_code'],

                )));
           // var_dump($voucher);die();
            foreach ($this->request->data['Product'] as $key => $value) {
                $p = explode('-', $key);
                $p = explode('_', $p[1]);
                if ($voucher) {
                    $this->Cart->add($p[0], $value, $p[1], $voucher['Voucher']['value'], $voucher['Voucher']['code']);
                } else {
                    $this->Cart->add($p[0], $value, $p[1]);
                }
            }
            // $this->Flash->success('Shopping Cart is updated.');
        }
        return $this->redirect(array('action' => 'cart'));
    }

    public function shipupdate($id, $state = 0, $firstname = '', $lastname = '', $email = '', $phone = '', $address = '')
    {
       // if ($this->request->is('post'))

        //var_dump($state);die();
        $ship = 0;
        $this->loadModel('District');
        $this->loadModel('Ward');
        if ($state != 0) {
            $st = $this->Ward->find('first', array('conditions' => array('id' => $state)));
            $ship = $st['Ward']['fee'];
        } else {
            if ($id) {
                $st = $this->District->find('first', array('conditions' => array('id' => $id)));
                $ship = $st['District']['fee'];
            }
        }
        //var_dump($ship);die();
            //var_dump($ship);die();
            // var_dump($voucher);die();
            $this->Cart->shipping($ship, $id, $firstname, $lastname, $email, $phone, $address, $state);
            // $this->Flash->success('Shopping Cart is updated.');
       // }
        return $this->redirect(array('action' => 'address'));
    }

//////////////////////////////////////////////////

    public function cart()
    {
        
        $shop = $this->Session->read('Shop');
        $this->set(compact('shop'));
    }

//////////////////////////////////////////////////

    public function address()
    {

        $shop = $this->Session->read('Shop');
        $this->set(compact('shop'));
        if (!$shop['Order']['total']) {
            return $this->redirect('/');
        }

        $shop = $this->Session->read('Shop');
        $this->loadModel('District');
        $this->loadModel('Ward');
        $locations = $this->District->find('all', array('order' => array('name' => 'ASC')));
        $this->set('locations', $locations);


        $states =  $this->Ward->find('all');
        $this->set('states', $states);
        // var_dump($shop['Order']['state']);
        // // var_dump($states);
        //  die();

        if ($this->request->is('post')) {
            $this->loadModel('Order');
            $this->Order->set($this->request->data);
            

            if ($this->Order->validates()) {
                $this->loadModel('District');
                $this->request->data['Order']['shipping_address'] = $this->request->data['Order']['billing_address'];

                $this->request->data['Order']['shipping_city'] = $this->District->find('first', array('conditions' => array('id' => $this->request->data['Order']['billing_city'])))['District']['name'];

                $order = $this->request->data['Order'];
                $order['order_type'] = '';

                if (isset($this->request->data['Order']['direct'])) {
                    $order['order_type'] = $order['order_type'].'direct';
                }
                if (isset($this->request->data['Order']['transfer'])) {
                    $order['order_type'] = $order['order_type'].'transfer';
                }
                $this->Session->write('Shop.Order', $order + $shop['Order']);

                // var_dump($order);die();

                $this->Order->set($this->request->data);
                // var_dump($this->request->data);die();
                if ($this->Order->validates()) {
                    $shop = $this->Session->read('Shop');
                    $order = $shop;
                    $order['Order']['status'] = 2;
                    //var_dump($order);die();
                    $save = $this->Order->saveAll($order);

                    if ($save) {
                        $this->loadModel('Log');
                        $this->Log->newOrder($this->Order->inserted_ids[0]);
                        $this->loadModel('Customer');
                        if (!$this->Customer->find('first', array('conditions' => array(
                            'phone' => $order['Order']['phone']
                        )))) {
                            $customer = $this->Customer->create();
                            $customer['Customer']['name'] = $order['Order']['first_name'];
                            $customer['Customer']['lastname'] = $order['Order']['last_name'];
                            $customer['Customer']['address'] = $order['Order']['billing_address'];
                            $customer['Customer']['email'] = $order['Order']['email'];
                            $customer['Customer']['phone'] = $order['Order']['phone'];
                            $customer['Customer']['birthday'] = date('Y-m-d');
                            $customer['Customer']['district'] = $this->request->data['Order']['billing_city'];
                            $customer['Customer']['state'] =  $this->request->data['Order']['state'];
                            $this->Customer->save($customer);
                        }
                        $this->set(compact('shop'));

                        App::uses('CakeEmail', 'Network/Email');
                        $email = new CakeEmail('gmail');
                        $email->from(array(Configure::read('Settings.ADMIN_EMAIL') => 'Hoffee'))
                            ->cc(Configure::read('Settings.ADMIN_EMAIL'))
                            ->cc('order@hoffee.vn')
                            ->to($shop['Order']['email'])
                            ->subject('Shop Order')
                            ->template('default')
                            ->emailFormat('html')
                            ->viewVars(array('shop' => $shop))
                            ->send();

                        $client = new HttpSocket();
                        $text = "New order from ".$shop['Order']['email'].' '.number_format($shop['Order']['total']).'đ';
                        $client->get('https://api.telegram.org/bot382029828:AAEg0QZTfPgKX8yzJaLrOpgng55ZkgZUF6k/sendMessage?chat_id=-204330263&text='.$text);
                        return $this->redirect(array('action' => 'success'));
                    } else {
                        $errors = $this->Order->invalidFields();
                        $this->set(compact('errors'));
                    }
                }

                //return $this->redirect(array('action' => 'review'));
            } else {
                $this->Flash->danger('Please input required field.');
            }
        }
        if (!empty($shop['Order'])) {
            $this->request->data['Order'] = $shop['Order'];
        }
    }

//////////////////////////////////////////////////

    public function step1()
    {
        $shop = $this->Session->read('Shop');
        if (!$shop) {
            return $this->redirect('/');
        }
        $this->Session->write('Shop.Order.order_type', 'paypal');
        $this->Paypal->step1($shop);
    }

//////////////////////////////////////////////////

    public function step2()
    {

        $token = $this->request->query['token'];
        $paypal = $this->Paypal->GetShippingDetails($token);

        $ack = strtoupper($paypal['ACK']);
        if ($ack == 'SUCCESS' || $ack == 'SUCESSWITHWARNING') {
            $this->Session->write('Shop.Paypal.Details', $paypal);
            return $this->redirect(array('action' => 'review'));
        } else {
            $ErrorCode = urldecode($paypal['L_ERRORCODE0']);
            $ErrorShortMsg = urldecode($paypal['L_SHORTMESSAGE0']);
            $ErrorLongMsg = urldecode($paypal['L_LONGMESSAGE0']);
            $ErrorSeverityCode = urldecode($paypal['L_SEVERITYCODE0']);
            echo 'GetExpressCheckoutDetails API call failed. ';
            echo 'Detailed Error Message: ' . $ErrorLongMsg;
            echo 'Short Error Message: ' . $ErrorShortMsg;
            echo 'Error Code: ' . $ErrorCode;
            echo 'Error Severity Code: ' . $ErrorSeverityCode;
            die();
        }
    }

//////////////////////////////////////////////////

    public function review()
    {

        $shop = $this->Session->read('Shop');

        if (empty($shop)) {
            return $this->redirect('/');
        }

        if ($this->request->is('post')) {
            $this->loadModel('Order');

            $this->Order->set($this->request->data);
            if ($this->Order->validates()) {
                $order = $shop;
                $order['Order']['status'] = 1;

               /* if($shop['Order']['order_type'] == 'paypal') {
                    $paypal = $this->Paypal->ConfirmPayment($order['Order']['total']);
                    //debug($resArray);
                    $ack = strtoupper($paypal['ACK']);
                    if($ack == 'SUCCESS' || $ack == 'SUCCESSWITHWARNING') {
                        $order['Order']['status'] = 2;
                    }
                    $order['Order']['authorization'] = $paypal['ACK'];
                    //$order['Order']['transaction'] = $paypal['PAYMENTINFO_0_TRANSACTIONID'];
                }

                if((Configure::read('Settings.AUTHORIZENET_ENABLED') == 1) && $shop['Order']['order_type'] == 'creditcard') {
                    $payment = array(
                        'creditcard_number' => $this->request->data['Order']['creditcard_number'],
                        'creditcard_month' => $this->request->data['Order']['creditcard_month'],
                        'creditcard_year' => $this->request->data['Order']['creditcard_year'],
                        'creditcard_code' => $this->request->data['Order']['creditcard_code'],
                    );
                    try {
                        $authorizeNet = $this->AuthorizeNet->charge($shop['Order'], $payment);
                    } catch(Exception $e) {
                        $this->Flash->flash($e->getMessage());
                        return $this->redirect(array('action' => 'review'));
                    }
                    $order['Order']['authorization'] = $authorizeNet[4];
                    $order['Order']['transaction'] = $authorizeNet[6];
                }*/
                
                
                $save = $this->Order->saveAll($order);
                //var_dump($order);die();
                if ($save) {
                    $this->set(compact('shop'));

                    App::uses('CakeEmail', 'Network/Email');
                    $email = new CakeEmail('gmail');
                    $email->from(array(Configure::read('Settings.ADMIN_EMAIL') => 'Hoffee'))
                            ->cc(Configure::read('Settings.ADMIN_EMAIL'))
                            ->to($shop['Order']['email'])
                            ->subject('Shop Order')
                            ->template('order')
                            ->emailFormat('text')
                            ->viewVars(array('shop' => $shop))
                            ->send();
                    return $this->redirect(array('action' => 'success'));
                } else {
                    $errors = $this->Order->invalidFields();
                    $this->set(compact('errors'));
                }
            }
        }
        
        if (($shop['Order']['order_type'] == 'paypal') && !empty($shop['Paypal']['Details'])) {
            $shop['Order']['first_name'] = $shop['Paypal']['Details']['FIRSTNAME'];
            $shop['Order']['last_name'] = $shop['Paypal']['Details']['LASTNAME'];
            $shop['Order']['email'] = $shop['Paypal']['Details']['EMAIL'];
            $shop['Order']['phone'] = '888-888-8888';
            $shop['Order']['billing_address'] = $shop['Paypal']['Details']['SHIPTOSTREET'];
            $shop['Order']['billing_address2'] = '';
            $shop['Order']['billing_city'] = $shop['Paypal']['Details']['SHIPTOCITY'];
            $shop['Order']['billing_zip'] = $shop['Paypal']['Details']['SHIPTOZIP'];
            $shop['Order']['billing_state'] = $shop['Paypal']['Details']['SHIPTOSTATE'];
            $shop['Order']['billing_country'] = $shop['Paypal']['Details']['SHIPTOCOUNTRYNAME'];

            $shop['Order']['shipping_address'] = $shop['Paypal']['Details']['SHIPTOSTREET'];
            $shop['Order']['shipping_address2'] = '';
            $shop['Order']['shipping_city'] = $shop['Paypal']['Details']['SHIPTOCITY'];
            $shop['Order']['shipping_zip'] = $shop['Paypal']['Details']['SHIPTOZIP'];
            $shop['Order']['shipping_state'] = $shop['Paypal']['Details']['SHIPTOSTATE'];
            $shop['Order']['shipping_country'] = $shop['Paypal']['Details']['SHIPTOCOUNTRYNAME'];

            $shop['Order']['order_type'] = 'paypal';

            $this->Session->write('Shop.Order', $shop['Order']);
        }

        $this->set(compact('shop'));
    }

//////////////////////////////////////////////////

    public function success()
    {
        $shop = $this->Session->read('Shop');
        $this->Cart->clear();
        if (empty($shop)) {
            return $this->redirect('/');
        }
        $this->set(compact('shop'));
    }

//////////////////////////////////////////////////
}
