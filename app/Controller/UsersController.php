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
  public $helpers = array('Html', 'Form');
  
  /**
   * Index function
   * 
   * @return function if the user is not logged in is redirected to the homepage.
   */
  public function index() {
    if(! $this->User->id) {
      return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
    }
  }
}
