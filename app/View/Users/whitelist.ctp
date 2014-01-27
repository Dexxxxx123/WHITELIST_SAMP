<div class="row">
  <?= $this->element('Users/sidenav'); ?>
  <div class="medium-10 large-centered columns">
    <?php if (empty($whitelist)): ?>
      You have no bans in your record.
    <?php else: ?>
      <?php if ($this->Paginator->hasPrev() || $this->Paginator->hasNext()): ?>
        <div class="clearfix">
        <?php if ($this->Paginator->hasPrev()): ?>
          <?= $this->Paginator->prev(__('« Previous'), array(
            'tag' => false, 'class' => 'left button tiny',
          )); ?>
        <?php endif; ?>    
        <?php if ($this->Paginator->hasNext()): ?>
          <?= $this->Paginator->next(__('Next »'), array(
            'tag' => false, 'class' => 'right button tiny',
          )); ?>
        <?php endif; ?>
        </div>
      <?php endif; ?>
                     
      <table>
        <thead>
          <tr>
            <th width="1%">ID</th>
            <th width="15%">Server IP</th>
            <th width="40%">Type</th>
            <th width="30%">Date</th>
          </tr>       
        </thead>
        <tbody>
          <?php foreach($whitelist as $ban): ?>
          <tr>
            <td><?= $ban['Ban']['id']; ?></td>
            <td><?= $ban['Ban']['address']; ?></td>
            <td><?= $ban['Ban']['type']; ?></td>
            <td><?= $this->Time->timeAgoInWords($ban['Ban']['date']); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</div>