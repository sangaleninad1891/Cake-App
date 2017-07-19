<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div>
    <ol class="breadcrumb breadcrumb-arrow">
		<li><a href="/cake-app/home-page">Home</a></li>
        <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
		<li class="active"><span>Add new user</span></li>
	</ol>
</div>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('name', ['for'=>'example-text-input', 'class'=>'col-2 col-form-label form-control', 'placeholder' => 'name']);
            echo $this->Form->control('email', ['for'=>'example-text-input', 'class'=>'col-2 col-form-label form-control', 'placeholder' => 'email']);
            echo $this->Form->control('password', ['for'=>'example-text-input', 'class'=>'col-2 col-form-label form-control', 'placeholder' => 'password']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>

