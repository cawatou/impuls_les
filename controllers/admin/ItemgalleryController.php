<?php

namespace app\controllers\admin;

use Yii;
use app\models\Item;
use app\models\ItemGallery;
use app\models\ItemgallerySearch;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemgalleryController implements the CRUD actions for ItemGallery model.
 */
class ItemgalleryController extends Controller
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
        ];
    }

    /**
     * Lists all ItemGallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemgallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItemGallery model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'item_model' => Item::find()->all(),
        ]);
    }

    /**
     * Creates a new ItemGallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
        $model = new ItemGallery();
        $file_model = new UploadForm();
        $item_model = Item::find()->all();

        if ($model->load(Yii::$app->request->post())){
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
                'item_model' => $item_model,
                'file_model' => $file_model,
            ]);
        }
    }

    /**
     * Updates an existing ItemGallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $file_model = new UploadForm();
        $item_model = Item::find()->all();

        if ($model->load(Yii::$app->request->post())){
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
            return $this->render('update', [
                'model' => $model,
                'item_model' => $item_model,
                'file_model' => $file_model,
            ]);
        }
    }

    /**
     * Deletes an existing ItemGallery model.
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
     * Finds the ItemGallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ItemGallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItemGallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
