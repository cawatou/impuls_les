<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Галерея';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- subheader -->
<section id="subheader" data-stellar-background-ratio=".3">
    <div class="container">
	<div class="row">
	    <div class="col-md-12">
		<h1><?=$this->title?></h1>
		<div class="small-border-deco"><span></span></div>
		<ul class="crumb">
		    <li><a href="/">Главная</a></li>
		    <li class="sep"></li>
		    <li><?=$this->title?></li>
		</ul>
	    </div>
	</div>
    </div>
</section>
<!-- subheader close -->

<!-- content begin -->
<div id="content" class="no-top no-bottom">
    <!-- section begin -->
    <section id="section-portfolio" aria-label="section-portfolio" class="no-top no-bottom">
	<div class="container">

	    <div class="spacer-single"></div>

	    <!-- portfolio filter begin -->
	    <div class="row">
		<div class="col-md-12">
		    <ul id="filters">
			<?if(isset($gcat_model)):?>
			    <?foreach($gcat_model as $cat):?>
				<li><a href="#" data-filter=".cat<?=$cat->id?>"><?=$cat->title?></a></li>
			    <?endforeach?>	    
			<?endif?>
			<li class="pull-right"><a href="#" data-filter="*" class="selected">Показать Все</a></li>
		    </ul>

		</div>
	    </div>
	    <!-- portfolio filter close -->

	</div>

	<div id="gallery" class="gallery full-gallery de-gallery pf_full_width pf_4_cols zoom-gallery">
	    <?if(isset($gallery_model)):?>
		<?foreach($gallery_model as $image):?>
		    <div class="item cat<?=$image->cat_id?>">
			<div class="picframe">
			    <a href="<?=$image->src?>">
				<span class="overlay">
				    
				</span>
				<span class="center-xy">
				    <i class="fa fa-search btn-action btn-action-hide"></i>
				</span>
				<img src="<?=$image->src?>" alt="" />
			    </a>
			    
			</div>
		    </div>
		<?endforeach?>	    
	    <?endif?>  
	</div>

    </section>
    <!-- section close -->
		
</div>
