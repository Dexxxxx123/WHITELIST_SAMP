<?php
/**
 * API keys controller.
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
 * API keys controller.
 * 
 * 
 */
class ApiKeysController extends AppController {
  
  /**
   * Components of the ApiKeysController used for the REST APIs.
   * 
   * @var array $components
   */
  public $components = array('RequestHandler');
  
  public function beforeFilter($options = array()) {   
    parent::beforeFilter($options);
  }
  
  /**
   * The API view action shows the information of a user and its aliases, if the API is valid.
   *
   * @param string $username The user's name.
   * @return array
   */  
  public function users_view($username) {
         
    if (! $this->request->is('get')) {
      throw new MethodNotAllowedException(__('Method not allowed'));
    }
    
    $User = ClassRegistry::init('User');
    $Alias = ClassRegistry::init('Alias');

    if (! AuthComponent::user('token')) {      
      $this->set('result', array('message' => 'API key is invalid.', 'status' => 'error'));                            
    }  else if (! $User->doesUsernameExist($username)) {     
      $this->set('result', array('message' => 'User not found.', 'status' => 'error')); 
    } else {     
      $userData = $User->find('first', array(
        'conditions' => array('User.username' => $username),
        'fields' => array('User.id', 'User.username', 'User.joined')
      ));
      
      $aliasData = $Alias->find('list', array(
        'conditions' => array('Alias.user_id' => $userData['User']['id']),
        'fields' => array('Alias.id', 'Alias.alias')
      ));
            
      $this->set('User', array_shift($userData)); 
      $this->set('Alias', $aliasData); 
    }
    
    $this->set('_serialize', array('User', 'Alias'));
  }
  
  public function users_check_whitelist($username) {
    
    if (! $this->request->is('get')) {
      throw new MethodNotAllowedException(__('Method not allowed'));
    }
        
    $User = ClassRegistry::init('User');
    $Ban = ClassRegistry::init('Ban');
    
    $result = $User->find('first', array(
      'conditions' => array('User.username' => $username), 
      'fields' => 'User.id'
      )
    );          

    if (! AuthComponent::user('token')) {
      $this->set('result', array('message' => 'API key is invalid.', 'status' => 'error'));
    }  else if (! $User->doesUsernameExist($username)) {
      $this->set('result', array('message' => 'User not found.', 'status' => 'error')); 
    } else {
      $localResult = $Ban->find('all', array(
        'conditions' => array(
          'Ban.user_id' => $result['User']['id'], 
          'Ban.status' => 1, 
          'Ban.type' => 'local', 
          'Ban.address' => $this->request->clientIp()
        ),
        'fields' => array(
          'Ban.id',
          'Ban.address',
          'Ban.type', 
          'Ban.date'
        )
      ));
      
      $globalResult = $Ban->find('all', array(
        'conditions' => array(
          'Ban.user_id' => $result['User']['id'], 
          'Ban.status' => 1, 
          'Ban.type' => 'global'
        ),
        'fields' => array(
          'Ban.id', 
          'Ban.address', 
          'Ban.type', 
          'Ban.date'
        )
      ));      
      
      $this->set('Local', $localResult);      
      $this->set('Global', $globalResult); 
    }
    
    $this->set('_serialize', array('Local', 'Global'));
  } 

  public function isAuthorized($user) {
    if ($this->request->params['controller'] === 'apikeys') {
      return true;
    }
  }
}