<br>
<?= $this->Html->css('login.css');?>


<div class="form-signin">
  <div class="panel">
    <h2 class="form-signin-heading"> LOGIN </h2>
    <?= $this->form->create(); ?>
      <?= $this->form->input('email', ['placeholder' => 'Email address', 'class' => 'form-control sr-only']); ?>
      <?= $this->form->input('password', ['placeholder' => 'Password', 'class' => 'form-control sr-only'], array('type' => 'password')); ?>
      <br>
      <?= $this->form->submit('Login', array('class' => 'btn btn-lg btn-primary btn-block')); ?>
    <?= $this->form->end(); ?>
  </div>
</div>

