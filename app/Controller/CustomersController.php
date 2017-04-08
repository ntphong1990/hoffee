<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 * @property PaginatorComponent $Paginator
 */
class CustomersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'id' => 'desc'
        )
    );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Customer->recursive = 0;
		$this->set('customers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
		$this->set('customer', $this->Customer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Customer->create();
			if ($this->Customer->save($this->request->data)) {
				$this->Flash->success(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The customer could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Customer->save($this->request->data)) {
				$this->Flash->success(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The customer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
			$this->request->data = $this->Customer->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Customer->delete()) {
			$this->Flash->success(__('The customer has been deleted.'));
		} else {
			$this->Flash->error(__('The customer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
        $this->Paginator->settings = $this->paginate;
        $key = '';
        if ($this->request->is('post')) {
            $key = $this->request->data['key'];
            //var_dump($key);die();
            $this->Paginator->settings = array(
                'limit' => 25,
                'conditions' => array('phone like \'%'.$key.'%\' OR email like \'%'.$key.'%\' OR Customer.name like \'%'.$key.'%\''),
                'order' => array(
                    'id' => 'desc'
                )
            );

        }
        $this->set('key',$key);
		$this->Customer->recursive = 0;
		$this->set('customers', $this->Paginator->paginate());

	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}




		$this->loadModel('Order');

        $this->Paginator->settings = array(
            'conditions' => array('Order.customer_id' => $id),
            'limit' => 10
        );

        $orders = $this->Paginator->paginate('Order');


        if ($this->request->is('post')) {
            $order = $this->Customer->find('first', array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id)));

            $order['Customer']['note'] = $this->request->data['note'];

            if ($this->Customer->save($order)) {
                //var_dump($order);die();
                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(array('action' => 'admin_view',$id));
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }

       // $orders = $this->Order->find('all',array('conditions' => array('customer_id' => $id)));
        $this->set(compact('orders'));
		$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
		$this->set('customer', $this->Customer->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
        $this->loadModel('DevvnTinhthanhpho');
        $this->loadModel('DevvnQuanhuyen');
        $locations = $this->DevvnTinhthanhpho->find('all',array('order' => array('ind' => 'ASC')));
        $this->set('district',$locations);




        $states =  $this->DevvnQuanhuyen->find('all',array('conditions' => array()));
        $this->set('states',$states);
		if ($this->request->is('post')) {
			$this->Customer->create();

			if ($this->Customer->save($this->request->data)) {
				$this->Flash->success(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The customer could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {

        $this->loadModel('DevvnTinhthanhpho');
        $this->loadModel('DevvnQuanhuyen');
        $locations = $this->DevvnTinhthanhpho->find('all',array('order' => array('ind' => 'ASC')));
        $this->set('district',$locations);




        $states =  $this->DevvnQuanhuyen->find('all',array('conditions' => array()));
        $this->set('states',$states);

		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Customer']['id'] = $id;
            $this->request->data['Customer']['gender'] = $this->data['IsMale'];
            //var_dump($this->request->data);die();
			if ($this->Customer->save($this->request->data)) {
				$this->Flash->success(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The customer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
			$this->request->data = $this->Customer->find('first', $options);
		}
       // var_dump($this->request->data);die();
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Customer->delete()) {
			$this->Flash->success(__('The customer has been deleted.'));
		} else {
			$this->Flash->error(__('The customer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
