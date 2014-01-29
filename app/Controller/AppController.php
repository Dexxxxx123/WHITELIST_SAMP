<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('TokenAuthenticate', 'Authenticate.Controller/Component/Auth');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
  
  /**
   * Components used by the entire application.
   * 
   * @var array $components
   */
  public $components = array(
    'DebugKit.Toolbar',
    'Session', 
    'Auth' => array(
      'authError' => 'You are not allowed to do that.',
      'loginAction' => array(
        'controller' => 'users',
        'action' => 'login',
        'api' => false
      ),
      'logoutAction' => array(
        'controller' => 'users',
        'action' => 'logout'
      ),
      'authorize' => array('Controller')
    ) 
  ); 
  
  /**
   * By default, we are going to allow everyone to view the index page.
   * If anything, we'll just be more detailed in who allowing what in every specific controller.
   * We're also allowing display because we need it to show the static homepage.
   * 
   * @var array $options (optional)
   * @return void
   */
  public function beforeFilter($options = array()) {
       
    $this->Auth->authenticate = array(
      'Authenticate.Token' => array(
        'parameter' => 'api_key',
        'header' => 'X-WhiteListApiToken',
        'userModel' => 'ApiKey',
        'recursive' => -1,
        'fields' => array(
          'username' => 'username', 
          'token' => 'token'
        )      
      ),
      'Form' => array(
        'userModel' => 'User',
        'passwordHasher' => 'Blowfish'
      ) 
    );
    
    $this->Auth->allow('display');
  } 

  /**
   * AppController's isAuthorized is executed by children controllers.
   * 
   * @see UsersController::isAuthorized($user)
   * @param array $user This parameter is automatically filled by the controller (it's basically the user information).
   * @return boolean Administrators are always allowed.
   */
  public function isAuthorized($user) {
    if (isset($this->request->params['api']) && $this->request->params['api'] === true) {
      return true;
    }
    if (isset($user['role']) && $user['role'] === 'Administrator') {
      return true;
    } else {
      $this->Session->setFlash(__('You are not authorized to do so.'), 'default', array(), 'warning');      
      return false;
    }  
  }
}
