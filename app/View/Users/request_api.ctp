<div class="row">
  <?= $this->element('Users/sidenav'); ?>
  <div class="medium-10 large-centered columns">
    <h2 style="font-family: 'Open Sans'; font-weight: 400;">Terms of Service</h2>  
    <p>WHITELIST_SAMP is a free of charge service. <br><br>
    In order to use an API you must read and accept the following Terms of Service. <br>
    Any breach of the Terms of Service will result in a suspension of your API key. <br>
      WHITELIST_SAMP does not ensure in any way the complete availability of this service. <br><br>
      WHITELIST_SAMP is an open-source project and in continuous development. <br>
      This service might contain bugs or issue causing disruptions in the usage it. <br>
      If you encounter in any issue, please report them.
    </p>
    
    <ul>
      <li>You <strong>MUST</strong> keep your API key private and you <strong>MUST NOT</strong> share it with anyone else except yourself.</li>
      <li>You <strong>MUST</strong> use your API key for only <em>ONE</em> server IP address and you <strong>MUST NOT</strong> use it for other servers.</li>
      <li>You <strong>MUST</strong> be the owner of the server of which you are requesting the API key.</li>
      <li>You <strong>MAY</strong> use the API key for an <em>UNLIMITED</em> amount of servers (different ports) for the same IP address.</li>
      <li>You <strong>MAY</strong> only possess <em>ONE</em> API key per account.</li>
      <li>You <strong>MAY</strong> edit the server address which belongs the API key if necessary.</li>
    </ul>
    
    <p>WHITELIST_SAMP will keep a log of every API action and will not share it with anyone else except the its staff. <br>
      By clicling the 'Accept' button you will accept the Terms of Service and request an API key.</p>
    
    <div class="text-center">
      <?= $this->Form->create('ApiKey'); ?>
      <div class="medium-5 large-centered columns">
        <?= $this->Form->input('address', array('type' => 'text', 'placeholder' => 'Server Address')); ?>
      </div>
      <?= $this->Form->end(array('label' => __('Accept'), 'class' => 'button [tiny small large radius round]'), array('confirm' => 'Are you sure?')); ?>
    </div>    
  </div>
</div>