<?php
/* @var $this yii\web\View */
$this->title = 'Каталог товара';
?>
<? if (isset($cat_model)) {
    foreach ($cat_model as $cat) {
        $cat_link[$cat->id] = $cat->link;
    }
}

if (isset($igallery_model)) {
    foreach ($igallery_model as $items) {
        $gallery[$items->item_id][] = $items->img;
    }
}
?>
<!-- subheader -->
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
                    <h2><?= $this->title ?></h2>
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
                <div class="row">
                    <ul class="products">
                        <? if (isset($item_model)): ?>
                            <? foreach ($item_model as $item): ?>
                                <li class="col-md-4 product">
                                    <figure class="pic-hover catalog_img">
                                        <a href="<?= $cat_link[$item->cat_id] ?>/<?= $item->id ?>">
                                            <? if (isset($gallery[$item->id][0])): ?>
                                                <img src="<?= $gallery[$item->id][0] ?>" class="img-responsive"
                                                     alt="">
                                            <? else: ?>
                                                <img src="/upload/noimage.png" class="img-responsive" alt="">
                                            <? endif ?>
                                        </a>
                                    </figure>
                                    <h4><?= $item->name ?></h4>
                                    <div class="price"><? //=$item->price?></div>
                                </li>
                            <? endforeach ?>
                        <? endif ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
