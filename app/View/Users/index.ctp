<div class="row">
  <div class="medium-2 columns" style="border-right: 1px solid grey;">
    <ul class="side-nav">
      <li><a href="#">Account Settings</a></li>
      <li><a href="#">Connections</a></li>
      <li><a href="#">Whitelist Status</a></li>
      <li><a href="#">Request API</a></li>
    </ul>
  </div>
  <div class="medium-4 columns">
    <strong>Username:</strong> <br><br>
    <strong>Email:</strong> <br><br>
    <strong>Joined:</strong> <br><br>
    <strong>Permissions:</strong> <br><br>
    <strong>Two-Factor Authentication:</strong>
  </div> 
  <div class="medium-4 columns">
    <?= $user['User']['username'] ?> <br><br>
    <?= $user['User']['email'] ?> <br><br>
    <span title="<?= $user['User']['joined'] ?>"><?= $this->Time->timeAgoInWords($user['User']['joined']) ?></span> <br><br>
    <?= $user['User']['role'] ?> <br><br>
    <?= ($user['User']['authy_id'] == -1) ? 'Inactive' : 'Active' ?> <br><br>
  </div>
</div>