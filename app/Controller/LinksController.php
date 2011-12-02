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
        $this->Link->id = $id;
        if (!$this->Link->exists()) {
            throw new NotFoundException(__('Link does not exist'));
        }
        if ($this->Link->delete()) {
            $this->Session->setFlash(__('Link deleted'));
            $this->redirect(array('controller' => 'users', 'action'=>'view'));
        }
        $this->Session->setFlash(__('Link could not be deleted'));
        $this->redirect(array('controller' => 'users', 'action' => 'view'));
    }

}