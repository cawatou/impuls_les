<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
if(isset($model)):?>

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
				<div class="col-md-12 bread_block">
					<a href="/">Главная</a>
					<h2><?=$this->title ?></h2>
				</div>

				<div id="sidebar" class="col-md-3">
					<div class="widget widget_category">
						<ul>
							<? if (isset($cat_model)): ?>
								<? foreach ($cat_model as $cat): ?>
									<li class='parent_cat'>
										<a href="/catalog/<?= $cat->link ?>"><?= $cat->name ?></a>
										<ul>
											<? foreach ($allitem_model as $item): ?>
												<? if ($item->cat_id == $cat->id): ?>
													<li class='chld_cat'><a
															href="/catalog/<?= $cat->link ?>/<?= $item->id ?>"><?= $item->name ?></a>
													</li>
												<? endif ?>
											<? endforeach ?>
										</ul>
									</li>
								<? endforeach ?>
							<? endif ?>
						</ul>
					</div>
				</div>

				<div class="col-md-9">
					<div class="text_descr">
						<?=$model->description?>						
					</div>
				</div>
			</div>
		</section>
	</div>
<?endif?>