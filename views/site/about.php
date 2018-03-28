<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'О компании';
$this->params['breadcrumbs'][] = $this->title;
if (isset($model)):?>

    <section id="subheader" data-stellar-background-ratio=".3"
             style="background-size: cover; background-position: 50% 0%;">
        <div class="container" style="background-size: cover;">
            <div class="row" style="background-size: cover;">
              
            </div>
        </div>
    </section>

   
    <div id="content" class="no-bottom no-top">
        <section id="section-news" data-bgcolor="#f5f5f5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 bread_block">
                        <a href="/">Главная</a>
                        <h2><?=$this->title ?></h2>
                    </div>

                    <?=$this->render('sidebar', compact('cat_model', 'allitem_model'));?>

                    <div class="col-md-9">
                         <div class="text_descr">
                             <?= $model->description ?>
                         </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
<? endif ?>