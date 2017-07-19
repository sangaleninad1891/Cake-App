<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize() {
      parent::initialize();
      if ($this->request->action === 'register') {
        $this->loadComponent('Recaptcha.Recaptcha');
      }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Posts']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * @return \Cake\Http\Response|null
     */
    public function login(){

      // check if user is logged in or not
      if($this->Auth->user('id')){
        $this->Flash->warning(__('You are already logged in!'));
        return $this->redirect(['controller' => 'Users', 'action' => 'index']);
      }

      // login request
      if($this->request->is('post')){
        $user = $this->Auth->identify();
        if($user){
          $this->Auth->setUser($user);
          return $this->redirect(['controller' => 'HomePage', 'action' => 'index']);
        }
        $this->Flash->error('Invalid email or password...');
      }
    }

    /**
     * @return \Cake\Http\Response|null
     */
    public function logout(){
      $this->Flash->success('Logged out successfully!');
      return $this->redirect($this->Auth->logout());
    }

    /**
     * @param \Cake\event\Event $event
     */
    public function beforeFilter(Event $event) {
      $this->Auth->allow(['register']);
      //return parent::beforeFilter($event);
    }

    /**
     * @return \Cake\Http\Response|null
     */
    public function register(){

      $user = $this->Users->newEntity();
      if($this->request->is('post')){
        if ($this->Recaptcha->verify()) {
          $user = $this->Users->patchEntity($user, $this->request->getData());
          if ($this->Users->save($user)) {
            $this->Flash->success('You are successfully registered!');
            return $this->redirect(['action' => 'login']);
          }
          else {
            $this->Flash->error('Sorry you are not registered, please try later.');
          }
        }
        else{
          $this->Flash->error(__('Please check your reCaptcha Box.'));
        }
      }
      $this->set(compact('user'));
      $this->set('_serialize', ['user']);
    }
}
