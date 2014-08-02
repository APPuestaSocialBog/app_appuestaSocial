<?php
App::uses('AppController', 'Controller');
/**
 * Complaints Controller
 *
 * @property Complaint $Complaint
 * @property PaginatorComponent $Paginator
 */
class ComplaintsController extends AppController {

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
		$this->Complaint->recursive = 0;
		$this->set('complaints', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Complaint->exists($id)) {
			throw new NotFoundException(__('Invalid complaint'));
		}
		$options = array('conditions' => array('Complaint.' . $this->Complaint->primaryKey => $id));
		$this->set('complaint', $this->Complaint->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Complaint->create();
			if ($this->Complaint->save($this->request->data)) {
				$this->Session->setFlash(__('The complaint has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The complaint could not be saved. Please, try again.'));
			}
		}
		$users = $this->Complaint->User->find('list');
		$tipologies = $this->Complaint->Tipology->find('list');
		$subtipologies = $this->Complaint->Subtipology->find('list');
		$regions = $this->Complaint->Region->find('list');
		$states = $this->Complaint->State->find('list');
		$this->set(compact('users', 'tipologies', 'subtipologies', 'regions', 'states'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Complaint->exists($id)) {
			throw new NotFoundException(__('Invalid complaint'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Complaint->save($this->request->data)) {
				$this->Session->setFlash(__('The complaint has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The complaint could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Complaint.' . $this->Complaint->primaryKey => $id));
			$this->request->data = $this->Complaint->find('first', $options);
		}
		$users = $this->Complaint->User->find('list');
		$tipologies = $this->Complaint->Tipology->find('list');
		$subtipologies = $this->Complaint->Subtipology->find('list');
		$regions = $this->Complaint->Region->find('list');
		$states = $this->Complaint->State->find('list');
		$this->set(compact('users', 'tipologies', 'subtipologies', 'regions', 'states'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Complaint->id = $id;
		if (!$this->Complaint->exists()) {
			throw new NotFoundException(__('Invalid complaint'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Complaint->delete()) {
			$this->Session->setFlash(__('The complaint has been deleted.'));
		} else {
			$this->Session->setFlash(__('The complaint could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
