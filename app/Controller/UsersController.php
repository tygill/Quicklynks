<?php
class UsersController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Users';
    public $uses = array('User', 'Link');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register', 'login', 'logout');
    }

    public function view() {
        $id = $this->Auth->user('id');
        $links = $this->Link->find('all', array('conditions' => array('user_id' => $id)));
        $this->set('id', $id);
        $this->set('user', $this->Auth->user('username'));
        $this->set('links', $links);
    }

    public function login() {
        if ($this->Auth->login()) {
            $this->redirect(array('controller' => 'users', 'action' => 'view'));
        } else {
            if ($this->request->is('post')) {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function register() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                if ($this->Auth->login()) {
                    $this->redirect(array('controller' => 'users', 'action' => 'view'));
                } else {
                    $this->redirect(array('controller' => 'users', 'action' => 'login'));
                }
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('controller' => 'pages', 'action'=>'display', 'home'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
    }
}