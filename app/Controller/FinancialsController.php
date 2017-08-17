<?php
App::uses('AppController', 'Controller');
/**
 * Financials Controller
 *
 * @property Financial $Financial
 * @property PaginatorComponent $Paginator
 */
class FinancialsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function admin_list() {
		$this->Financial->recursive = 0;
		$this->set('financials', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Financial->exists($id)) {
			throw new NotFoundException(__('Invalid financial'));
		}
		$options = array('conditions' => array('Financial.' . $this->Financial->primaryKey => $id));
		$this->set('financial', $this->Financial->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Financial->create();
			if ($this->Financial->save($this->request->data)) {
				$this->Flash->success(__('The financial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The financial could not be saved. Please, try again.'));
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
		if (!$this->Financial->exists($id)) {
			throw new NotFoundException(__('Invalid financial'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Financial->save($this->request->data)) {
				$this->Flash->success(__('The financial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The financial could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Financial.' . $this->Financial->primaryKey => $id));
			$this->request->data = $this->Financial->find('first', $options);
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
		$this->Financial->id = $id;
		if (!$this->Financial->exists()) {
			throw new NotFoundException(__('Invalid financial'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Financial->delete()) {
			$this->Flash->success(__('The financial has been deleted.'));
		} else {
			$this->Flash->error(__('The financial could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Financial->recursive = 0;
        $this->Paginator->settings = array(
            'Financial' => array(
                'recursive' => -1,
                'contain' => array(
                ),
                'conditions' => array(

                ),
                'order' => array(
                    'Financial.created' => 'DESC'
                ),
                'limit' => 20,
                'paramType' => 'querystring',
            )
        );

        $doanhthus = $this->Financial->find('all',array('conditions' => array(
            'kind' => 1,
            'type' => 1
        )));

        $doanhthu = 0;
        foreach ($doanhthus as $key => $value){
            $doanhthu = $doanhthu + intval($value['Financial']['value']);
        }

        $this->set('doanhthu',$doanhthu);

        $chis = $this->Financial->find('all',array('conditions' => array(
            'type' => 2
        )));

        $chi = 0;
        foreach ($chis as $key => $value){
            $chi = $chi + intval($value['Financial']['value']);
        }

        $this->set('chi',$chi);

        $tongthus = $this->Financial->find('all',array('conditions' => array(
            'type' => 1
        )));

        $tong = 0;
        foreach ($tongthus as $key => $value){
            $tong = $tong + intval($value['Financial']['value']);
        }
        $this->set('tong',$tong);
				$this->loadModel('Customer');
				$count = count($this->Customer->find('all'));

				$this->set('count',$count);

				$data = $this->Financial->find('all',array('conditions' => array(
            'type' => 1,
						 'kind' => 1
        ),
				'fields' => array('sum(value) as sum', 'YEAR(Financial.created) as year','MONTH(Financial.created) as month'),
				'group' => array('YEAR(Financial.created)','MONTH(Financial.created)')));
				//var_dump($data);
				$this->set('data',$data);

				$fee = $this->Financial->find('all',array('conditions' => array(
            'type' => 2,
						 'kind' => 0
        ),
				'fields' => array('sum(value) as sum', 'YEAR(Financial.created) as year','MONTH(Financial.created) as month'),
				'group' => array('YEAR(Financial.created)','MONTH(Financial.created)')));
				$this->set('fee_data',$fee);

				$this->loadModel('OrderItem');
				$products = $this->OrderItem->find('all',array(
				'fields' => array('sum(quantity) as sum','SUM(CASE WHEN product_id = 5 THEN quantity ELSE 0 END) as sum1','SUM(CASE WHEN product_id = 3 THEN quantity ELSE 0 END) as sum2','name','product_id','YEAR(created) as year','MONTH(created) as month'),
				'group' => array('YEAR(created)','MONTH(created)')));
				

				// $this->loadModel('Product');
				// $pro =  $this->Product->find('all',array('fields' => array('id','name'),'conditions' => array('active' => 1)));
				// $chart = [];
				// $chart['id'] = [];
				// $chart['name'] = [];
				// $chart['data'] = [];
				// foreach($pro as $value){
				// 	array_push($chart['id'],$value['Product']['id']);
				// 	array_push($chart['name'],$value['Product']['name']);
				// }
				// $monthyear = '';
				// foreach($products as $value){

				// }
			
				// var_dump($products);
				// foreach($products as $value){

				// }
				$this->set('product_data',$products);



			$this->set('financials', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Financial->exists($id)) {
			throw new NotFoundException(__('Invalid financial'));
		}
		$options = array('conditions' => array('Financial.' . $this->Financial->primaryKey => $id));
		$this->set('financial', $this->Financial->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Financial->create();
            $this->request->data['Financial']['kind'] = 0;
			if ($this->Financial->save($this->request->data)) {
				$this->Flash->success(__('The financial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The financial could not be saved. Please, try again.'));
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
		if (!$this->Financial->exists($id)) {
			throw new NotFoundException(__('Invalid financial'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Financial->save($this->request->data)) {
				$this->Flash->success(__('The financial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The financial could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Financial.' . $this->Financial->primaryKey => $id));
			$this->request->data = $this->Financial->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Financial->id = $id;
		if (!$this->Financial->exists()) {
			throw new NotFoundException(__('Invalid financial'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Financial->delete()) {
			$this->Flash->success(__('The financial has been deleted.'));
		} else {
			$this->Flash->error(__('The financial could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
