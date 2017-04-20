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

									<?if(!isset($igallery_model[0])):?>
										<img src="/upload/noimage.png" class="item_img" alt="">
									<?endif?>
									<div class="gallery full-gallery de-gallery pf_full_width pf_4_cols zoom-gallery">
										<?if(isset($igallery_model)):?>
											<?foreach($igallery_model as $k => $image):
												if($k == 0):?>
													<a href="<?=$image->img?>">
														<span class="overlay"></span>
														<span class="center-xy">
																<i class="fa fa-search btn-action btn-action-hide"></i>
															</span>
														<img src="<?=$image->img?>" alt="" class="main_img"/>
													</a>
												<?else:?>
													<a class="preview_img" href="<?=$image->img?>">
														<span class="overlay"></span>
														<span class="center-xy">
															<i class="fa fa-search btn-action btn-action-hide"></i>
														</span>
														<img src="<?=$image->img?>" alt="" />
													</a>
												<?endif?>
											<?endforeach?>
										<?endif?>
									</div>
								</figure>
							</div>
							<div class="col-md-7 tech_block">
<!--							<p class="tech_prop">Технические характеристики</p>-->
								<?if(isset($item_model->manufacturer)):?>
									<span class="prop col-md-6">Производитель: </span><span class="col-md-6"><?=$item_model->manufacturer?></span>
								<?endif?>

								<?if(isset($item_model->wood)):?>
									<span class="prop col-md-6">Порода дерева: </span><span class="col-md-6"><?=$item_model->wood?></span>
								<?endif?>

								<?if(isset($item_model->thickness)):?>
									<span class="prop col-md-6">Толщина : </span><span class="col-md-6"><?=$item_model->thickness?></span>
								<?endif?>

								<?if(isset($item_model->width)):?>
									<span class="prop col-md-6">Ширина: </span><span class="col-md-6"><?=$item_model->width?></span>
								<?endif?>



								<div id="calculator" class="col-md-12">
									<div class="col-md-7">
										Сортность:&nbsp;
										<select class="grade">
											<?if(isset($grade_model)):?>
												<?foreach($grade_model as $grade):?>
													<option value="<?=$grade->id?>"><?=$grade->title?></option>
												<?endforeach?>
											<?endif?>
										</select>
									</div>
									<div class="col-md-5 price_block">
										<select id="price_list">
											<?if(isset($price_model)):?>
												<?foreach($price_model as $row):?>
													<option value="<?=$row->grade_id?>"><?=$row->price?></option>
												<?endforeach?>
											<?endif?>
										</select>
										</select>
										Цена за кв. метр: <span class="price"><?=$price_model[0]->price?></span> &#8381;
									</div>
									<div class="col-md-12 range_slider">
										<p>
											<label for="amount">Длинна:</label>
											<input type="text" id="amount" readonly> мм
										</p>
										<div id="slider-range-max"></div>
										<div class="col-md-6 left_range">1000 мм</div>
										<div class="col-md-6 right_range">4000 мм</div>
									</div>
									<div class="col-md-7 input_values">
										<p>
											Заполните одно из полей — остальные
											единицы будут рассчитаны автоматом:
										</p>
										<div class="col-md-4">
											м3<br>
											<input type="text" name="m3" class="measure m3" value="" pattern="[0-9]{3}">
										</div>
										<div class="col-md-4">
											м2<br>
											<input type="text" name="m2" class="measure m2" value="" pattern="[0-9]+$">
										</div>
										<div class="col-md-4">
											шт.<br>
											<input type="text" name="count" class="measure count" value="" pattern="[0-9]">
										</div>
										<input type="hidden" name="width" class="width" value="<?=$item_model->width / 1000?>">
										<input type="hidden" name="thikness" class="thikness" value="<?=$item_model->thickness / 1000?>">
									</div>
									<div class="col-md-5 out_value">
										<p>Итого стоимость:</p>
										<span class="total_price">0</span>
										<span> &#8381;</span>
									</div>
								</div>

								<input type="submit" data-value='<?=$item_model->name?>' data-id='<?=$item->id?>' id="send_message" value="Отправить заявку" class="btn btn-line btn-add_to_cart order_btn">
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
<?//="<pre>".print_r($grade_model, 1);?>
<?//="<pre>".print_r($gallery_model, 1);?>
