<?php
/**
 * User model.
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

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('Address', 'Model');
App::uses('Alias', 'Model');

/**
 * User model.
 *
 *
 */
 
class User extends Model {
  
  /**
   * An User has many aliases, if necessary.
   */
  public $hasMany = 'Alias';
  
  /**
   * An User has only one ApiKey, if registered.
   */
  public $hasOne = 'ApiKey';
  
  /**
   * Finds all the aliases by the client address (checking the database known addresses).
   * 
   * @return bool|array if errors are found, false is returned. otherwise an array with aliases found is returned.
   */
  public function findLinkedAliasses($ip) {
    if (! $ip) {     
      return false;
    }
    
    $addressModel = new Address;
    $result = $addressModel->find('all', array(
      'conditions' => array(
        'Address.address' => $ip,
        'Address.status' => 1
      )
    ));
       
    if (! $result) {
      return false;
    } else {
      return $result;
    }
  }

  /**
   * Link an array of aliases to a specific user id.
   */
  public function linkAliasesToUser($result, $id) {
    if (! $result) {
      return false;
    }
    
    if (! $id) {
      return false;
    }
    
    $aliasModel = new Alias;
    $index = 0;
    while ($index < count($result)) {
      $result[$index]['Alias']['user_id'] = $id;
      $aliasModel->save($result[$index]['Alias']);
      $index++;
    }
    
    return true;  
  }
  
  /**
   * beforeSave callback is used in the User model to hash user passwords when registering in Blowfish.
   * Which is why we included BlowfishPasswordHasher earlier, outside of the class.
   */
   
  public function beforeSave($options = array()) {
    $this->data['User']['password'] = (new BlowfishPasswordHasher)->hash($this->data['User']['password']);
  }  
}