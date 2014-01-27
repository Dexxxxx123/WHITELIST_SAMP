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
   * /api/users/whitelist/{username}?api_key={key} Check if 'username' is locally in their server or globally banned in the whitelist.
   * - HTTP Method: GET
   * - Controller: ApiKeysController
   * - Action: users_check_whitelist
   * - Params: username
   * 
   * /api/users/whitelist/{username}?api_key={key} Bans a user (locally from their server or globally in the whitelist if API key is allowed).
   * - HTTP Method: POST
   * - Controller: ApiKeysController
   * - Action: users_ban_whitelist
   * - Params: username, type (through POST data)
   * 
   * /api/users/whitelist/{username}?api_key={key} Unbans a user (only local bans, global bans must be removed from the website).
   * - HTTP Method: DELETE
   * - Controller: ApiKeysController
   * - Action: users_unban_whitelist
   * - Params: username
   * 
   * /api/users/view/{username}?api_key={key} Takes the available information of 'username' from the database.
   * - HTTP Method: GET
   * - Controller: ApiKeysController
   * - Action: users_view
   * - Params: username
   * 
   * /api/users/verify/{username}/email/{token}?api_key={key} Checks if the email token of 'username' is valid.
   * - HTTP Method: GET
   * - Controller: ApiKeysController
   * - Action: users_verify_email
   * - Params: username, token
   * 
   * /api/users/request/{username}/email?api_key={key} Requests an email token of 'username' to verify the connection.
   * - HTTP Method: POST
   * - Controller: ApiKeysController
   * - Action: users_request_email
   * - Params: username
   * 
   * (TBA) POST /api/users/request/{username}/tfa/sms?api_key={key} Requests a SMS token (if the username has TFA active and API key is allowed) of 'username' to verify the connection.
   * (TBA) POST /api/users/request/{username}/tfa/call?api_key={key} Requests a CALL token (if the username has TFA active and API key is allowed) of 'username' to verify the connection.
   * 
   */
  
  Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
  
  Router::connect('/api/:controller/:action/*', array('prefix' => 'api', 'api' => true));
  # Router::connect('/api/:controller/:id', array('action' => 'view', 'prefix' => 'api', 'api' => true), array('pass' => array('id')));
  # Router::connect('/api/:controller/:id/:action', array('prefix' => 'api', 'api' => true), array('pass' => array('id')));
  
  # Router::connect('/:controller', array('action' => 'index'));
  # Router::connect('/:controller/:id', array('action' => 'view'), array('pass' => array('id')));
  # Router::connect('/:controller/:id/:action/*', array(), array('pass' => array('id'))); 
  
  Router::mapResources('users', array('prefix' => '/api/'));
  Router::parseExtensions('json');  
  
/**
 * Portal Homepage
 
  Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

  Router::connect('/api/:controller/*', array('action' => 'view', 'prefix' => 'api', 'api' => true)); 
  Router::connect('/api/:controller/:id/:action/*', array('prefix' => 'api', 'api' => true), array('pass' => array('id')));

**
 * User Routes
 *
  Router::connect('/users/register', array('controller' => 'users', 'action' => 'create'));
  Router::connect('/users/login', array('controller' => 'users', 'action' => 'login'));
  Router::connect('/users/logout', array('controller' => 'users', 'action' => 'logout'));
  
**
 * Global Routes
 *
  Router::connect('/:controller/:id', array('action' => 'view'), array('pass' => array('id'))); 
  Router::connect('/:controller/:id/:action/*', array(), array('pass' => array('id')));
  */
  
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
