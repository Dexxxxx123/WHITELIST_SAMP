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
   */
  public $components = array(
    'Session',
    'Auth' => array(
      'authError' => 'You are not allowed to do that.',
      'loginAction' => array(
        'controller' => 'users',
        'action' => 'login'
      ),       
      'authenticate' => array(
        'form' => array(
          'passwordHasher' => 'Blowfish'
        )
      )
    )    
  );
  
  /**
   * By default, we are going to allow everyone to view the index page.
   * If anything, we'll just be more detailed in who allowing what in every specific controller.
   * We're also allowing display because we need it to show the static homepage.
   */
  public function beforeFilter($options = array()) {
    $this->Auth->allow('index', 'display');
  }
}
