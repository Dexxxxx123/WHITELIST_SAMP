  <div class="medium-2 columns" style="border-right: 1px solid grey;">
    <ul class="side-nav">
      <li><?= $this->Html->link('Profile Page', array(
        'controller' => 'users', 'action' => 'view', $this->Session->Read('Auth.User.id')
      )); ?></li>
      <li><?= $this->Html->link('Account Settings', array(
        'controller' => 'users', 'action' => 'settings', $this->Session->Read('Auth.User.id')
      )); ?></li>
       <li><?= $this->Html->link('Connections', array(
        'controller' => 'users', 'action' => 'connections', $this->Session->Read('Auth.User.id')
      )); ?></li>
       <li><?= $this->Html->link('Whitelist Status', array(
        'controller' => 'users', 'action' => 'whitelist', $this->Session->Read('Auth.User.id')
      )); ?></li>
       <li><?= $this->Html->link('Request API', array(
        'controller' => 'users', 'action' => 'request_api', $this->Session->Read('Auth.User.id')
      )); ?></li>
    </ul>
  </div>