<script src='https://www.google.com/recaptcha/api.js'></script>
<?= $this->Html->css('login.css');?>
<br>
<div class="form-signin">
  <div class="panel">
    <h2 class="text-center"> REGISTER </h2>
    <?= $this->form->create($user); ?>
      <?= $this->form->input('name', ['placeholder' => 'Username', 'class'=>'form-control']); ?>
      <?= $this->form->input('email', ['placeholder' => 'Email address', 'class'=>'form-control']); ?>
      <?= $this->form->input('password', ['placeholder' => 'Password', 'class'=>'form-control'], array('type' => 'password')); ?>
      <?= $this->Recaptcha->display() ?>
      <?= $this->form->submit('Register', array('class' => 'btn btn-lg btn-primary btn-block')); ?>
    <?= $this->form->end(); ?>
  </div>
</div>
