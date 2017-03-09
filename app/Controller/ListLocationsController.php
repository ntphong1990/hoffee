<?php
App::uses('AppController', 'Controller');
/**
 * ListLocations Controller
 *
 * @property ListLocation $ListLocation
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ListLocationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ListLocation->recursive = 0;
		$this->set('listLocations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ListLocation->exists($id)) {
			throw new NotFoundException(__('Invalid list location'));
		}
		$options = array('conditions' => array('ListLocation.' . $this->ListLocation->primaryKey => $id));
		$this->set('listLocation', $this->ListLocation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ListLocation->create();
			if ($this->ListLocation->save($this->request->data)) {
				$this->Flash->success(__('The list location has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The list location could not be saved. Please, try again.'));
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
		if (!$this->ListLocation->exists($id)) {
			throw new NotFoundException(__('Invalid list location'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ListLocation->save($this->request->data)) {
				$this->Flash->success(__('The list location has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The list location could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ListLocation.' . $this->ListLocation->primaryKey => $id));
			$this->request->data = $this->ListLocation->find('first', $options);
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
		$this->ListLocation->id = $id;
		if (!$this->ListLocation->exists()) {
			throw new NotFoundException(__('Invalid list location'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ListLocation->delete()) {
			$this->Flash->success(__('The list location has been deleted.'));
		} else {
			$this->Flash->error(__('The list location could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ListLocation->recursive = 0;
		$this->set('listLocations', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ListLocation->exists($id)) {
			throw new NotFoundException(__('Invalid list location'));
		}
		$options = array('conditions' => array('ListLocation.' . $this->ListLocation->primaryKey => $id));
		$this->set('listLocation', $this->ListLocation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ListLocation->create();
			if ($this->ListLocation->save($this->request->data)) {
				$this->Flash->success(__('The list location has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The list location could not be saved. Please, try again.'));
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
		if (!$this->ListLocation->exists($id)) {
			throw new NotFoundException(__('Invalid list location'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ListLocation->save($this->request->data)) {
				$this->Flash->success(__('The list location has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The list location could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ListLocation.' . $this->ListLocation->primaryKey => $id));
			$this->request->data = $this->ListLocation->find('first', $options);
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
		$this->ListLocation->id = $id;
		if (!$this->ListLocation->exists()) {
			throw new NotFoundException(__('Invalid list location'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ListLocation->delete()) {
			$this->Flash->success(__('The list location has been deleted.'));
		} else {
			$this->Flash->error(__('The list location could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
