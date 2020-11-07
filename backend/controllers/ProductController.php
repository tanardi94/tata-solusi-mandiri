<?php

namespace backend\controllers;

use backend\models\Model;
use Yii;
use backend\models\Product;
use backend\models\ProductCategory;
use backend\models\ProductImages;
use backend\models\ProductSearch;
use yii\web\Response;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $category = ProductCategory::find()->select(['id', 'name'])->where(['status' => 1])->all();
        $arrays = ArrayHelper::toArray($category, [
            'backend\models\ProductCategory', 'id'
        ]);
        $categories = array_combine(ArrayHelper::getColumn($arrays, 'id'), ArrayHelper::getColumn($arrays, 'name'));

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => $categories
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product;
        $images = [new ProductImages];

        if ($model->load(Yii::$app->request->post())) {
            $model->unique_id = uniqid(date('siHyz'), true);
            $images = Model::createMultiple(ProductImages::class);
            
            $valid = $model->validate();
            Model::loadMultiple($images, Yii::$app->request->post());

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($images as $image) {
                            // proses upload image di sini
                            $image->imageFile = UploadedFile::getInstance($image, 'imageFile');
                            $image->product_id = $model->id;
                            $seqs = ProductImages::find()->where(['status' => 1, 'product_id' => $model->id])->max('seq');
                            $image->seq = ($seqs != null ? ($seqs + 1) : 1);
                            $fileName =  $model->name . '-' . rand(100,1000) . '-' . $model->unique_id;
                            if(!empty($model->imageFile)) {
                                $model->photo = $fileName . '.' . $model->imageFile->extension;
                                if($model->save(false)) {
                                    $model->imageFile->saveAs(Yii::$app->params['storage'] . '/uploads/product/' . $fileName . '.' . $model->imageFile->extension);
                                }
                            }
                            if (! ($flag = $image->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (\Exception $e) {
                    $transaction->rollBack();
                }
            }
        
        }

        return $this->render('create', [
            'images' => (empty($images)) ? [new ProductImages()] : $images,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $images = $model->productImages;

        if ($model->load(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($model, 'id', 'id');
            $images = Model::createMultiple(ProductImages::classname(), $images);
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($images, 'id', 'id')));

            $valid = $model->validate();
            Model::loadMultiple($images, Yii::$app->request->post());

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            ProductImages::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($images as $image) {
                            // proses upload image di sini
                            $image->imageFile = UploadedFile::getInstance($image, 'imageFile');
                            $image->product_id = $model->id;
                            $seqs = ProductImages::find()->where(['status' => 1, 'product_id' => $model->id])->max('seq');
                            $image->seq = ($seqs != null ? ($seqs + 1) : 1);
                            $fileName =  $model->name . '-' . rand(100,1000) . '-' . $model->unique_id;
                            if(!empty($model->imageFile)) {
                                $model->photo = $fileName . '.' . $model->imageFile->extension;
                                if($model->save(false)) {
                                    $model->imageFile->saveAs(Yii::$app->params['storage'] . '/uploads/product/' . $fileName . '.' . $model->imageFile->extension);
                                }
                            }
                            if (! ($flag = $image->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (\Exception $e) {
                    $transaction->rollBack();
                }
            }


            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'images' => (empty($images)) ? [new ProductImages()] : $images,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
