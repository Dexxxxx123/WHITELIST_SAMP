<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Account Register'); ?>
        </legend>
        
        <div class="row">
          <div class="large-6 columns">
          <?php echo $this->Form->input('username', array('placeholder' => 'Username')); ?>
          </div>
          <div class="large-6 columns">
          <?php echo $this->Form->input('password', array('placeholder' => 'Password')); ?>
          </div>
          <div class="large-6 columns">
          <?php echo $this->Form->input('email', array('type' => 'email', 'placeholder' => 'Email Address')); ?>
          </div>
          <div class="large-6 columns">
          <?php echo $this->Form->input('repeat_password', array('type' => 'password', 'placeholder' => 'Repeat Password')); ?>
          </div>                      
        </div>
        
        <div class="row">
          <div class="large-12 text-center columns">
          <?php echo $this->Form->end(array('label' => __('Submit'), 'class' => 'button [tiny small large radius round]')); ?>
          </div>
        </div>
    </fieldset>