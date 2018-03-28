<?php

namespace app\controllers;
use Yii;
use app\models\User;
use yii\filters\AccessControl;
use app\commands\Rbac;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\ForbiddenHttpException;

use app\models\Item;
use app\models\ItemGallery;
use app\models\ItemGrade;
use app\models\ItemPrice;
use app\models\Category;

class CatalogController extends AppController{
    public $layout = 'main';

    public function actionIndex(){
        $item_model = Item::find()->all();
        $cat = new Category();
        $cat_model = $cat->getSidebar();
        $igallery_model = ItemGallery::find()->all();

        return $this->render('catalog', [
            'item_model' => $item_model,
            'cat_model' => $cat_model,
            'igallery_model' => $igallery_model,
            'allitem_model' => $item_model,
        ]);
    }
    
    public function actionCategory($category){
        $item_model = Item::find()
            ->select('item.id, item.name, item.cat_id, item.img')
            ->from('item, category')
            ->where('category.link = :link AND item.cat_id = category.id', ["link" => $category])
            ->all();

        $cat = new Category();
        $cat_model = $cat->getSidebar();
        $igallery_model = ItemGallery::find()->all();
        $allitem_model = Item::find()->all();
            
        return $this->render('catalog', [
            'item_model' => $item_model, 
            'cat_model' => $cat_model,
            'igallery_model' => $igallery_model,
            'allitem_model' => $allitem_model,
        ]);
    }

    public function actionItem($id){
        $item_model = Item::find()->where(['id'=> $id])->one();
        $igallery_model = ItemGallery::find()->where(['item_id'=> $id])->all();
        $price_model = ItemPrice::find()->where(['item_id'=> $id])->all();

        $grade_model = ItemGrade::find()
            ->select('item_grade.id, item_grade.title')
            ->from('item_grade, item_price')
            ->where('item_price.item_id = :item_id AND item_price.grade_id = item_grade.id', ["item_id" => $id])
            ->all();

        $cat = new Category();
        $cat_model = $cat->getSidebar();
	    $allitem_model = Item::find()->all();
        // Отправка формы из карточки товара
        $form_model = new ContactForm();
        if ($form_model->load(Yii::$app->request->post()) && $form_model->sendEmail(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }

        return $this->render('item', [
            'item_model' => $item_model,
            'igallery_model' => $igallery_model,
            'price_model' => $price_model,
            'grade_model' => $grade_model,
            'cat_model' => $cat_model,
            'allitem_model' => $allitem_model,
        ]);
    }
}
