<?php
/* @var $this yii\web\View */
use yii\widgets\LinkPager;

$this->title = 'Cтатьи';
$month = Array("01" => "Янв", "02" => "Фев", "03" => "Мар", "04" => "Апр", "05" => "Май", "06" => "Июн", "07" => "Июл", "08" => "Авг", "09" => "Сен", "10" => "Окт", "11" => "Ноя", "12" => "Дек");
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
                    <ul class="blog-list text_descr">
                        <? if (isset($article_model)): ?>
                            <? foreach ($article_model as $article):
                                $date = explode("-", $article->date) ?>
                                <li>
                                    <div class="post-content">
                                        <div class="post-image">
                                            <? if ($article->img == 'none'):?>
                                                <img height="200" src="/upload/noimage.png">
                                            <? else:?>
                                                <img src="<?= $article->img ?>" alt=""/>
                                            <? endif ?>
                                        </div>

                                        <div class="post-text">
                                            <h3><a href="/article/<?= $article->id ?>"><?= $article->title ?></a></h3>
                                            <p><?= substr($article->description, 0, 500)?> ...</p>
                                        </div>

                                        <a href="/article/<?= $article->id ?>" class="btn-more">Читать далее</a>
                                    </div>
                                </li>
                            <? endforeach ?>
                        <? endif ?>
                    </ul>
    
                    <div class="text-center">
                        <? echo LinkPager::widget([
                            'pagination' => $pages,
                        ]); ?>
                    </div>
                </div>
    
            </div>
        </div>
    </section>
</div>