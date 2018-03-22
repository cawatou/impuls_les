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
        <div class="row">
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
                            <label class="control-label" for="contactform-name">Имя</label>
                            <input type="text" id="contactform-name" class="form-control" name="name" autofocus="">
                        </div>
                        <div class="form-group field-contactform-name required">
                            <label class="control-label" for="contactform-phone">Телефон</label>
                            <input type="text" id="contactform-phone" class="form-control" name="phone" autofocus="">
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








                                
