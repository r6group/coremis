<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;

?>


<div class="container">

    <section class="page-not-found">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <div class="page-not-found-main">
                    <h2>Error <i class="fa fa-file"></i></h2>
                    <h3><?= Html::encode($this->title) ?></h3>
                    <p><?= nl2br(Html::encode($message)) ?></p>

                </div>
            </div>
            <div class="col-md-4">
                <h4 class="heading-primary">Here are some useful links</h4>
                <ul class="nav nav-list">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">FAQ's</a></li>
                    <li><a href="#">Sitemap</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </section>

</div>