<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Портфолио';
$this->params['breadcrumbs'][] = $this->title;
?>
<?if(isset($item_model)):?>
    <div id="wrapper">
        <div class="content-holder elem scale-bg2 transition3" >
            <div class="content full-height mm">
                <div class="wrapper-inner full-height no-padding">
                    <div class="swiper-container" id="horizontal-slider" data-mwc="1" data-mwa="0">
                        <div class="swiper-wrapper">
			    <?if(isset($gallery_model)):
				foreach($gallery_model as $img):?>                            
				    <div class="swiper-slide">
					<br>
					<div class="bg" style="background-image:url('images/items/<?=$img->src?>')"></div>
					<div class="overlay"></div>
					<div class="zoomimage"><img src="images/items/<?=$img->src?>" class="intense" alt=""><i class="fa fa-expand"></i></div>
				    </div>
				<?endforeach;	
			    endif;?>
                        </div>
                        <div class="swiper-nav-holder hor">
                            <a class="swiper-nav arrow-left transition " href="portfolio-single3.html#"><i class="fa fa-long-arrow-left"></i></a>
                            <a class="swiper-nav  arrow-right transition" href="portfolio-single3.html#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="pagination"></div>
                </div>
            </div>
            <div class="fixed-column">
                <div class="container">
                    <section  class="no-border">
                        <div class="section-title">
                            <h3><?=$item_model->name?></h3>
                        </div>
                        <div class="project-details">
                            <h3>Описание проекта</h3>
                            <ul class="descr">
                                <?if(isset($item_model->price)):?><li><span>Цена :</span> <?=$item_model->price?> руб</li><?endif?>
                                <?if(isset($item_model->place)):?><li><span>Место строительства дома :</span> <?=$item_model->place?></li><?endif?>
                                <?if(isset($item_model->square)):?><li><span>Площадь :</span> <?=$item_model->square?> м<sup>2</sup> </li><?endif?>
                                <?if(isset($item_model->f_square)):?><li><span>Общая площадь :</span> <?=$item_model->f_square?> м<sup>2</sup> </li><?endif?>
                                <?if(isset($item_model->project)):?><li><span>Проект дома :</span> <?=$item_model->project?> </li><?endif?>
                                <?if(isset($item_model->complectation)):?><li><span>Комплектация :</span> <?=$item_model->complectation?> </li><?endif?>
                                <?if(isset($item_model->type)):?><li><span>Тип фундамента :</span> <?=$item_model->type?></li><?endif?>
                                <?if(isset($item_model->material)):?><li><span>Материал наружных стен :</span>  <?=$item_model->material?> </li><?endif?>
                                <?if(isset($item_model->floor)):?><li><span>Межэтажное перекрытие :</span> <?=$item_model->floor?> </li><?endif?>
                                <?if(isset($item_model->roof)):?><li><span>Кровля :</span> <?=$item_model->roof?> </li><?endif?>
                                <?if(isset($item_model->facing)):?><li><span>Наружная отделка :</span> <?=$item_model->facing?> </li><?endif?>
                                <?if(isset($item_model->consist)):?><li><span>Состав грунта и размер участка :</span> <?=$item_model->consist?> </li><?endif?>
                            </ul>
                        </div>
                        <div class="content-nav">
                            <div class="p-all">
                                <input id="mail_item" type="hidden" value="<?=$item_model->name."(id = ".$item_model->id.")"?>">
                                <a href="#" class="modalmain_btn"><span class="glyphicon glyphicon-plus-sign"></span></a>
                                <a href="/portfolio" class="ajax"><i class="fa fa-th-large"></i></a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
<?endif?>
<?//="<pre>".print_r($item_model, 1);?>
<?//="<pre>".print_r($gallery_model, 1);?>
