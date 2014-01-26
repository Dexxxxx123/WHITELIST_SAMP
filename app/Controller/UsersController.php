<?php
/**
 * Users controller.
 *
 * WHITELIST_SAMP: Global Whitelist Platform (https://github.com/GiampaoloFalqui/WHITELIST_SAMP)
 * 
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @link          https://github.com/GiampaoloFalqui/WHITELIST_SAMP WHITELIST_SAMP
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Users controller.
 */
class UsersController extends AppController {
  
  /**
    * In the UsersController beforeFilter callback we are going to allow users to login or register.
    * However, if someone is already logged in, we deny the access to the 'login' action.
    * Also, remember that in the AppController we allowed everyone to access the 'index' action, however in the UsersController it is only for logged in users. 
    * 
    * @param array $options (optional)
    * @return void
    */
  public function beforeFilter($options = array()) {
    parent::beforeFilter();               
    $this->Auth->allow('login', 'create');   
    $this->Auth->deny('index');
  }  
  
  /**
   * Components of the UsersController used for the REST APIs.
   * 
   * @var array $components
   */
  public $components = array('RequestHandler', 'Paginator');
  
  /**
   * Settings of the PaginatorComponent.
   * 
   * @var $array $paginate
   */

  
  /**
   * Helpers of the UsersController used by its views.
   * 
   * @var array $helpers
   */
  public $helpers = array('Html', 'Form', 'Time', 'Paginator' => array('className' => 'FixedPaginator'));
  
  /**
   * The index action redirects the user to the view action (user control panel) of the user itself, if logged in.
   *
   * @return void
   */  
  public function index() {
    return $this->redirect(array('controller' => 'users', 'action' => 'view', 'id' => $this->Auth->user('id')));
  }
  
  /**
   * The register action shows a register form page (if GET request) if the user is not logged in.
   * 
   * @return boolean If the user logs in successfully is redirected to the user control panel (index action), otherwise nothing is returned.
   */
  public function create() {
    
    if ($this->Auth->user()) {
      $this->Session->setFlash(__('You can not create an account, you are already logged in.'), 'default', array(), 'warning');   
      return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
    }
    
    if ($this->request->is('post')) {
      $this->User->create();           
      if ($this->User->save($this->request->data)) {        
        $this->Session->setFlash(__('The user has been created.'), 'default', array(), 'success');       
        $this->Auth->login();        
        return $this->redirect(array('action' => 'index'));
      }      
      $this->Session->setFlash(__('The user could not be created. Please, try again.'), 'default', array(), 'warning');      
    }
  }
  
  /**
   * The login action shows a login form page (if GET request) if the user is not logged in.
   * 
   * @return boolean If the user logs in successfully is redirected to the user control panel (index action), otherwise nothing is returned.
   */
   public function login() {
     
    if ($this->Auth->user()) {
      $this->Session->setFlash(__('You can not login, you already are.'), 'default', array(), 'warning');   
      return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
    }
     
     if ($this->request->is('post')) {
       if ($this->Auth->login()) {
         $this->Session->setFlash(__('You logged in successfully.'), 'default', array(), 'success');       
         return $this->redirect($this->Auth->redirect());
       }
       $this->Session->setFlash(__('Username or password are wrong.'), 'default', array(), 'warning');
     }
   }
   
  /**
   * The logout action logs off a user from the portal.
   * 
   * @return boolean If the user is logged in it gets logged out and returns true (from redirect action).
   */   
  public function logout() {
    $this->Auth->logout();
    $this->Session->setFlash(__('You logged out successfully.'), 'default', array(), 'success');      
    return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
  }

  /**
   * The view action shows the profile of a user, if logged in.
   * If the user id matches to the one that is logged in with, the user control panel is shown.
   *
   * @param integer $id The user id.
   * @return void
   */  
  public function view($id) {
    
    if (! $this->User->exists($id)) {
      throw new NotFoundException(__('User not found.'));
    }    
    
    $this->RequestHandler->setContent('html');
    
    $result = $this->User->findById($id, array(
      'User.id',
      'User.username',
      'User.email',
      'User.joined',
      'User.authy_id',
      'User.role'
    ));
    
    $this->set('user', $result);
  }

  /**
   * The API view action shows the information of a user, if the API is valid.
   * API is available only in JSON.
   *
   * @param integer $id The user id.
   * @return array
   */  
  public function api_view($id) {       
    
    if ($this->request->is('get')) {      
      if (! AuthComponent::user('token')) {  
        if (AuthComponent::user('username')) {
           return $this->set('user', array('message' => 'You must logout from the portal to use the API.', 'status' => 'error')); 
        }                            
        return $this->set('user', array('message' => 'API key is invalid.', 'status' => 'error')); 
      }
      
      if (! $this->User->exists($id)) {
        return $this->set('user', array('message' => 'User not found.', 'status' => 'error')); 
      }      
                               
      $result = $this->User->find('first', array(
        'conditions' => array('User.id' => $id),
        'recursive' => 1,
        'fields' => array(
          'User.id',
          'User.username',
          'User.joined',
        )
      ));
             
      return $this->set('user', $result);     
    }   
    $this->set('user', array('message' => 'Method not allowed.', 'status' => 'error'));
  }

  public function settings($id) {
    
    if (! $this->User->exists($id)) {
      throw new NotFoundExcepetion(__('User not found.'));      
    }
    
    $user = $this->User->findById($id, array(
      'User.username',
      'User.email'
    ));
    
    if ($this->request->is('post', 'put')) {
      $this->request->data['User']['current_email'] = $user['User']['email'];
      $this->request->data['User']['current_username'] = $user['User']['username'];
      if ($this->User->save($this->request->data)) {        
        $this->Session->setFlash(__('User settings successfully changed.'), 'default', array(), 'success');          
      } else {
        $this->request->data = array_merge($this->request->data, $user);        
      }
    }
    
    if (!$this->request->data) {
      $this->request->data = $user;
    }    
  }

  /**
   * The connections action shows the user connections to the servers that use WHITELIST_SAMP.
   * If the user id matches to the one that is logged in with, the page is shown, otherwise 
   * the user is redirected to the homepage access denied is given..
   *
   * @param integer $id The user id.
   * @return void
   */
  public function connections($id) {
    if (! $this->User->exists($id)) {
      throw new NotFoundException(__('User not found.'));
    }                  
    
    $this->Paginator->settings = array(
      'paramType' => 'querystring',
      'conditions' => array('Alias.user_id' => $id)
     );
     
    $result = 0;
    try {
        $result = $this->Paginator->paginate(ClassRegistry::init('Connection'));
    } catch (NotFoundException $e) {
      $this->Session->setFlash(__('The records you tried to access were invalid.'), 'default', array(), 'notice'); 
      return $this->redirect(array('controller' => 'users', 'action' => 'connections', 'id' => $this->Auth->user('id')));
    }

    $this->set('connections', $result);
  } 
 
  /**
   * The API connections action shows the connections of a user, if the API is valid.
   * API is available only in JSON.
   *
   * @param integer $id The user id.
   * @return array
   */    
  public function api_connections($id) {
    
    if ($this->request->is('get')) {
      if (! AuthComponent::user('token')) {  
        if (AuthComponent::user('username')) {
           return $this->set('user', array('message' => 'You must logout from the portal to use the API.', 'status' => 'error')); 
        }                            
        return $this->set('user', array('message' => 'API key is invalid.', 'status' => 'error')); 
      }          
      
      if (! $this->User->exists($id)) {
        return $this->set('user', array('message' => 'User not found.', 'status' => 'error')); 
      }                    
      
      $result = ClassRegistry::init('Connection')->find('all', array(
        'conditions' => array(
          'Alias.user_id' => $id
        )
      ));
      
      $this->set('connections', $result);
    }
  }
   
  /**
   * isAuthorized checks if the user is allowed to use a specific controller action.
   * 
   * @param array $user This parameter is automatically filled by the controller (it's basically the user information).
   * @return boolean View action is always allowed. If the action user id matches to the logged in user, it returs true, otherwise parent::isAuthorized($user) is called.
   */
  public function isAuthorized($user) {
    if (in_array($this->action, array('settings', 'whitelist', 'request_api', 'connections'))) {
      $userId = $this->request->params['id'];    
      if($userId === $user['id']) {
        return true;
      }
    }
    return parent::isAuthorized($user);
  }       
}