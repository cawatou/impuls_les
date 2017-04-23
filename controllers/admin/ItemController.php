<?php

namespace app\controllers\admin;

use Yii;
use app\models\Item;
use app\models\ItemGallery;
use app\models\ItemGrade;
use app\models\ItemPrice;
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
    public function actionCreate(){
        $model = new Item();
        $cat_model = Category::find()->all();
        $grade_model = ItemGrade::find()->all();
	    $file_model = new UploadForm();

        if ($model->load(Yii::$app->request->post())) {
            /*if($_FILES['UploadForm']['name']['imageFile'] != '') {
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
            }*/
            $model->img = 'none';
            $model->save();
            // Сохранение Прайс листа
            foreach($_REQUEST['price'] as $grade_id => $price){
                $price_model = new ItemPrice();
                $price_model->grade_id = $grade_id;
                $price_model->item_id = $model->id;
                $price_model->price = $price;
                $price_model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);       
        } else {
            return $this->render('create', [
                'model' => $model,
                'cat_model' => $cat_model,
                'file_model' => $file_model,
                'grade_model' => $grade_model,
            ]);
        }
    }

    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id){
        $model = $this->findModel($id);
        $cat_model = Category::find()->all();
	    $file_model = new UploadForm();
        $price_model = ItemPrice::find()->where(['item_id'=> $id])->all();
        $grade_model = ItemGrade::find()->all();
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/tt.txt', print_r($price_model, 1));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           /* if($_FILES['UploadForm']['name']['imageFile'] != '') {
                $file_model->imageFile = UploadedFile::getInstance($file_model, 'imageFile');
                //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/file_model_1.txt', print_r($file_model, 1));
                if($file_model->upload_img()){
                    $file_name = "/upload/".$_FILES['UploadForm']['name']['imageFile'];
                    $model->img = $file_name;
                    $model->update();
                }
            }*/
            
            $model->update();
            // Сохранение Прайс листа
            foreach($_REQUEST['price'] as $grade_id => $price){
                $item_price = ItemPrice::find()->where(['item_id'=> $id, 'grade_id' => $grade_id])->one();
                $item_price->price = $price;
                $item_price->update();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'cat_model' => $cat_model,
                'file_model' => $file_model,
                'price_model' => $price_model,
                'grade_model' => $grade_model,
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
        $price_model = ItemPrice::find()->where(['item_id'=> $id])->all();
        foreach ($price_model as $k => $price){
            $price_model[$k]->delete();
        }

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
