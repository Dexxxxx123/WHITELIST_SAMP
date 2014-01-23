<?php if ($this->Session->read('Auth.User')): ?>
      <div class="row">
        <div class="small-12 small-centered text-center columns">
          <ul class="button-group [radius round]" style="list-style-type: none; text-align: center; display: inline-block;">
            <li><?= $this->Html->link('Index', 
              array('controller' => 'pages', 'action' => 'display', 'home'), 
              array('class' => 'button [tiny small large]')
            ); ?></li>
            <li><?= $this->Html->link('UCP', 
              array('controller' => 'users', 'action' => 'index'), 
              array('class' => 'button [tiny small large]')
            ); ?></li> 
             <li><?= $this->Html->link('Logout', 
              array('controller' => 'users', 'action' => 'logout'), 
              array('class' => 'button [tiny small large]')
            ); ?></li>             
          </ul>
        </div>
      </div>
                   
      <div class="row">   
        <div class="small-12 text-center columns">
          <h6 class="subheader">You are logged in as <strong><?= $this->Session->read('Auth.User.username'); ?></strong>.</h6>
        </div>
        <br>
        <hr>
      </div>        
<?php else: ?>      
      <div class="row">
        <div class="small-12 small-centered text-center columns">
          <ul class="button-group [radius round]" style="list-style-type: none; text-align: center; display: inline-block;">
            <li><?= $this->Html->link('Index', 
              array('controller' => 'pages', 'action' => 'display', 'home'), 
              array('class' => 'button [tiny small large]')
            ); ?></li>
            <li><?= $this->Html->link('Register', 
              array('controller' => 'users', 'action' => 'create'), 
              array('class' => 'button [tiny small large]')
            ); ?></li>
            <li><?= $this->Html->link('Login', 
              array('controller' => 'users', 'action' => 'login'), 
              array('class' => 'button [tiny small large]')
            ); ?></li>                              
          </ul>
        </div>
        <hr>
      </div>        
<?php endif; ?>      