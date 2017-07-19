<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Post $post
  */
?>

<div>
    <ol class="breadcrumb breadcrumb-arrow">
        <li><a href="/cake-app/home-page">Home</a></li>
        <li><?= $this->Html->link(__('Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li class="active"><span><?= h($post->title) ?></span></li>
    </ol>
</div>

<div class="jumbotron">
    <h1><?= h($post->title) ?></h1>
    <small>Post date: <?= h($post->created) ?></small>
    <p><?= $this->Text->autoParagraph(h($post->body)); ?></p>
    <h5 class="text-right">by, <?= $post->has('user') ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></h5>
    <small>Last Modified: <?= h($post->modified) ?></small>
    <p><?= $this->Html->link('Edit', ['controller' => 'Posts', 'action' => 'edit', $post->id], ['class' => "btn btn-primary btn-lg"])?></p>
</div>