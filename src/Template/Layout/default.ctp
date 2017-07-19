<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <?= $this->Html->css('bootstrap.min.css'); ?>
    <?= $this->Html->css('bootstrap-theme.min.css'); ?>
    <?php
    if($this->request->params['controller'] === 'HomePage' && $this->request->params['action'] === 'index'){
      $this->Html->css('home-page-parallax');
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    <?= $this->Html->script('bootstrap.min.js'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-inverse bg-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <?= $this->Html->link('CakePHP 3.x', ['controller'=>'HomePage', 'action'=>'index'], ['class' => 'navbar-brand']) ?>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><?= $this->Html->link('Users', ['controller' => 'users', 'action' => 'index'])?></li>
                    <li><?= $this->Html->link('Posts', ['controller' => 'posts', 'action' => 'index'])?></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">JSON<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><?= $this->Html->link('Posts', ['controller' => 'posts', 'action' => 'getjsonxmlposts.json']) ?></li>
                        <li><?= $this->Html->link('Recent Modified', ['controller' => 'json', 'action' => 'postdisplay'])?></li>
                    </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">XML<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><?= $this->Html->link('Posts', ['controller' => 'posts', 'action' => 'getjsonxmlposts.xml']) ?></li>                      </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if($loggedIn) { ?>
                        <li><?= $this->Html->link('Hello ' . $userDetails['User']['name']. ' !', ['controller' => 'users', 'action' => 'view', $userDetails['User']['id']])?></li>
                        <li><?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout'])?></li>
                    <?php } else { ?>
                        <li><?= $this->Html->link('Login', ['controller' => 'users', 'action' => 'login'])?></li>
                        <li><?= $this->Html->link('Register', ['controller' => 'users', 'action' => 'register'])?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container clearfix">
    <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
