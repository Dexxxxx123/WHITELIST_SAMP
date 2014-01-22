<?php
/**
 * Users controller.
 *
 * BLACKLIST_SAMP: Global Blacklist Platform (https://github.com/GiampaoloFalqui/BLACKLIST_SAMP)
 * 
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @link          https://github.com/GiampaoloFalqui/BLACKLIST_SAMP BLACKLIST_SAMP
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
    if(! $this->User->user()) {
      return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
    }
  }
  
  /**
   * The register action shows a register form page if the user is not logged in.
   * 
   * @return function if the user is logged in already is redirected to the user control panel (index action).
   */
  public function create() {    
  }
  
  /**
   * The login cation shows a login form page if the user is not logged in.
   * 
   * @return function if the user is logged in already is redirected to the user control panel (index action).
   */
   public function login() {
   }
}
