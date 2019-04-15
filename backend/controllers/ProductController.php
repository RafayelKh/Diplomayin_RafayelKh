<?php

namespace backend\controllers;

use common\models\Image;
use frontend\modules\product\models\Brand;
use frontend\modules\product\models\Categories;
use Yii;
use common\models\Product;
use backend\models\ProductSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\behaviors\SluggableBehavior;

/**
 * ProductController implements the CRUD actions for Products model.
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
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                // 'slugAttribute' => 'slug',
            ]
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $categories = Categories::find()->asArray()->all();
        $brands = Brand::find()->asArray()->all();
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cat' => $categories,
            'brand' => $brands,
        ]);
    }

    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $categories = Categories::find()->asArray()->all();
        $brands = Brand::find()->asArray()->all();

        $categories_ids = ArrayHelper::map($categories, 'id', 'title');
        $brands_ids = ArrayHelper::map($brands, 'id', 'title');

        $imgFile = UploadedFile::getInstances($model, "image");

        $transaction = Yii::$app->db->beginTransaction();

        try {
            if ($model->load(Yii::$app->request->post())) {
                $model->image = "";

                if ($model->save()) {
                    if (!empty($imgFile)) {
                        $imgPath = Yii::getAlias('@frontend') . '/web/images/products/';

                        if (count($imgFile) > 1) {
                            foreach ($imgFile as $key => $img) {
                                if ($key == 0) {
                                    $result = $this->addImage($img, $imgPath, $model);
                                    if (!$result) {
                                        $transaction->rollBack();
                                    }
                                } else {
                                    $image_obj = new Image();
                                    $image_obj->prod_id = $model->id;
                                    $result = $this->addImage($img, $imgPath, $image_obj);
                                    if (!$result) {
                                        $transaction->rollBack();
                                    }
                                }
                            }
                        } else {
                            $result = $this->addImage($imgFile[0], $imgPath, $model);

                            if (!$result) {
                                $transaction->rollBack();
                            }
                        }
                    }

                    if ($transaction->isActive) {
                        $transaction->commit();
                    }

                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    $transaction->rollBack();
                    print_r($model->errors);
                }
            } else {
                $transaction->rollBack();
                echo "cant load";
            }
        } catch (\Exception $e) {
            $transaction->rollBack();
            echo $e->getMessage();
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories_ids,
            'brands' => $brands_ids
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = Categories::find()->asArray()->all();
        $brands = Brand::find()->asArray()->all();

        $categories_ids = ArrayHelper::map($categories, 'id', 'title');
        $brands_ids = ArrayHelper::map($brands, 'id', 'title');
        $prod_img = $model->image;

        $imgFile = UploadedFile::getInstances($model, "image");

        $transaction = Yii::$app->db->beginTransaction();

        try {
            if ($model->load(Yii::$app->request->post())) {
                $model->image = $prod_img;

                if ($model->save()) {

                    if (!empty($imgFile)) {
                        $imgPath = Yii::getAlias('@frontend') . '/web/images/products/';

                        if (count($imgFile) > 1) {
                            foreach ($imgFile as $key => $img) {
                                if ($key == 0) {
                                    $result = $this->addImage($img, $imgPath, $model);
                                    if (!$result) {
                                        $transaction->rollBack();
                                    }
                                } else {
                                    $image_obj = new Image();
                                    $image_obj->prod_id = $model->id;
                                    $result = $this->addImage($img, $imgPath, $image_obj);
                                    if (!$result) {
                                        $transaction->rollBack();
                                    }
                                }
                            }
                        } else {
                            $result = $this->addImage($imgFile[0], $imgPath, $model);

                            if ($result) {
                                if (!empty($prod_img)) {
                                    if (file_exists($imgPath . $prod_img)) {
                                        unlink($imgPath . $prod_img);
                                    }
                                }

                            } else {
                                $transaction->rollBack();
                            }
                        }

                    } else {
                        $model->image = $prod_img;
                        $model->save(false);
                    }

                    if ($transaction->isActive) {
                        $transaction->commit();
                    }

                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    $transaction->rollBack();

                }
            }
        } catch (\Exception $e) {
            $transaction->rollBack();
            print_r($e->getMessage());
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories_ids,
            'brands' => $brands_ids
        ]);
    }

    private function addImage($imgFile, $imgPath, $model)
    {
        $image_name = Yii::$app->security->generateRandomString() . '.' . $imgFile->extension;

        $path = $imgPath . $image_name;
        if ($imgFile->saveAs($path)) {
            $model->image = $image_name;
            $model->save(false);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
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
