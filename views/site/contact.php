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


<div id="content" class="no-bottom no-top contact_page">
    <section id="section-news" data-bgcolor="#f5f5f5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 bread_block">
                    <a href="/">Главная</a>
                    <h2><?= $this->title ?></h2>
                </div>

                <?=$this->render('sidebar', compact('cat_model', 'allitem_model'));?>

                <div class="col-md-9">
                    <div class="col-md-6">
                        <div class="de_tab tab_style_2">
        
                            <div class="de_tab_content tc_style-1">
        
                                <div id="tab1">
                                    <div class="row">
                                        <? if (isset($contact_model)): ?>
                                            <div class="map-container">
                                                <?= $contact_model->map ?>
                                            </div>
                                        <? endif ?>
                                    </div>
                                </div>
                            </div>
                            <address class="address-style-2">
                                <p><?= $contact_model->address ?></p>
                                <p class="ya-phone"><?= $contact_model->phone ?></p>
                                <p><?= $contact_model->email ?></p>
                            </address>
                        </div>
                    </div>
        
                    <div class="col-md-6">
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








                                
