<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div>
    <ol class="breadcrumb breadcrumb-arrow">
		<li><a href="/cake-app/home-page">Home</a></li>
        <li><?= $this->Html->link(__('Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
		<li class="active"><span>Edit post</span></li>
	</ol>
</div>

<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend><?= __('Edit Post') ?></legend>
        <?php
            echo $this->Form->control('title', ['placeholder' => 'title', 'class'=>'form-control']);
            echo $this->Form->control('body', ['placeholder' => 'description', 'class'=>'form-control']);
            echo $this->Form->control('user_id', ['class'=>'form-control', 'disabled'=>'disabled']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>

