<?php
/* @var $this yii\web\View */
$this->title = 'Главная';
?>
<?if(isset($cat_model)){
    foreach($cat_model as $cat){
	$cat_link[$cat->id] = $cat->link;
    }
}
if(isset($igallery_model)){
	foreach($igallery_model as $items){
		$gallery[$items->item_id][] = $items->img;
	}
}
?>

 <div id="content" class="no-bottom no-top">

            <!-- revolution slider begin -->
            <section id="section-slider" class="fullwidthbanner-container" aria-label="section-slider">
                <div id="revolution-slider">
                    <ul>
					<?if(isset($slider_model)):?>
						<?foreach($slider_model as $slide):?>
						<li data-transition="fade" data-slotamount="10" data-masterspeed="default" data-thumb="">
							<!--  BACKGROUND IMAGE -->
							<img src="<?=$slide->img?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" />

							<div class="tp-caption very-big-white"
							data-x="0"
							data-y="270"
							data-width="none"
							data-height="none"
							data-whitespace="nowrap"
							data-transform_in="x:50px;opacity:0;s:1000;e:Power3.easeOut;"
							data-transform_out="opacity:0;x:-10;px;s:800;e:Power3.easeInOut;"
							data-start="700"
							data-splitin="none"
							data-splitout="none"
							data-responsive_offset="on">
							<?=$slide->title?><span class="id-color">.</span>
							</div>

							<div class="tp-caption"
							data-x="0"
							data-y="330"
							data-width="none"
							data-height="none"
							data-whitespace="nowrap"
							data-transform_in="y:100px;opacity:0;s:500;e:Power3.easeOut;"
							data-transform_out="opacity:0;x:-10;s:800;e:Power3.easeInOut;"
							data-start="1100">

							</div>

							<div class="tp-caption"
							data-x="0"
							data-y="420"
							data-width="none"
							data-height="none"
							data-whitespace="nowrap"
							data-transform_in="y:100px;opacity:0;s:500;e:Power3.easeOut;"
							data-transform_out="opacity:0;x:-10;s:800;e:Power3.easeInOut;"
							data-start="1200">
							<a href="<?=$slide->link?>" class="btn-slider">Перейти в каталог
							</a>
							</div>
						</li>
						<?endforeach?>
					<?endif?>
                    </ul>
                </div>
            </section>
            <!-- revolution slider close -->     


            <!-- section begin -->
            <section id="section-team">
                <div class="container">
                    <div class="row wow fadeInUp">

                        <div class="col-md-12">
                            <h2>Каталог<span class="tiny-border"></span></h2>
                        </div>
						<?if(isset($item_model)):?>
							<?foreach($item_model as $item):?>
								<div class="col-md-3 item_block" style="background-size: cover;">
									<a href="/catalog/<?=$cat_link[$item->cat_id]?>/<?=$item->id?>">
										<div class="profile_pic">
											<figure class="pic-hover hover-scale mb30 main_item_img">
												<?if(isset($gallery[$item->id][0])):?>
													<img src="<?=$gallery[$item->id][0]?>" class="img-responsive" alt="">
												<?else:?>
													<img src="/upload/noimage.png" class="img-responsive" alt="">
												<?endif?>
											</figure>

											<h3><?=$item->name?></h3>
										</div>
									</a>
								</div>
							<?endforeach?>
						<?endif?>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-news" data-bgcolor="#f5f5f5">
                <div class="container">
                    <div class="row">
			<?if(isset($main_page)):?>
			    <div class="col-md-12">
				<h2><?=$main_page->title?><span class="tiny-border"></span></h2>
				<div class="text_descr"><?=$main_page->description?></div>
			    </div>
			<?endif?>
                    </div>
                </div>
            </section>
            <!-- section close -->



        </div>