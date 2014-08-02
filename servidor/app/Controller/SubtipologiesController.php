<?php
App::uses('AppController', 'Controller');
/**
 * Subtipologies Controller
 *
 * @property Subtipology $Subtipology
 * @property PaginatorComponent $Paginator
 */
class SubtipologiesController extends AppController {

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
		$this->Subtipology->recursive = 0;
		$this->set('subtipologies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Subtipology->exists($id)) {
			throw new NotFoundException(__('Invalid subtipology'));
		}
		$options = array('conditions' => array('Subtipology.' . $this->Subtipology->primaryKey => $id));
		$this->set('subtipology', $this->Subtipology->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subtipology->create();
			if ($this->Subtipology->save($this->request->data)) {
				$this->Session->setFlash(__('The subtipology has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subtipology could not be saved. Please, try again.'));
			}
		}
		$tipologies = $this->Subtipology->Tipology->find('list');
		$this->set(compact('tipologies'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Subtipology->exists($id)) {
			throw new NotFoundException(__('Invalid subtipology'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Subtipology->save($this->request->data)) {
				$this->Session->setFlash(__('The subtipology has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subtipology could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Subtipology.' . $this->Subtipology->primaryKey => $id));
			$this->request->data = $this->Subtipology->find('first', $options);
		}
		$tipologies = $this->Subtipology->Tipology->find('list');
		$this->set(compact('tipologies'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Subtipology->id = $id;
		if (!$this->Subtipology->exists()) {
			throw new NotFoundException(__('Invalid subtipology'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Subtipology->delete()) {
			$this->Session->setFlash(__('The subtipology has been deleted.'));
		} else {
			$this->Session->setFlash(__('The subtipology could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
