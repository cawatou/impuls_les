<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<? //if(isset($contact_model)) echo "<pre>".print_r($contact_model, 1)."</pre>";?>

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
                    <div class="col-md-8">
                        <div class="de_tab tab_style_2">
        
                            <div class="de_tab_content tc_style-1">
        
                                <div id="tab1">
        
                                    <div class="row">
                                        <? if (isset($contact_model)): ?>
                                            <div class="col-md-6">
                                                <div class="map-container">
                                                    <?= $contact_model->map ?>
                                                </div>
                                            </div>
        
                                            <div class="col-md-6">
        
                                                <address class="address-style-2">
                                                    <span><strong>Адрес:</strong><?= $contact_model->address ?></span>
                                                    <span>
                                                        <strong>Телефон:</strong>
                                                        <span class="ya-phone"><?= $contact_model->phone ?></span>
                                                    </span>
                                                    <span><strong>Email:</strong><a
                                                            href="mailto:<?= $contact_model->email ?>"><?= $contact_model->email ?></a></span>
                                                </address>
                                            </div>
                                        <? endif ?>
                                    </div>
        
                                </div>
        
                            </div>
        
                        </div>
                    </div>
        
                    <div class="col-md-4">
                        <div class="padding30" data-bgcolor="#f5f5f5">
                            <h3>Напишите нам
                                <span class="tiny-border"></span>
                            </h3>
                            <form id="feedback" action="/feedback" method="post" role="form">
                                <div class="form-group field-contactform-name required">
                                    <label class="control-label" for="contactform-name">Имя *</label>
                                    <input required type="text" id="contactform-name" class="form-control" name="name" autofocus="">
                                </div>
                                <div class="form-group field-contactform-name required">
                                    <label class="control-label" for="contactform-phone">Телефон *</label>
                                    <input required type="text" id="contactform-phone" class="form-control" name="phone" autofocus="">
                                </div>
                                <div class="form-group field-contactform-name required">
                                    <label class="control-label" for="contactform-phone">Email</label>
                                    <input type="text" id="contactform-email" class="form-control" name="email" autofocus="">
                                </div>
                                <div class="form-group field-contactform-name required">
                                    <label class="control-label" for="contactform-phone">Сообщение</label>
                                    <textarea id="contactform-body" class="form-control" name="comment" width="100%"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Отправить" class="btn btn-line">
                                </div>
                            </form>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








                                
