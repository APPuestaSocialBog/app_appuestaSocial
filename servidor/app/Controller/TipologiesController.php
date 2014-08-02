<?php
App::uses('AppController', 'Controller');
/**
 * Tipologies Controller
 *
 * @property Tipology $Tipology
 * @property PaginatorComponent $Paginator
 */
class TipologiesController extends AppController {

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
		$this->Tipology->recursive = 0;
		$this->set('tipologies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tipology->exists($id)) {
			throw new NotFoundException(__('Invalid tipology'));
		}
		$options = array('conditions' => array('Tipology.' . $this->Tipology->primaryKey => $id));
		$this->set('tipology', $this->Tipology->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipology->create();
			if ($this->Tipology->save($this->request->data)) {
				$this->Session->setFlash(__('The tipology has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipology could not be saved. Please, try again.'));
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
		if (!$this->Tipology->exists($id)) {
			throw new NotFoundException(__('Invalid tipology'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tipology->save($this->request->data)) {
				$this->Session->setFlash(__('The tipology has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipology could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tipology.' . $this->Tipology->primaryKey => $id));
			$this->request->data = $this->Tipology->find('first', $options);
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
		$this->Tipology->id = $id;
		if (!$this->Tipology->exists()) {
			throw new NotFoundException(__('Invalid tipology'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Tipology->delete()) {
			$this->Session->setFlash(__('The tipology has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipology could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
