<?php
/* @var $this yii\web\View */
$this->title = $article_model->title;
$month = Array("01"=>"Янв", "02"=>"Фев", "03"=>"Мар", "04"=>"Апр", "05"=>"Май", "06"=>"Июн", "07"=>"Июл", "08"=>"Авг", "09"=>"Сен", "10"=>"Окт", "11"=>"Ноя", "12"=>"Дек");
?>


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

				<?=$this->render('sidebar', compact('cat_model', 'allitem_model'));?>

				<div class="col-md-9">
					<ul class="blog-list text_descr">
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
			
								  <div class="post-text">
									  <h3><?=$article_model->title?></h3>
									  <p class="text_descr"><?=$article_model->description?></p>
								  </div>
							  </div>
						  </li>   
						<?endif?>   
					</ul>		
	    		</div>

			</div>
    	</div>
	</section>
</div>