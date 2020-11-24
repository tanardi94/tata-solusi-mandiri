<?php

namespace backend\controllers;

use backend\models\Product;
use Yii;
use backend\models\ProductImages;
use backend\models\ProductImagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ImagesController implements the CRUD actions for ProductImages model.
 */
class ImagesController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all ProductImages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductImagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductImages model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProductImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductImages();
        
        $model->scenario = 'create';
        if ($model->load(Yii::$app->request->post())) {
            $product = Product::findOne(['id' => $model->product_id]);
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $fileName =  $product->name . '-' . rand(100,1000) . '-' . $product->unique_id;
            $seqs = ProductImages::find()->where(['status' => 1, 'product_id' => $model->id])->max('seq');
            $model->seq = ($seqs != null ? $seqs + 1 : 1);
            if(!empty($model->imageFile)) {
                $model->image = $fileName . '.' . $model->imageFile->extension;
                if($model->save(false)) {
                    $model->imageFile->saveAs(Yii::$app->params['storage'] . '/uploads/product/' . $fileName);
                }
            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDelimage($id)
    {
        $model = ProductImages::findOne($id);
        if ($model->deleteImage()) {
            Yii::$app->session->setFlash('success', 
        'Your image was removed successfully. Upload another by clicking Browse below');
        } else {
            Yii::$app->session->setFlash('error', 
        'Error removing image. Please try again later or contact the system admin.');
        }
        return $this->redirect(['update', 'id' => $model->id]);
    }

    /**
     * Updates an existing ProductImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post())) {
            $product = Product::findOne(['id' => $model->product_id]);
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $fileName =  $product->name . '-' . rand(100,1000) . '-' . $product->unique_id;
            $seqs = ProductImages::find()->where(['status' => 1, 'product_id' => $model->id])->max('seq');
            $model->seq = ($seqs != null ? $seqs + 1 : 1);
            if(!empty($model->imageFile)) {
                $model->image = $fileName . '.' . $model->imageFile->extension;
                if($model->save(false)) {
                    $model->imageFile->saveAs(Yii::$app->params['storage'] . '/uploads/product/' . $fileName);
                }
            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductImages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->status = 0;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductImages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
