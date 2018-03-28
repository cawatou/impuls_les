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
				<div class="row">
					<div class="col-md-12 bread_block">
						<a href="/">Главная</a>
						<h2><?=$this->title ?></h2>
					</div>


					<div class="col-md-12 grade_page">
				
						<!--======================================= Экстра =================================================-->
						<div class="grade grade1">
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
			
						<!--======================================= Прима =================================================-->
						<div class="grade gradeP">
							<div class="row row_top">
								<div class="col-md-12">
									<div class="col-md-4"></div>
									<div class="comment_down comment_block col-md-4">
										Премиальный сорт, отличающийся от Экстры наличием исключительно здоровых сросшихся сучков диаметром с 10 до 20 мм, в количестве не более одной штуки на погонный метр изделия
									</div>
									<div class="col-md-4"></div>
								</div>
							</div>
			
							<div class="row row_mid">
								<div>
									<div class="comment_left comment_block col-md-5">
										<p>
											Возможно также наличие небольших смоляных кармашков шириной до 3мм и длиной до 15 мм на погонный метр
										</p>
									</div>
								</div>
								<div class="col-md-2">
									<div class="circle">Прима</div>
								</div>
								<div>
									<div class="comment_right comment_block col-md-5">							
										<p>Выход таких пиломатериалов тоже очень невелик и колеблется в сопоставимых с Экстрой пределах</p>
									</div>
								</div>
							</div>
			
							<div class="row row_btm">
								<div class="col-md-12">
									<div class="col-md-4"></div>
									<div class="comment_top comment_block col-md-4">
										На наш взгляд, этот сорт не уступает по качеству Экстре, а может даже и выглядит интереснее, поскольку природный узор каждого сучка неповторим
									</div>
									<div class="col-md-4"></div>
								</div>
							</div>
						</div>
			
						<!--======================================= A+ =================================================-->
						<div class="grade grade3">
							<div class="row row_top">
								<div class="col-md-12">
									<div class="col-md-4"></div>
									<div class="comment_down comment_block col-md-4">
										Здоровые сросшиеся сучки,  допускаются  диаметром до 35 мм, не более 4 штук на погонный метр. Сучки частично сросшиеся допускаются  диаметром до 35 мм не более 2 шт. на погонный метр
									</div>
									<div class="col-md-4"></div>
								</div>
							</div>
			
							<div class="row row_mid">
								<div>
									<div class="comment_left comment_block col-md-5">
										<p>Смоляные кармашки допускаются размером 3х50 не более 2 штук на погонный метр. Также допускается незначительный непрострог в пределах 5% от площади.</p>
									</div>
								</div>
								<div class="col-md-2">
									<div class="circle">A+</div>
								</div>
								<div>
									<div class="comment_right comment_block col-md-5">
										<p>Темные несросшиеся сучки могут присутствовать диаметром не более 25 мм (не более 2 шт на погонный метр).</p>
									</div>
								</div>
							</div>
			
							<div class="row row_btm">
								<div class="col-md-12">
									<div class="col-md-4"></div>
									<div class="comment_top comment_block col-md-4">
										На одном из концов изделия допускаются небольшие торцевые трещины шириной до 1 мм, и длиной от края изделия до 100 мм.
									</div>
									<div class="col-md-4"></div>
								</div>
							</div>
						</div>
			
						<!--======================================= ВC =================================================-->
						<div class="grade grade4">
							<div class="row row_top">
								<div class="col-md-12">
									<div class="col-md-4"></div>
									<div class="comment_down comment_block col-md-4">
										Требования к размеру здоровых сросшихся сучков остаются такими же как и в сорте А, но допускается большее количество на один погонный метр – до 8 штук, и увеличивается их диаметр – до 40 мм
									</div>
									<div class="col-md-4"></div>
								</div>
							</div>
			
							<div class="row row_mid">
								<div>
									<div class="comment_left comment_block col-md-5">
										<p>Допускаются трещины на лицевой стороне шириной до 1 мм, общей длиной не более 1/4 длины изделия. Торцевые допускаются, шириной не более 1 мм, длиной не более 200 мм, и глубиной залегания не более 1/2 толщины изделия</p>
									</div>
								</div>
								<div class="col-md-2">
									<div class="circle">BC</div>
								</div>
								<div>
									<div class="comment_right comment_block col-md-5">
										<p>Увеличивается количество частично сросшихся сучков и несросшихся сучков до 2-х на погонный метр диаметром до 40 мм. Допускается прорость диаметром до 50мм</p>
									</div>
								</div>
							</div>
			
							<div class="row row_btm">
								<div class="col-md-12">
									<div class="col-md-4"></div>
									<div class="comment_top comment_block col-md-4">
										Смоляные кармашки уже допускаются на лицевой стороне шириной до 3-х мм и длиной до 150 мм, не более 4-х штук на изделие. На тыльной стороне не ограничивается
									</div>
									<div class="col-md-4"></div>
								</div>
							</div>
						</div>
			
						<!--======================================= АВ =================================================-->
						<div class="grade grade5">
							<div class="row row_mid">
								<div>
									<div class="comment_left comment_block col-md-5">
										<p>В виду того, что как правило, сорта А и В составляют львиную долю (40-60%) пиломатериала выходящего при роспуске круглого леса, принято также не разделять эти два сорта и предлагать в категории АВ. Покупатель имеет высококачественный в целом продукт по разумной цене. Раздельная продажа сортов А и В оставляет иногда спорным отнесение к той или иной сортности.</p>
									</div>
								</div>
								<div class="col-md-2">
									<div class="circle">АВ</div>
								</div>
								<div>
									<div class="comment_right comment_block col-md-5">
										<p>Например, идеальная террасная доска имеет три всего три здоровых сучка. Два маленьких, до 10 мм и один 40 мм в диаметре. С одной стороны, по формальному признаку ее можно было бы поместить в сорт В, но если посмотреть на нее с точки зрения общего количества сучков, то это очень красивый экземпляр, и нам кажется, что ему место в категории А  Для того, чтобы устранить эти субъективные противоречия, наша компания предпочитает объединять их в одну категорию -АВ.</p>
									</div>
								</div>				
							</div>
						</div>
			
						<!--======================================= С =================================================-->
						<div class="grade grade6">
							<div class="row row_mid">
								<div>
									<div class="comment_left comment_block col-md-5">
										<p>Изделия в данной категории допускают все пороки древесины перечисленные в сорте В, но уже не существует никаких ограничений по количеству сучков, трещины допускаются любые, не приводящие к разлому, допускаются незначительные механические повреждения, допускаются сердцевина и прорость. Непрострог допускается до 15% от площади лицевой поверхности. Количество данного сорта в общем количестве, даже высококачественного круглого леса, достигает 20-25%</p>
									</div>
								</div>
								<div class="col-md-2">
									<div class="circle">C</div>
								</div>
								<div>
									<div class="comment_right comment_block col-md-5">
										<p>Это, по прежнему, остается вполне качественное изделие из сибирской лиственницы, способное прослужить многие годы, имеющее ряд недостатков, которые касаются в основном внешнего вида, но не заложенных природой качеств. А если еще приложить руки и подойти к процессу творчески, то можно с помощью технических приемов, таких как браширование и искусственное старение, недостатки древесины превратить в достоинства!</p>
									</div>
								</div>
							</div>
						</div>
					</div>
		</section>
	</div>
<?endif?>