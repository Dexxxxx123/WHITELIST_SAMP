<?php echo $this->Session->flash('auth', array('element' => 'Flashes/warning')); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Account Login'); ?>
        </legend>
        
        <div class="row">
          <div class="large-6 columns">
          <?php echo $this->Form->input('username', array('placeholder' => 'Username')); ?>
          </div>
          <div class="large-6 columns">
          <?php echo $this->Form->input('password', array('placeholder' => 'Password')); ?>
          </div>                    
        </div>
        
        <div class="row">
          <div class="large-12 text-center columns">
          <?php echo $this->Form->end(array('label' => __('Submit'), 'class' => 'button [tiny small large radius round]')); ?>
          </div>
        </div>
    </fieldset>