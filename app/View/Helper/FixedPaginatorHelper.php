<?php

App::uses('PaginatorHelper', 'View/Helper');

class FixedPaginatorHelper extends PaginatorHelper {
  
  public function link($title, $url = array(), $options = array()) {
    $options = array_merge(array('model' => null, 'escape' => true), $options);
    $model = $options['model'];
    unset($options['model']);      

    if (isset($options['url'])) {
      $url = array_merge((array)$options['url'], (array)$url);
      unset($options['url']);   
    }
    unset($options['convertKeys']);

    $url = $this->url($url, true, $model);
    

    $obj = isset($options['update']) ? $this->_ajaxHelperClass : 'Html';
    return $this->{$obj}->link($title, $url, $options);
  }  
  
}