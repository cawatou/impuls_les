<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\db\ActiveRecord;
use app\models\ContactForm;
use app\models\LoginForm;
use app\models\Test;
use app\models\Item;
use app\models\ItemGallery;
use app\models\Category;
use app\models\Page;
use app\models\MainSlider;
use app\models\Gallery;
use app\models\GalleryCat;
use app\models\Contacts;
use app\models\Articles;
use app\models\MailOrders;
use app\models\Callback;
use app\models\Feedback;
use yii\data\Pagination;

class SiteController extends AppController {

    public function behaviors(){
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex(){
        $cat_model = Category::find()->all();
        $item_model = Item::find()->all();
        $igallery_model = ItemGallery::find()->all();
        $main_page = Page::findOne(4);
        $slider_model = MainSlider::find()->all();

        return $this->render('index', [
            'item_model' => $item_model,
            'igallery_model' => $igallery_model,
            'cat_model' => $cat_model,
            'main_page' => $main_page,
            'slider_model' => $slider_model,
        ]);
    }

    public function actionAbout(){
        $model = Page::findOne(1);
        $cat_model = Category::find()->all();
        $allitem_model = Item::find()->all();
        return $this->render('about', [
            'model' => $model,
            'cat_model' => $cat_model, 
            'allitem_model' => $allitem_model 
        ]);
    }


    public function actionDiscount(){
        $model = Page::findOne(2);
        $cat_model = Category::find()->all();
        $allitem_model = Item::find()->all();
        return $this->render('discount', [
            'model' => $model,
            'cat_model' => $cat_model,
            'allitem_model' => $allitem_model
        ]);
    }

    public function actionDelivery(){
        $model = Page::findOne(3);
        $cat_model = Category::find()->all();
        $allitem_model = Item::find()->all();
        return $this->render('delivery', [
            'model' => $model,
            'cat_model' => $cat_model,
            'allitem_model' => $allitem_model
        ]);
    }


    public function actionGrade(){
        $model = Page::findOne(5);
        return $this->render('grade', [
            'model' => $model,
        ]);
    }


    public function actionGallery(){
        $gcat_model = GalleryCat::find()->all();
        $gallery_model = Gallery::find()->all();
        return $this->render('gallery', [
            'gcat_model' => $gcat_model,
            'gallery_model' => $gallery_model,
        ]);
    }

    public function actionArticles(){
        $query = Articles::find()->orderBy(['id' => SORT_DESC]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 2]);
        $article_model = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $cat_model = Category::find()->all();
        $allitem_model = Item::find()->all();
        return $this->render('articles', [
            'article_model' => $article_model,
            'pages' => $pages,
            'cat_model' => $cat_model,
            'allitem_model' => $allitem_model
        ]);
    }

    public function actionArticle($id){
        $article_model = Articles::findOne($id);
        $cat_model = Category::find()->all();
        $allitem_model = Item::find()->all();
        return $this->render('article_detail', [
            'article_model' => $article_model,
            'cat_model' => $cat_model,
            'allitem_model' => $allitem_model
        ]);
    }


    public function actionContacts(){
        $contact_model = Contacts::find()->one();
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->sendEmail(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        $cat_model = Category::find()->all();
        $allitem_model = Item::find()->all();
        return $this->render('contact', [
            'model' => $model,
            'contact_model' => $contact_model,
            'cat_model' => $cat_model,
            'allitem_model' => $allitem_model,
        ]);
    }

    public function actionCallbacksend(){
        if (isset($_REQUEST['phone']) && $_REQUEST['phone'] != '') {
            $message = 'Телефон: ' . $_REQUEST['phone'] . "\n";
            $message = $message . 'Имя: ' . $_REQUEST['name'];

            mail(Yii::$app->params['adminEmail'], "Обратный звонок", $message);
            $model = new Callback();
            $model->name = $_REQUEST['name'];
            $model->phone = $_REQUEST['phone'];
            $model->date = date('Y-m-d H:i:s');
            $model->save();

            return 'done';
        } else {
            return 'error';
        }

    }

    public function actionOrdermail(){
        if (Yii::$app->request->post()) {
            $message = "Имя: " . $_REQUEST['name'];
            $message = $message . "\nТелефон: " . $_REQUEST['phone'];
            $message = $message . "\nEmail: " . $_REQUEST['email'];
            $message = $message . "\nСообщение: " . $_REQUEST['comment'];
            $message = $message . "\nЗаявка на заказ: " . $_REQUEST['item_name'];

            // + extra_fields
            if ($_REQUEST['grade'] != '') $message = $message . "\nСортность: " . $_REQUEST['grade'];
            if ($_REQUEST['m2'] != '') $message = $message . "\nм2: " . $_REQUEST['m2'];
            if ($_REQUEST['m3'] != '') $message = $message . "\nм3: " . $_REQUEST['m3'];
            if ($_REQUEST['count'] != '') $message = $message . "\nшт: " . $_REQUEST['count'];
            if ($_REQUEST['lenght'] != '') $message = $message . "\nДлина: " . $_REQUEST['lenght'] . "мм";
            if ($_REQUEST['total_price'] != '') $message = $message . "\nЦена: " . $_REQUEST['total_price'];

            mail(Yii::$app->params['adminEmail'], "Заявка с сайта", $message);
            $model = new MailOrders();
            $model->name = $_REQUEST['name'];
            $model->item_id = $_REQUEST['item_id'];
            $model->phone = $_REQUEST['phone'];
            $model->email = $_REQUEST['email'];
            $model->comment = $_REQUEST['comment'];
            $model->date = date('Y-m-d H:i:s');
            $model->save();

            return 'done';
        } else {
            return 'error';
        }

    }

    public function actionFeedback(){
        if (Yii::$app->request->post()) {
            $message = "Имя: " . $_REQUEST['name'];
            $message = $message . "\n Телефон: " . $_REQUEST['phone'];
            $message = $message . "\n Email: " . $_REQUEST['email'];
            $message = $message . "\n Сообщение: " . $_REQUEST['comment'];

            mail(Yii::$app->params['adminEmail'], "Обратная связь", $message);
            $model = new Feedback();
            $model->name = $_REQUEST['name'];
            $model->phone = $_REQUEST['phone'];
            $model->email = $_REQUEST['email'];
            $model->comment = $_REQUEST['comment'];
            $model->date = date('Y-m-d H:i:s');
            $model->save();

            return 'done';
        } else {
            return 'error';
        }

    }
}