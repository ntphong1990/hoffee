<?php
App::uses('AppController', 'Controller');
/**
 * Logs Controller
 *
 * @property Log $Log
 * @property PaginatorComponent $Paginator
 */
class LogsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Log->recursive = 0;
		$this->set('logs', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Log->exists($id)) {
			throw new NotFoundException(__('Invalid log'));
		}
		$options = array('conditions' => array('Log.' . $this->Log->primaryKey => $id));
		$this->set('log', $this->Log->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Log->create();
			if ($this->Log->save($this->request->data)) {
				$this->Flash->success(__('The log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The log could not be saved. Please, try again.'));
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
		if (!$this->Log->exists($id)) {
			throw new NotFoundException(__('Invalid log'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Log->save($this->request->data)) {
				$this->Flash->success(__('The log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The log could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Log.' . $this->Log->primaryKey => $id));
			$this->request->data = $this->Log->find('first', $options);
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
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Invalid log'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Log->delete()) {
			$this->Flash->success(__('The log has been deleted.'));
		} else {
			$this->Flash->error(__('The log could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
