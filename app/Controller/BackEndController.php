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

}