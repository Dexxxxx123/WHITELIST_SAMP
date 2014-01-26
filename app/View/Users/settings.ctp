<div class="row">
  <?= $this->element('Users/sidenav'); ?>
  <div class="medium-10 large-centered columns">
    <?php echo $this->Form->create('User'); ?>
    <div class="row">
      <div class="large-6 columns">
      <?php echo $this->Form->input('username', array('disabled' => true)); ?>
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
      <div class="small-10 small-centered text-center columns">
      <?php echo $this->Form->end(array('label' => __('Submit'), 'class' => 'button [tiny small large radius round]')); ?>
      </div>
    </div>
  </div>
</div>