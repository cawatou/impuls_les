<?php

namespace app\controllers\admin;

class FeedbackController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
