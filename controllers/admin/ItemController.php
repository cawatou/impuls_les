<?php

namespace app\controllers\admin;

use Yii;
use app\models\Item;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\controller\AppController;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\Category;
/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
{
    public $layout = 'admin';
    /**
     * @inheritdoc
     */
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
     * Lists all Item models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Item::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Item model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
	$cat_model = Category::find()->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'cat_model' => $cat_model,
        ]);
    }

    /**
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Item();
        $cat_model = Category::find()->all();
	$file_model = new UploadForm();
       
        if ($model->load(Yii::$app->request->post())) {
	    if($_FILES['UploadForm']['name']['imageFile'] != '') {
		$file_model->imageFile = UploadedFile::getInstance($file_model, 'imageFile');
		//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/file_model_1.txt', print_r($file_model, 1));
		if($file_model->upload_img()){
		    $file_name = "/upload/".$_FILES['UploadForm']['name']['imageFile'];
		    $model->img = $file_name;
		    $model->save();
		}
	    }else{
		$model->img = 'none';
		$model->save();
	    }
            return $this->redirect(['view', 'id' => $model->id]);       
        } else {
            return $this->render('create', [
                'model' => $model,
                'cat_model' => $cat_model,
                'file_model' => $file_model,
            ]);
        }
    }

    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $cat_model = Category::find()->all();
	$file_model = new UploadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
	    if($_FILES['UploadForm']['name']['imageFile'] != '') {
                $file_model->imageFile = UploadedFile::getInstance($file_model, 'imageFile');
                //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/file_model_1.txt', print_r($file_model, 1));
                if($file_model->upload_img()){
                    $file_name = "/upload/".$_FILES['UploadForm']['name']['imageFile'];
                    $model->img = $file_name;
                    $model->update();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'cat_model' => $cat_model,
                'file_model' => $file_model,
            ]);
        }
    }

    /**
     * Deletes an existing Item model.
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
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
