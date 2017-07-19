<?php
/**
 * Custom home page - successful user login will redirect to this page
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;
$cakeDescription = 'CakePHP 3.x';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css'); ?>
    <?= $this->Html->css('home-page-parallax.css') ?>

    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    <?= $this->Html->script('bootstrap.min.js'); ?>

    <nav class="navbar navbar-inverse bg-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">CakePHP 3.x</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><?= $this->Html->link('Users', ['controller' => 'users', 'action' => 'index'])?></li>
                    <li><?= $this->Html->link('Posts', ['controller' => 'posts', 'action' => 'index'])?></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">JSON<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="posts/getjsonxmlposts.json">Posts</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="users/getjsonxmlusers.json">Users</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">XML<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="posts/getjsonxmlposts.xml">Posts</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="users/getjsonxmlusers.xml">Users</a></li>
                      </ul>
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
</head>

<body onload="spark()">
<div >
    <div id="box1">
        <h1 class="parallax-content text-center" id="page-title" >CakePHP 3.x <small>Learning</small></h1>
    </div>
    <hr />

    <div class="col-6 text-center">
        <?= $this->Html->css('home-page-progress') ?>
        <div class="text-center">
            <div class="col-xs-2 col-sm-2 prog-col-centered">
                <div class="progress green">
                    <span class="progress-left">
                        <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                        <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value"> CakePHP </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 prog-col-centered">
                <div class="progress pink">
                    <span class="progress-left">
                        <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                        <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value"> MariaDB/MySQL </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 prog-col-centered">
                <div class="progress yellow">
                    <span class="progress-left">
                        <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                        <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value"> HTML & CSS</div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 prog-col-centered">
                <div class="progress olive">
                    <span class="progress-left">
                        <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                        <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value"> PHP </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 prog-col-centered">
                <div class="progress blue">
                    <span class="progress-left">
                        <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                        <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value"> Demo </div>
                </div>
            </div>
        </div>

        <h1> System Features </h1>
        <span>Registration</span><br>
        <span>Login and Logout</span><br>
        <span>Breadcrumbs on pages</span><br>
        <span>CRUD for Users and Posts</span><br>
        <span>JSON - for Posts and Users lists</span><br>
        <span>Google reCaptcha on registration form</span><br>
        <span>Parallax effect on Home page using CSS only</span><br>
    </div>
    <hr />

    <div id="box3">
        <h1 class="parallax-content text-center">An imaginative mind can create fantastic vision of beauty and attraction.</h1>
    </div>
    <hr />

    <div class="col-6 text-center">
        <h2> Web Technologies Used </h2>
        <span class="label label-info">CakePHP 3.x</span>
        <span class="label label-info">Google API</span>
        <span class="label label-info">Bootstrap</span>
        <span class="label label-info">jQuery</span>
        <span class="label label-info">MySQL</span>
        <span class="label label-info">JSON</span>
        <span class="label label-info">HTML</span>
        <span class="label label-info">CSS</span>
        <span class="label label-info">PHP</span>
        <?= $this->Html->css('home-page-slideshow.css') ?>
        <div class="container">
            <div id="carousel">
                <figure><img src="webroot/img/home-slideshow/api.jpg" alt=""></figure>
                <figure><img src="webroot/img/home-slideshow/bootstrap.JPG" alt=""></figure>
                <figure><img src="webroot/img/home-slideshow/cakephp3.jpg" alt=""></figure>
                <figure><img src="webroot/img/home-slideshow/css.JPG" alt=""></figure>
                <figure><img src="webroot/img/home-slideshow/jquery.jpg" alt=""></figure>
                <figure><img src="webroot/img/home-slideshow/json.JPG" alt=""></figure>
                <figure><img src="webroot/img/home-slideshow/mysql-maridb.jpg" alt=""></figure>
                <figure><img src="webroot/img/home-slideshow/php7.jpg" alt=""></figure>
            </div>
        </div>
    </div>
    <hr />

    <div>

</body>
<footer>
    <div id="box2">
        <div class="columns large-4 parallax-content-center text-center"    >
            <h1>Created By Ninad Sangale<h1>
        </div>
    </div>
</footer>
</html>
