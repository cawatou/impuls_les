<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Articles;
use app\models\Contacts;
use app\models\ContactForm;

AppAsset::register($this);
?>

<?
$model = new ContactForm();
$contact_model = Contacts::find()->one();
$articles = Articles::find()->limit(5)->orderBy(['id' => SORT_DESC])->all();

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<?php $this->beginBody() ?>
<body id="homepage" class="de_light">

<div id="wrapper">

    <!-- header begin -->
    <header>
        <div class="info">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="col"><span class="id-color"><i
                                    class="fa fa-map-marker"></i></span><?= $contact_model->address ?> </div>
                        <div class="col"><span class="id-color"><i
                                    class="fa fa-envelope"></i></span><?= $contact_model->email ?></div>


                    </div>
                    <div class="col-md-4 text-right">

                        <div class="col phone">
                            <span class="id-color"><i class="fa fa-phone"></i></span>
                            <span class="ya-phone"><?= $contact_model->phone ?></span>
                        </div>

                        <div class="callback_btn"><span class="id-color"
                            <p class="callback_btn">Обратный звонок</p></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- logo begin -->
                    <div id="logo">
                        <a href="/">
                            <img class="logo" src="/images/logo.png" alt="">
                        </a>
                    </div>
                    <!-- logo close -->

                    <!-- small button begin -->
                    <span id="menu-btn"></span>
                    <!-- small button close -->

                    <!-- mainmenu begin -->
                    <nav>
                        <ul id="mainmenu">
                            <li><a href="/about">О компании</a></li>
                            <li><a href="/catalog/">Наша продукция</a></li>
                            <li><a href="/discount">Акции и скидки</a></li>
                            <li><a href="/articles">Статьи</a></li>
                            <li><a href="/grade">Виды сортности</a></li>
                            <li><a href="/delivery">Доставка и оплата</a></li>
                            <li><a href="/contacts">Контакты</a></li>
                        </ul>
                    </nav>
                    <!-- mainmenu close -->

                </div>
            </div>
    </header>


    <!-- Modal -->
    <div class="modal callback_modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Обратный звонок</h4>
                </div>
                <div class="modal-body">

                    <form id="callbacksend" action="/callbacksend" method="post" role="form">
                        <div class="form-group field-contactform-name required">
                            <label class="control-label" for="contactform-name">Имя *</label>
                            <input required type="text" id="contactform-name" class="form-control" name="name"
                                   autofocus="">
                        </div>
                        <div class="form-group field-contactform-name required">
                            <label class="control-label" for="contactform-phone">Телефон *</label>
                            <input required type="text" id="contactform-phone" class="form-control" name="phone"
                                   autofocus="">
                        </div>
                        <input type="hidden" name="_csrf"
                               value="Q3Y4Zm12RmsnWwAcPTMALBEHUBUdPBw4LUFLIjg6JA8iJUwwB0QuEQ==">
                        <div class="modal-footer">
                            <input type="submit" value="Отправить заявку" class="btn btn-line">
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal main_modal" id="main_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Напишите нам</h4>
                </div>
                <div class="modal-body">
                    <form id="order_mail" action="/ordermail" method="post" role="form">
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
                        <input type="hidden" name="item_name" class="item_name" value="">
                        <input type="hidden" name="item_id" class="item_id" value="">
                        <div class="modal-footer">
                            <input type="submit" value="Отправить заявку" class="btn btn-line">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?= $content ?>

    <!-- footer begin -->
    <footer>       
        <div class="subfooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 line_top"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        &copy; Copyright 2016 - Импульс Леса
                    </div>
                    <div class="col-md-6 text-right">

                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- footer close -->

    <a href="#" id="back-to-top"></a>
    <div id="preloader">
        <div class="preloader1"></div>
    </div>
</div>
<?php $this->endBody() ?>
<script>
    jQuery(document).ready(function () {
        jQuery("#revolution-slider").revolution({
            sliderType: "standard",
            sliderLayout: "fullscreen",
            delay: 3500,
            navigation: {
                arrows: {enable: true}
            },
            parallax: {
                type: "mouse",
                origo: "slidercenter",
                speed: 2000,
                levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
            },
            spinner: "off",
            gridwidth: 1140,
            gridheight: 600,
            disableProgressBar: "on"
        });
    });
</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter44551617 = new Ya.Metrika({
                    id: 44551617,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: true
                });
            } catch (e) {
            }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () {
                n.parentNode.insertBefore(s, n);
            };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/44551617" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->
<div id="overlay"></div>
</body>
</html>
<?php $this->endPage() ?>
