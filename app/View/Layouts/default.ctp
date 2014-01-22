<?php
/**
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
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <?php 
    echo $this->Html->charset('UTF-8');    
    echo $this->Html->meta('icon'); 
    echo $this->Html->css('foundation.min.css'); 	
    echo $this->Html->script('http://code.jquery.com/jquery.min.js');
    ?>
  </head>
  
  <body>
    <a href="https://github.com/GiampaoloFalqui/BLACKLIST_SAMP"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png" alt="Fork me on GitHub"></a>
    <header>
      <div class="row">
        <div class="small-12 small-centered text-center columns">
          <br><?php echo $this->Html->image('logo.png', array('alt' => 'BLACKLIST_SAMP Logo')); ?><br>
          <h2 class="subheader">global blacklist platform</h2>
        </div>
      </div>              
    </header>
    
    <nav>
      <br>
      <div class="row">
        <div class="small-8 small-centered text-center columns">
          <ul class="button-group [radius round]">
            <li><a href="#" class="button [tiny small large]">Button 1</a></li>
            <li><a href="#" class="button [tiny small large]">Button 2</a></li>
            <li><a href="#" class="button [tiny small large]">Button 3</a></li>
            <li><a href="#" class="button [tiny small large]">Button 4</a></li>
            <li><a href="#" class="button [tiny small large]">Button 5</a></li>
            <li><a href="#" class="button [tiny small large]">Button 6</a></li>          
          </ul>
        </div>
        <hr>
      </div>  
    </nav>    
    
    <section>
      <div class="row">
        <div class="small-12 small-centered columns">
        <?php echo $this->Session->flash(); ?>
  
        <?php echo $this->fetch('content'); ?>
        </div>
        <hr>
      </div>    
    </section>    

    <?php
    echo $this->Html->script('foundation.min.js');
    ?>
    
    <script>
      $(document).foundation();
    </script>
    
  <footer>
      <div class="row">
        <div class="small-12 small-centered text-center columns">                    
          <small>&copy; 2014 MIT License - <a href="https://github.com/GiampaoloFalqui/BLACKLIST_SAMP">BLACKLIST_SAMP</a><br/><br/>
            
          BLACKLIST_SAMP and the contents herein, is not affiliated with Rockstar Games, Rockstar North or Take-Two Interactive Software Inc.<br/>
          Grand Theft Auto and Grand Theft Auto: San Andreas are registered trademarks of Take-Two Interactive Software Inc.<br/><br/>                    
          </small>
        </div>
      </div>
      
      <div class="row">
        <div class="small-12 small-centered text-center columns">                    
          <?php echo $this->element('sql_dump'); ?>
        </div>
      </div>       
  </footer>
</body>
</html>