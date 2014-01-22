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
 * 
 * 
 */
class UsersController extends AppController {
  
  /**
   * Helpers of the UsersController used by its views.
   */
  public $helpers = array('Html', 'Form');
  
  /**
   * The index action shows the user control panel of the user itself, if logged in.
   * 
   * @return function if the user is not logged in is redirected to the homepage.
   */
  public function index() {
  }
  
  /**
   * The register action shows a register form page if the user is not logged in.
   * 
   * @return function if the user is logged in already is redirected to the user control panel (index action).
   */
  public function create() {
    if ($this->request->is('post')) {
      $this->User->create();
      
      /*
      $addresses = $this->User->findLinkedAliasses($this->request->clientIp());
      if (! $addresses) {
        $this->User->linkAliasesToUser($addresses, $this->User->id);
      }
      */
           
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('The user has been created.'));
        $this->User->login();
        return $this->redirect(array('action' => 'index'));
      }
      $this->Session->setFlash(__('The user could not be created. Please, try again.'));      
    }
  }
  
  /**
   * The login ation shows a login form page if the user is not logged in.
   * 
   * @return function if the user is logged in already is redirected to the user control panel (index action).
   */
   public function login() {
     if ($this->request->is('post')) {
       if ($this->User->login()) {
         $this->Session->setFlash(__('You logged in successfully.'));       
         return $this->redirect($this->Auth->redirect());
       }
       $this->Session->setFlash(__('Username or password are wrong.'));
     }
   }
   
  /**
   * The logout ation logs a user off the portal.
   * 
   * @return function if the user is logged in is logged out and redirected to the homepage.
   */   
   public function logout() {
     return $this->redirect($this->Auth->logout());
   }
   
   /**
    * In the UsersController beforeFilter callback we are going to allow users to login or register.
    * However, if someone is already logged in, we deny the access to the 'login' action.
    * Also, remember that in the AppController we allowed everyone to access the 'index' action, however in the UsersController it is only for logged in users.
    */
   public function beforeFilter($options = array()) {
     
     # If the user is not logged in, we deny him to access the 'index' action and allow him the actions 'create' and 'login'.    
     if (! $this->Auth->user('id')) {
       $this->Auth->deny('index');
       $this->Auth->allow('create', 'login', 'logout');
     } else {
     # There is no need to allow 'index' again, we've done it already in the AppController.       
       $this->Auth->allow('logout');
     }
   }
}
