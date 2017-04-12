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

class AdminController extends AppController{
    public $layout = 'admin';

    public function behaviors(){
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }
   
   public function actionLogout(){
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionIndex(){
        return $this->render('index');
    }

    
}
