<?php
/* @var $this yii\web\View */
use yii\widgets\LinkPager;

$this->title = 'Cтатьи';
$month = Array("01"=>"Янв", "02"=>"Фев", "03"=>"Мар", "04"=>"Апр", "05"=>"Май", "06"=>"Июн", "07"=>"Июл", "08"=>"Авг", "09"=>"Сен", "10"=>"Окт", "11"=>"Ноя", "12"=>"Дек");
?>


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

 <div id="content">
    <div class="container">
	<div class="row">
	    <div class="col-md-12">
		<ul class="blog-list">
		    <?if(isset($article_model)):?>
			<?foreach($article_model as $article):
			    $date = explode("-", $article->date)?>
			    <li>
				<div class="post-content">
				    <div class="post-image">
					 <?if($article->img == 'none'):?>
					    <img height="200" src="/upload/noimage.png">
					<?else:?>
					    <img src="<?=$article->img?>" alt="" />
					<?endif?>    
				    </div>

				    <div class="date-box">
					<div class="day"><?=$date[2]?></div>
					<div class="month"><?=$month[$date[1]]?></div>
				    </div>

				    <div class="post-text">
					<h3><a href="css/#"><?=$article->title?></a></h3>
					<p class="text_descr"><?=$article->description?></p>
				    </div>

				    <a href="/article/<?=$article->id?>" class="btn-more">Читать</a>
				</div>
			    </li>
			<?endforeach?>    
		    <?endif?>   
		</ul>
		
		<div class="text-center">
		    <?echo LinkPager::widget([
		    'pagination' => $pages,
		]);?>
		</div>
	    </div>

	</div>
    </div>
</div>