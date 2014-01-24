<?php unset($user['User']['role'], $user['User']['authy_id'], $user['Alias']); ?>
<?= json_encode($user, JSON_PRETTY_PRINT); ?>