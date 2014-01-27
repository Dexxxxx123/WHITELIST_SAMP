<div class="row">
  <?php if ($this->Session->read('Auth.User.id') == $user['User']['id'] || $this->Session->read('Auth.User.role') === 'Administrator'): ?>
  <?= $this->element('Users/sidenav'); ?>
  <div class="medium-6 columns">
    <strong>Username:</strong> <br><br>
    <strong>Email:</strong> <br><br>
    <strong>Joined:</strong> <br><br>
    <strong>Permissions:</strong> <br><br>
    <strong>Two-Factor Authentication:</strong>
  </div> 
  <div class="medium-4 columns">
    <?= $user['User']['username'] ?> <br><br>
    <?= $user['User']['email'] ?> <br><br>
    <span title="<?= $user['User']['joined'] ?>"><?= $this->Time->timeAgoInWords($user['User']['joined']); ?></span> <br><br>
    <?= $user['User']['role'] ?> <br><br>
    <?= ($user['User']['authy_id'] == -1) ? 'Inactive' : 'Active' ?> <br><br>
  </div>
  <?php else: ?>
  <div class="medium-4 medium-offset-3 columns">
    <strong>Username:</strong> <br><br>
    <strong>Joined:</strong>
  </div> 
  <div class="medium-5 columns">
    <?= $user['User']['username'] ?> <br><br>
    <span title="<?= $user['User']['joined'] ?>"><?= $this->Time->timeAgoInWords($user['User']['joined']); ?></span>
  </div>
  <?php endif; ?>   
</div>