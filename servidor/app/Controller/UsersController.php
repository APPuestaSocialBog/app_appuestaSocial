<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {


public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('add', 'logout','login_xhr','logout_xhr','is_auth', 
    				'add_new_user_xhr','set_departments_list_xhr','list_municipalities_by_department_id_xhr');
}

public function login() {
    if ($this->request->is('post')) {
    	/*debug($this->request->data);
    	exit(1);*/
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        }
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
}
public function login_xhr(){
	header('Access-Control-Allow-Origin: *'); 
	$this->layout = "ajax";

	if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            echo (json_encode(array("status"=>"auth_ok")));
        }else{
        	echo (json_encode(array("status"=>"auth_fail")));
        }
        //$this->Session->setFlash(__('Invalid username or password, try again'));
    }
}

public function logout() {
    return $this->redirect($this->Auth->logout());
}

public function logout_xhr() {
	header('Access-Control-Allow-Origin: *'); 
	$this->layout = "ajax";

	if($this->Auth->logout()){
	 	echo (json_encode(array("status"=>"logout_ok")));
    }else{
    	echo (json_encode(array("status"=>"logout_fail")));
    }
}


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
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {

			debug($this->request->data);
			exit(1);

			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	public function add_new_user_xhr() {
		header('Access-Control-Allow-Origin: *'); 
		$this->layout = "ajax";
		if ($this->request->is('post')) {
			$documento = $this->request->data["User"]["username"];

            $user = $this->User->find("count", array("conditions" => array('username' => $documento)));

            if($user >= 1){
            	echo (json_encode(array("status"=>"registered_user_fail","msg"=>"El n&ucute;mero de documento ya se encuentra registrado")));
            }else{
            	$this->User->create();
				if ($this->User->save($this->request->data)) {
					echo (json_encode(array("status"=>"registered_user_ok","msg"=>"Registro Existoso")));
				} else {
					echo (json_encode(array("status"=>"registered_user_fail","msg"=>"Ocurrio un error al guardar, por favor intenta de nuevo.")));
					//$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function home(){

	}

	public function is_auth_xhr(){
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: *");
		$this->layout = "ajax";
		if ( $this->Session->check('Auth.User') ){
			$dataUser = array();
			$dataUser["status"] = "is_auth_ok";
			$dataUser["dataUser"] = $this->Auth->user();
			echo (json_encode($dataUser));
		}else{
			echo (json_encode(array("status"=>"is_auth_fail")));
		}

	}

	public function noautorized(){
		header('Access-Control-Allow-Origin: *'); 
		$this->layout = "ajax";
		echo(json_encode(array("status"=>"noautorized")));
	}

	public function isAuthorized($user){

		$accion = $this->action;
		if(!parent::isAuthorized($user)){
			if (isset($user['group_id']) && $user['group_id'] == 2) {
				switch ($accion) {
					case 'home': 
					case 'noautorized':
					case "login_xhr":
					case "logout_xhr":
					case "is_auth_xhr":
					case "add_new_user_xhr":
					case "set_departments_list_xhr":
					case "list_municipalities_by_department_id_xhr":
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
