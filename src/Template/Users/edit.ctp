<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div>
    <ol class="breadcrumb breadcrumb-arrow">
		<li><a href="/cake-app/home-page">Home</a></li>
        <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?>
		<li class="active"><span>Edit user</span></li>
	</ol>
</div>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('name', ['class' => 'form-control']);
            echo $this->Form->control('email', ['class' => 'form-control'] );
            echo $this->Form->control('password', ['class' => 'form-control']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

