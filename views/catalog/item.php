<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $item_model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<?if(isset($item_model)):?>
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
    <div id="content">
	<div class="container">
	    <div class="row detail_item">
		<div id="sidebar" class="col-md-3">
		    <div class="widget widget_category">
			<h4>Каталог</h4>
			<ul>
			    <?if(isset($cat_model)):?>
				<?foreach($cat_model as $cat):?>
				    <li class='parent_cat'>
					<a href="/catalog/<?=$cat->link?>"><?=$cat->name?></a>
					<ul>
					    <?foreach($all_item as $item):?>
						<?if($item->cat_id == $cat->id):?>
						    <li class='chld_cat'><a href="/catalog/<?=$cat->link?>/<?=$item->id?>"><?=$item->name?></a></li>
					        <?endif?>     
					    <?endforeach?>	
					</ul>
				    </li>
				<?endforeach?>	
			    <?endif?>
			</ul>
		    </div>
		</div>
		<div class="col-md-9">
		    <div class="row">
			<div class="products item">
			    <?if(isset($item_model)):?>				
				<div class="col-md-5 product">
				    <h4><?=$item_model->name?></h4>
				    <span class="tiny-border"></span>
				    <figure class="item_img">
					<?if($item_model->img != 'none'):?>
					    <img src="<?=$item_model->img?>" class="item_img" alt="">
					<?else:?>
					    <img src="/upload/noimage.png" class="item_img" alt="">
					<?endif?>
				    </figure>													    
				</div>
				<div class="col-md-7 tech_block">
				    <p class="tech_prop">Технические характеристики</p>
				    <?if(isset($item_model->manufacturer)):?>
					<span class="prop col-md-6">Производитель: </span><span class="col-md-6"><?=$item_model->manufacturer?></span>
				    <?endif?>
				    <?if(isset($item_model->wood)):?>
					<span class="prop col-md-6">Порода дерева: </span><span class="col-md-6"><?=$item_model->wood?></span>
				    <?endif?>
				    <?if(isset($item_model->wet)):?>
					<span class="prop col-md-6">Влажность : </span><span class="col-md-6"><?=$item_model->wet?></span>
				    <?endif?>
				    <?if(isset($item_model->size)):
					$sizes = explode(',', $item_model->size);?>
					<span class="prop col-md-6">Размеры: </span><span class="col-md-6">					
					    <?foreach($sizes as $size):?>
						<?=$size?><br>
					    <?endforeach?>    
					</span>    
				    <?endif?>
					fds
				    <?if(isset($item_model->grade)):?>
					<span class="prop col-md-6">Сортность: </span><span class="col-md-6"><?=$item_model->grade?></span>
				    <?endif?>
				    <?if(isset($item_model->price)):?>
					<span class="prop col-md-6">Стоимость: </span><span class="col-md-6"><?=$item_model->price?></span>
				    <?endif?>
				    <input type="submit" data-value='<?=$item_model->name?>' data-id='<?=$item->id?>' id="send_message" value="Отправить заявку" class="btn btn-line btn-add_to_cart">
				</div>
			    <?endif?>                               
			</div>


		    </div>
		</div>

		<div class="col-md-12">
		    <h2><?=$item_model->title?><span class="tiny-border"></span></h2>
		    <div class="text_descr"><?=$item_model->description?></div>
		</div>

	    </div>
	</div>



    </div>
<?endif?>
<?//="<pre>".print_r($item_model, 1);?>
<?//="<pre>".print_r($gallery_model, 1);?>
