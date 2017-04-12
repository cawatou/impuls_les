<?php
/* @var $this yii\web\View */
$this->title = 'Каталог';
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
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <ul class="products">
				<?if(isset($item_model)):?>
				    <?foreach($item_model as $item):?>
					<li class="col-md-4 product">
					    <figure class="pic-hover">
						<a href="#">
						    <span class="center-xy">
							<i class="fa fa-link btn-action btn-action-hide"></i>
						    </span>
						    <span class="bg-overlay"></span>
						    <img src="images/shop/12.jpg" class="img-responsive" alt="">
						</a>
					    </figure>
					    <h4><?=$item->name?></h4>					    
					    <div class="price"><?=$item->price?></div>
					    <a href="#" class="btn btn-add_to_cart">Отправить заявку</a>
					</li>
				    <?endforeach?>	  
				<?endif?>                               
                            </ul>


                        </div>
                    </div>

                    <div id="sidebar" class="col-md-3">
			<div class="widget widget_category">
                            <h4>Категории</h4>
                            <ul>
				<?if(isset($cat_model)):?>
				    <?foreach($cat_model as $cat):?>
					<li><a href="#"><?=$cat->name?></a></li>
				    <?endforeach?>	
                                <?endif?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>



        </div>
