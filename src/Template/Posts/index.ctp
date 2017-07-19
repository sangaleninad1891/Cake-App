<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
  */
?>

<?= $this->Html->css('post-listing');?>

<div class="container bootstrap snippet">
    <div>
        <ol class="breadcrumb breadcrumb-arrow">
            <li><a href="home-page">Home</a></li>
            <li class="active"><span>Posts</span></li>
        </ol>
    </div>
    <div class="col-md-12">
    <h3><?= __('Posts') ?> <?= $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'btn btn-default float-right']) ?></h3>
        <?php foreach ($posts as $post): ?>
        <article>
            <div class="line-item hf-item-odd clearfix">
                <div class="hf-info">
                    <h2 class="post-title">
                    <a class="article-link" href="posts/view/<?= h($post->id) ?>"><?= h($post->title) ?><span class="overlay article-overlay"></span></a>
                    </h2>
                    <div class="summary">
                        <?= h($post->body) ?>
                        <br>
                        by, <?= $post->has('user') ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?> posted on <?= h($post->created) ?>
                        <br>
                        Last Modified: <?= h($post->modified) ?> <?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id], ['class' => 'text-primary']) ?> <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['class' => 'text-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>

                    </div>
                </div>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
</div>
