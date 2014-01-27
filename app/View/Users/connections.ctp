<div class="row">
  <?= $this->element('Users/sidenav'); ?>
  <div class="medium-10 large-centered columns">
    <?php if($this->Paginator->hasPrev() || $this->Paginator->hasNext()): ?>
      <div class="clearfix">
      <?php if($this->Paginator->hasPrev()): ?>
        <?= $this->Paginator->prev(__('« Previous'), array(
          'tag' => false, 'class' => 'left button tiny',
        )); ?>
      <?php endif; ?>    
      <?php if($this->Paginator->hasNext()): ?>
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
          <th width="15%">IP</th>
          <th width="40%">Alias</th>
          <th width="30%">Date</th>
        </tr>       
      </thead>
      <tbody>
        <?php foreach($connections as $connection): ?>
        <tr>
          <td><?= $connection['Connection']['id']; ?></td>
          <td><?= $connection['Connection']['address']; ?></td>
          <td><?= $connection['Alias']['alias']; ?></td>
          <td><?= $this->Time->timeAgoInWords($connection['Connection']['date']); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>