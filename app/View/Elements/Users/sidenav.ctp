  <div class="medium-2 columns" style="border-right: 1px solid grey;">
    <ul class="side-nav">
      <li><?= $this->Html->link('Profile Page', '/users/' . $this->Session->Read('Auth.User.id') . ''); ?></li>
      <li><?= $this->Html->link('Account Settings', '/users/' . $this->Session->Read('Auth.User.id') . '/settings'); ?></li>
      <li><?= $this->Html->link('Connections', '/users/' . $this->Session->Read('Auth.User.id') . '/connections'); ?></li>
      <li><?= $this->Html->link('Whitelist Status', '/users/' . $this->Session->Read('Auth.User.id') . '/whitelist'); ?></li>
      <li><?= $this->Html->link('Request API', '/users/' . $this->Session->Read('Auth.User.id') . '/request_api'); ?></li>
    </ul>
  </div>