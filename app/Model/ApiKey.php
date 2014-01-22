<?php
/**
 * Api Key model.
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
 * Api Key model.
 *
 *
 */
class ApiKey extends Model {
  
  /**
   * We need to define the table name manually otherwise CakePHP will recognize the table as ApiKeys instead of api_keys.
   */
  public $useTable = 'api_keys'; 
  
  /**
   * An ApiKey belongs to a single user.
   */
  public $belongsTo = 'User';
}