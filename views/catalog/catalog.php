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
<section id="subheader" data-stellar-background-ratio=".3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $this->title ?></h1>
                <div class="small-border-deco"><span></span></div>
                <ul class="crumb">
                    <li><a href="/">Главная</a></li>
                    <li class="sep"></li>
                    <li><?= $this->title ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- subheader close -->

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row catalog_item">
            <div id="sidebar" class="col-md-3">
                <div class="widget widget_category">
                    <h4>Каталог</h4>
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
