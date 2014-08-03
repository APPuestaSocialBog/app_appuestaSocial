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

	public function add_new_complaint_xhr() {
		header('Access-Control-Allow-Origin: *'); 
		$this->layout = "ajax";

		if ($this->request->is('post')) {
			$this->Complaint->create();
			if ($this->Complaint->save($this->request->data)) {
				echo (json_encode(array("status"=>"registered_complaint_ok","msg"=>"Registro exitoso.")));
			} else {
				echo (json_encode(array("status"=>"registered_complaint_fail","msg"=>"Ocurrio un error al guardar, por favor intenta de nuevo.")));
			}
		}
		/*
			$users = $this->Complaint->User->find('list');
			$tipologies = $this->Complaint->Tipology->find('list');
			$subtipologies = $this->Complaint->Subtipology->find('list');
			$regions = $this->Complaint->Region->find('list');
			$states = $this->Complaint->State->find('list');
			$this->set(compact('users', 'tipologies', 'subtipologies', 'regions', 'states'));
		*/
	}

	public function list_complaints_by_user_id(){
		header('Access-Control-Allow-Origin: *'); 
		$this->layout = "ajax";

		if ($this->request->is('post')) {
			$auth_user_id = $this->request->data["auth_user_id"];
			$MComplaints = ClassRegistry::init("complaints");
			//$MComplaints->recursive = -2;
			$MComplaints->Behaviors->load('Containable');

            $complaints_list = $MComplaints->find("all", array(
            							"fields" => array(
            								'Tipologies.name',
											'Subtipologies.name',
											'Regions.nombre_departamento',
											'Regions.nombre_municipio',
											'States.name',
											'Complaints.id',
											'Complaints.latitude',
											'Complaints.longitude',
											'Complaints.donde',
											'Complaints.que_paso',
											'Complaints.response',
											'Complaints.created',
											'Complaints.createdby',
											'Complaints.modified',
											'Complaints.modifiedby',
											'users.username',
											'users.email',
											'users.phone'	
            							),
            							"conditions" => array('complaints.user_id' => $auth_user_id),
            							'joins' => array( 
						                    array( 
						                        'table' => 'tipologies', 
						                        'alias' => 'Tipologies', 
						                        'type' => 'INNER', 
						                        'foreignKey' => false, 
						                        'conditions'=> array( 
						                        'Complaints.tipology_id = Tipologies.id'
						                        ) 
						                    ),array( 
						                        'table' => 'subtipologies', 
						                        'alias' => 'Subtipologies', 
						                        'type' => 'INNER', 
						                        'foreignKey' => false, 
						                        'conditions'=> array( 
						                        	'Complaints.subtipology_id = Subtipologies.id'
						                        ) 
						                    ),array( 
						                        'table' => 'regions', 
						                        'alias' => 'Regions', 
						                        'type' => 'INNER', 
						                        'foreignKey' => false, 
						                        'conditions'=> array( 
						                        	'Regions.cod_municipio = Complaints.region_id'
						                        ) 
						                    ),
						                    array( 
						                        'table' => 'states', 
						                        'alias' => 'States', 
						                        'type' => 'INNER', 
						                        'foreignKey' => false, 
						                        'conditions'=> array( 
						                        	'States.id = Complaints.state_id'
						                        ) 
						                    ),array( 
						                        'table' => 'users', 
						                        'alias' => 'Users', 
						                        'type' => 'INNER', 
						                        'foreignKey' => false, 
						                        'conditions'=> array( 
						                        	'Complaints.user_id = Users.id'
						                        ) 
						                    )

						                )
            						));

            echo (json_encode($complaints_list));
		}
	}


	public function list_complaints_by_municipality_id(){
		header('Access-Control-Allow-Origin: *'); 
		$this->layout = "ajax";

		if ($this->request->is('post')) {
			$municipality_id = $this->request->data["municipality_id"];
			$MComplaints = ClassRegistry::init("complaints");
			//$MComplaints->recursive = -2;
			$MComplaints->Behaviors->load('Containable');

            $complaints_list = $MComplaints->find("all", array(
            							"fields" => array(
            								'Tipologies.name',
											'Subtipologies.name',
											'Regions.nombre_departamento',
											'Regions.nombre_municipio',
											'States.name',
											'Complaints.id',
											'Complaints.latitude',
											'Complaints.longitude',
											'Complaints.donde',
											'Complaints.que_paso',
											'Complaints.response',
											'Complaints.created',
											'Complaints.createdby',
											'Complaints.modified',
											'Complaints.modifiedby',
											'users.username',
											'users.email',
											'users.phone'	
            							),
            							"conditions" => array('complaints.region_id' => $municipality_id),
            							'joins' => array( 
						                    array( 
						                        'table' => 'tipologies', 
						                        'alias' => 'Tipologies', 
						                        'type' => 'INNER', 
						                        'foreignKey' => false, 
						                        'conditions'=> array( 
						                        'Complaints.tipology_id = Tipologies.id'
						                        ) 
						                    ),array( 
						                        'table' => 'subtipologies', 
						                        'alias' => 'Subtipologies', 
						                        'type' => 'INNER', 
						                        'foreignKey' => false, 
						                        'conditions'=> array( 
						                        	'Complaints.subtipology_id = Subtipologies.id'
						                        ) 
						                    ),array( 
						                        'table' => 'regions', 
						                        'alias' => 'Regions', 
						                        'type' => 'INNER', 
						                        'foreignKey' => false, 
						                        'conditions'=> array( 
						                        	'Regions.cod_municipio = Complaints.region_id'
						                        ) 
						                    ),array( 
						                        'table' => 'states', 
						                        'alias' => 'States', 
						                        'type' => 'INNER', 
						                        'foreignKey' => false, 
						                        'conditions'=> array( 
						                        	'States.id = Complaints.state_id'
						                        ) 
						                    ),array( 
						                        'table' => 'users', 
						                        'alias' => 'Users', 
						                        'type' => 'INNER', 
						                        'foreignKey' => false, 
						                        'conditions'=> array( 
						                        	'Complaints.user_id = Users.id'
						                        ) 
						                    )

						                )
            						));

            echo (json_encode($complaints_list));
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

	public function isAuthorized($user){
		header('Access-Control-Allow-Origin: *'); 
		$accion = $this->action;
		if(!parent::isAuthorized($user)){
			if (isset($user['group_id']) && $user['group_id'] == 2) {
				switch ($accion) {
					case 'add_new_complaint_xhr': 
					case 'list_complaints_by_user_id':
					case 'list_complaints_by_municipality_id':
						# code...
						break;
						# code...
						break;
						# code...
						break;
						# code...
						break;
						# code...
						break;
						# code...
						break;
						# code...
						break;
							return true;
						break;
					default:
						$this->redirect(array('controller' => 'users', 'action' => 'noautorized'));
						return false;
						break;
				}
	    	}
		}
		return true;
	}


}
