<?php

namespace app\controllers\admin;
use yii\data\ActiveDataProvider;
use app\models\MainSlider;
use Yii;
use app\models\UploadForm;
use yii\web\UploadedFile;

class SliderController extends \yii\web\Controller
{
    public $layout = 'admin';
    public function actionIndex()
    { 
	$dataProvider = new ActiveDataProvider([
            'query' => MainSlider::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
     public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $file_model = new UploadForm();
	
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
	   if($_FILES['UploadForm']['name']['imageFile'] != '') {
                $file_model->imageFile = UploadedFile::getInstance($file_model, 'imageFile');
                //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/file_model_1.txt', print_r($file_model, 1));
                if($file_model->upload_slider()){
                    $file_name = "/upload/slider/".$_FILES['UploadForm']['name']['imageFile'];
                    $model->img = $file_name;
                    $model->update();
                }
            }
            return $this->redirect(['update', 'id' => $model->id, 'file_model' => $file_model]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'file_model' => $file_model,
            ]);
        }
    }
    
    protected function findModel($id)
    {
        if (($model = MainSlider::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
