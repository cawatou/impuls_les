<?php

namespace app\controllers\admin;

use Yii;
use app\models\Gallery;
use app\models\GalleryCat;
use app\models\GallerySearch;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
{
    public $layout = 'admin';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gallery model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gallery();
        $model_cat = GalleryCat::find()->all();
        $file_model = new UploadForm();
       
        if ($model->load(Yii::$app->request->post())) {
	    if($_FILES['UploadForm']['name']['imageFile'] != '') {
		$file_model->imageFile = UploadedFile::getInstance($file_model, 'imageFile');
		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/file_model_1.txt', print_r($file_model, 1));
		if($file_model->upload_gallary()){
		    $file_name = "/upload/gallery/".$_FILES['UploadForm']['name']['imageFile'];
		    $model->src = $file_name;
		    $model->save();
		}
	    }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_cat' => $model_cat,
                'file_model' => $file_model,
            ]);
        }
    }

    /**
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
	$model_cat = GalleryCat::find()->all();
	$file_model = new UploadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
	    if($_FILES['UploadForm']['name']['imageFile'] != '') {
                $file_model->imageFile = UploadedFile::getInstance($file_model, 'imageFile');
                //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/file_model_1.txt', print_r($file_model, 1));
                if($file_model->upload_gallary()){
                    $file_name = "/upload/gallery/".$_FILES['UploadForm']['name']['imageFile'];
                    $model->img = $file_name;
                    $model->update();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'model_cat' => $model_cat,
                'file_model' => $file_model,
            ]);
        }
    }

    /**
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
