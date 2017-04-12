<?php
/* @var $this yii\web\View */
$this->title = $article_model->title;
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
		    <li><a href="/articles">Статьи</a></li>
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
			<?$date = explode("-", $article_model->date)?>
			  <li>
			      <div class="post-content">
				  <div class="post-image">
				      <?if($article_model->img == 'none'):?>
					  <img src="/upload/noimage.png" alt="" />
				      <?else:?>
					  <img src="<?=$article_model->img?>" alt="" />
				      <?endif?>	  
				  </div>

				  <div class="date-box">
				      <div class="day"><?=$date[2]?></div>
				      <div class="month"><?=$month[$date[1]]?></div>
				  </div>

				  <div class="post-text">
				      <h3><a href="css/#"><?=$article_model->title?></a></h3>
				      <p class="text_descr"><?=$article_model->description?></p>
				  </div>
			      </div>
			  </li>   
		    <?endif?>   
		</ul>		
	    </div>

	</div>
    </div>
</div>