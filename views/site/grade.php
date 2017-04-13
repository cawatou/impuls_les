<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $model->title;
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
				</div>
			</div>

			<div class="grade">
				<div class="row row_top">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="comment_down comment_block col-md-4">
							Эталонный сорт, исключающий какие-либо пороки. Гладкий природный узор, без -либо сучков, трещин и смоляных кармашков
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>

				<div class="row row_mid">
					<div>
						<div class="comment_left comment_block col-md-5">
							<p>Недостаток изделий этой категории – высокая цена</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="circle">Экстра</div>
					</div>
					<div>
						<div class="comment_right comment_block col-md-5">
							<p>При распиле круглого леса высшего сорта процентное соотношение выхода доски соответствующей данному сорту не превышает 5-10%</p>
						</div>
					</div>
				</div>

				<div class="row row_btm">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="comment_top comment_block col-md-4">
							Пиломатериалы такого высокого сорта обычно используются при внутренней отделке дома и имеют влажность 12-14%.
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>

			<div class="grade">
				<div class="row row_top">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="comment_down comment_block col-md-4">
							Эталонный сорт, исключающий какие-либо пороки. Гладкий природный узор, без -либо сучков, трещин и смоляных кармашков
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>

				<div class="row row_mid">
					<div>
						<div class="comment_left comment_block col-md-5">
							<p>Недостаток изделий этой категории – высокая цена</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="circle">Прима</div>
					</div>
					<div>
						<div class="comment_right comment_block col-md-5">
							<p>При распиле круглого леса высшего сорта процентное соотношение выхода доски соответствующей данному сорту не превышает 5-10%</p>
						</div>
					</div>
				</div>

				<div class="row row_btm">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="comment_top comment_block col-md-4">
							Пиломатериалы такого высокого сорта обычно используются при внутренней отделке дома и имеют влажность 12-14%.
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>

			<div class="grade grade3">
				<div class="row row_top">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="comment_down comment_block col-md-4">
							Эталонный сорт, исключающий какие-либо пороки. Гладкий природный узор, без -либо сучков, трещин и смоляных кармашков
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>

				<div class="row row_mid">
					<div>
						<div class="comment_left comment_block col-md-5">
							<p>Недостаток изделий этой категории – высокая цена</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="circle">
							Экстра<br>
							+ Прима
						</div>
					</div>
					<div>
						<div class="comment_right comment_block col-md-5">
							<p>При распиле круглого леса высшего сорта процентное соотношение выхода доски соответствующей данному сорту не превышает 5-10%</p>
						</div>
					</div>
				</div>

				<div class="row row_btm">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="comment_top comment_block col-md-4">
							Пиломатериалы такого высокого сорта обычно используются при внутренней отделке дома и имеют влажность 12-14%.
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>

			<div class="grade">
				<div class="row row_top">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="comment_down comment_block col-md-4">
							Эталонный сорт, исключающий какие-либо пороки. Гладкий природный узор, без -либо сучков, трещин и смоляных кармашков
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>

				<div class="row row_mid">
					<div>
						<div class="comment_left comment_block col-md-5">
							<p>Недостаток изделий этой категории – высокая цена</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="circle">A</div>
					</div>
					<div>
						<div class="comment_right comment_block col-md-5">
							<p>При распиле круглого леса высшего сорта процентное соотношение выхода доски соответствующей данному сорту не превышает 5-10%</p>
						</div>
					</div>
				</div>

				<div class="row row_btm">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="comment_top comment_block col-md-4">
							Пиломатериалы такого высокого сорта обычно используются при внутренней отделке дома и имеют влажность 12-14%.
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>

			<div class="grade">
				<div class="row row_top">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="comment_down comment_block col-md-4">
							Эталонный сорт, исключающий какие-либо пороки. Гладкий природный узор, без -либо сучков, трещин и смоляных кармашков
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>

				<div class="row row_mid">
					<div>
						<div class="comment_left comment_block col-md-5">
							<p>Недостаток изделий этой категории – высокая цена</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="circle">AB</div>
					</div>
					<div>
						<div class="comment_right comment_block col-md-5">
							<p>При распиле круглого леса высшего сорта процентное соотношение выхода доски соответствующей данному сорту не превышает 5-10%</p>
						</div>
					</div>
				</div>

				<div class="row row_btm">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="comment_top comment_block col-md-4">
							Пиломатериалы такого высокого сорта обычно используются при внутренней отделке дома и имеют влажность 12-14%.
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>

			<div class="grade">
				<div class="row row_top">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="comment_down comment_block col-md-4">
							Эталонный сорт, исключающий какие-либо пороки. Гладкий природный узор, без -либо сучков, трещин и смоляных кармашков
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>

				<div class="row row_mid">
					<div>
						<div class="comment_left comment_block col-md-5">
							<p>Недостаток изделий этой категории – высокая цена</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="circle">BC</div>
					</div>
					<div>
						<div class="comment_right comment_block col-md-5">
							<p>При распиле круглого леса высшего сорта процентное соотношение выхода доски соответствующей данному сорту не превышает 5-10%</p>
						</div>
					</div>
				</div>

				<div class="row row_btm">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="comment_top comment_block col-md-4">
							Пиломатериалы такого высокого сорта обычно используются при внутренней отделке дома и имеют влажность 12-14%.
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>
		</div>
    </section>
</div>
<?endif?>