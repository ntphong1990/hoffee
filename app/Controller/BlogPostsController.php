<?php
App::uses('AppController', 'Controller');
/**
 * BlogPosts Controller
 *
 * @property BlogPost $BlogPost
 * @property PaginatorComponent $Paginator
 */
class BlogPostsController extends AppController {

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
	public function index() {
		$this->BlogPost->recursive = 0;
		$this->set('blogPosts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

		$options = array('conditions' => array('BlogPost.slug' => $id));
		$this->set('blogPost', $this->BlogPost->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BlogPost->create();
			if ($this->BlogPost->save($this->request->data)) {
				$this->Flash->success(__('The blog post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The blog post could not be saved. Please, try again.'));
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
		if (!$this->BlogPost->exists($id)) {
			throw new NotFoundException(__('Invalid blog post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BlogPost->save($this->request->data)) {
				$this->Flash->success(__('The blog post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The blog post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BlogPost.' . $this->BlogPost->primaryKey => $id));
			$this->request->data = $this->BlogPost->find('first', $options);
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
		$this->BlogPost->id = $id;
		if (!$this->BlogPost->exists()) {
			throw new NotFoundException(__('Invalid blog post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BlogPost->delete()) {
			$this->Flash->success(__('The blog post has been deleted.'));
		} else {
			$this->Flash->error(__('The blog post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BlogPost->recursive = 0;
		$this->set('blogPosts', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BlogPost->exists($id)) {
			throw new NotFoundException(__('Invalid blog post'));
		}
		$options = array('conditions' => array('BlogPost.' . $this->BlogPost->primaryKey => $id));
		$this->set('blogPost', $this->BlogPost->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BlogPost->create();
			if ($this->BlogPost->save($this->request->data)) {
				$this->Flash->success(__('The blog post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The blog post could not be saved. Please, try again.'));
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
		if (!$this->BlogPost->exists($id)) {
			throw new NotFoundException(__('Invalid blog post'));
		}


		if ($this->request->is(array('post', 'put'))) {
          //  var_dump($this->request->data['BlogPost']['image']);die();
            if($this->request->data['BlogPost']['image']['name'] != ''){
                $this->Img = $this->Components->load('Img');
                var_dump($this->request->data);
                $newName = $this->request->data['BlogPost']['slug'];

                $ext = $this->Img->ext($this->request->data['BlogPost']['image']['name']);
                // var_dump($this->request->data['Product']['image']);die();
                $origFile = $newName . '.' . $ext;


                $targetdir = WWW_ROOT . 'images/original';
                $dst = '/images/original/'.$origFile;
                $upload = $this->Img->upload($this->request->data['BlogPost']['image']['tmp_name'], $targetdir, $origFile);
                $this->request->data['BlogPost']['image'] = $dst;
            } else {
                unset($this->request->data['BlogPost']['image']);
            }

			if ($this->BlogPost->save($this->request->data)) {

				$this->Flash->success(__('The blog post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The blog post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BlogPost.' . $this->BlogPost->primaryKey => $id));
			$this->request->data = $this->BlogPost->find('first', $options);
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
		$this->BlogPost->id = $id;
		if (!$this->BlogPost->exists()) {
			throw new NotFoundException(__('Invalid blog post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BlogPost->delete()) {
			$this->Flash->success(__('The blog post has been deleted.'));
		} else {
			$this->Flash->error(__('The blog post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
