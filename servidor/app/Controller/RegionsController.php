<?php
App::uses('AppController', 'Controller');
/**
 * Regions Controller
 *
 * @property Region $Region
 * @property PaginatorComponent $Paginator
 */
class RegionsController extends AppController {

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
		$this->Region->recursive = 0;
		$this->set('regions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Region->exists($id)) {
			throw new NotFoundException(__('Invalid region'));
		}
		$options = array('conditions' => array('Region.' . $this->Region->primaryKey => $id));
		$this->set('region', $this->Region->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Region->create();
			if ($this->Region->save($this->request->data)) {
				$this->Session->setFlash(__('The region has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The region could not be saved. Please, try again.'));
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
		if (!$this->Region->exists($id)) {
			throw new NotFoundException(__('Invalid region'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Region->save($this->request->data)) {
				$this->Session->setFlash(__('The region has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The region could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Region.' . $this->Region->primaryKey => $id));
			$this->request->data = $this->Region->find('first', $options);
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
		$this->Region->id = $id;
		if (!$this->Region->exists()) {
			throw new NotFoundException(__('Invalid region'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Region->delete()) {
			$this->Session->setFlash(__('The region has been deleted.'));
		} else {
			$this->Session->setFlash(__('The region could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function list_departments_xhr(){
		$this->layout = "ajax";

		$MRegions = ClassRegistry::init("regions");
		$MRegions->recursive = 1;

		$departments = $MRegions->find("all",array(
				'fields' => array("cod_departamento","nombre_departamento"),
				'group' =>array('cod_departamento')
			));

		echo (json_encode($departments));


	}

	public function list_municipalities_by_department_id_xhr(){
		$this->layout = "ajax";

		if ($this->request->is('post')) {
			$department_id = $this->request->data["department_id"];
			$MRegions = ClassRegistry::init("regions");
			$MRegions->recursive = 1;


            $munucipalities_list = $MRegions->find("all", array(
            							"fields" => array('cod_municipio',"nombre_municipio"),
            							"conditions" => array('cod_departamento' => $department_id))
            						);

            echo (json_encode($munucipalities_list));
		}

	}

	public function isAuthorized($user){

		$accion = $this->action;
		if(!parent::isAuthorized($user)){
			if (isset($user['group_id']) && $user['group_id'] == 2) {
				switch ($accion) {
					case 'list_departments_xhr': 
					case 'list_municipalities_by_department_id_xhr':
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
