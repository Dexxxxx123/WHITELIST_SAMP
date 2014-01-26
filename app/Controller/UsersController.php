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
 
App::uses('ApiKey', 'Model');
 
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
                     
    # If the user is not logged in, we deny him to access the 'index' action and allow him the actions 'create' and 'login'.    
    if ($this->Auth->user('id')) {
      $this->Auth->allow('logout', 'index', 'view');
    } else {
    # There is no need to allow 'index' again, we've done it already in the AppController.    
      $this->Auth->allow('create', 'login', 'logout');
    }
  }  
  
  /**
   * Components of the UsersController used for the REST APIs.
   * 
   * @var array $components
   */
  public $components = array('RequestHandler');
  
  /**
   * Helpers of the UsersController used by its views.
   * 
   * @var array $helpers
   */
  public $helpers = array('Html', 'Form', 'Time');
  
  /**
   * The index action redirects the user to the view action (user control panel) of the user itself, if logged in.
   *
   * @return void
   */  
  public function index() {   
    if ($this->Auth->user('id')) {
      return $this->redirect(array('controller' => 'users', 'action' => 'view', 'id' => $this->Auth->user('id')));
    } else {
      return $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }
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
    
    $result = ClassRegistry::init('Connection')->find('all', array(
      'conditions' => array(
        'Alias.user_id' => $id
      )
    ));
    
    $this->set('connections', $result);
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
      if (! $this->Auth->identify($this->request, $this->response)) {
        return $this->set('user', array('message' => 'API key is invalid.', 'status' => 'error')); 
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
  
  /**
   * The register action shows a register form page (if GET request) if the user is not logged in.
   * 
   * @return boolean If the user logs in successfully is redirected to the user control panel (index action), otherwise nothing is returned.
   */
  public function create() {
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
   * isAuthorized checks if the user is allowed to use a specific controller action.
   * 
   * @param array $user This parameter is automatically filled by the controller (it's basically the user information).
   * @return boolean View action is always allowed. If the action user id matches to the logged in user, it returs true, otherwise parent::isAuthorized($user) is called.
   */
  public function isAuthorized($user) {   
    if ($this->action === 'view') {
      return true;
    }
    if (in_array($this->action, array('settings', 'whitelist', 'request_api', 'connections'))) {
      $userId = $this->request->params['pass'][0];
      if($userId === $user['id']) {
        return true;
      }
    }    
    return parent::isAuthorized($user);
  }       
}
