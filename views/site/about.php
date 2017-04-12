<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'О компании';
$this->params['breadcrumbs'][] = $this->title;
if(isset($model)):?>

<section id="subheader" data-stellar-background-ratio=".3" style="background-size: cover; background-position: 50% 0%;">
    <div class="container" style="background-size: cover;">
	<div class="row" style="background-size: cover;">
	    <div class="col-md-12" style="background-size: cover;">
		<h1><?=$this->title?></h1>
		<div class="small-border-deco" style="background-size: cover;"><span></span></div>
		<ul class="crumb">		
		    <li><a href="/">Главная</a></li>
		    <li class="sep"></li>
		    <li><?=$this->title?></li>
		</ul>
	    </div>
	</div>
    </div>
</section>
<div id="content" class="no-bottom no-top">
    <section id="section-news" data-bgcolor="#f5f5f5">
	<div class="container">
	    <div class="row">

		<div class="col-md-12">
		    <h2><?=$model->title?><span class="tiny-border"></span></h2>
		    <div class="text_descr"><?=$model->description?></div>
		</div>
	    </div>
	</div>
    </section>
</div>
<?endif?>