<?php
class LinksController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Links';
    public $uses = array('User', 'Link');
    

    public function add() 
	{
		if ($this->request->is('post')) 
		{
            $this->Link->create();
			$this->request->data['Link']['user_id'] = $this->Auth->user('id');
            if ($this->Link->save($this->request->data))
			{
                $this->Session->setFlash(__('The link has been added'));           
				$this->redirect(array('controller' => 'users', 'action' => 'view'));
            } else {
                $this->Session->setFlash(__('The link could not be saved. Please, try again.'));
            }
        }
    }
	
	public function delete($id = null) 
	{
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