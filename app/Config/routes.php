<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
  /* Routes Roadmap:
   * 
   * Users
   * GET /users/view/{username}
   * GET /users/settings/{username}
   * GET /users/connections/{username}
   * GET /users/whitelist/{id}
   * GET /users/request_api/{id}
   * 
   * API Control Panel in Web Application
   * GET /api/view/{key}
   * GET /api/settings/{key}
   * GET /api/whitelist/{key}
   * GET /api/verify/{key}/{token}
   * 
   * External API
   * 
   * (TBA) POST /api/users/request/{username}/tfa/sms?api_key={key} Requests a SMS token (if the username has TFA active and API key is allowed) of 'username' to verify the connection.
   * (TBA) POST /api/users/request/{username}/tfa/call?api_key={key} Requests a CALL token (if the username has TFA active and API key is allowed) of 'username' to verify the connection.
   * 
   */
  
  Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

  Router::connect('/api/users/view/:username', array(
    'controller' => 'apikeys', 'action' => 'users_view', '[method]' => 'GET'
  ), array('pass' => array('username')));
  
  Router::connect('/api/users/whitelist/:username', array(
    'controller' => 'apikeys', 'action' => 'users_check_whitelist', '[method]' => 'GET'
  ), array('pass' => array('username')));   
  
  Router::parseExtensions('json', 'xml');
  
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
 require CAKE . 'Config' . DS . 'routes.php';
