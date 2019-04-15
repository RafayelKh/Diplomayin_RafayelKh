<?php

namespace backend\controllers;

use Yii;
use frontend\modules\blog\models\Articles;
use backend\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArticleController implements the CRUD actions for Articles model.
 */
class ArticleController extends Controller
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
     * Lists all Articles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Articles model.
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
     * Creates a new Articles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Articles();
        $prod_img = $model->image;

        $imgFile = UploadedFile::getInstance($model, "image");
        $transaction = Yii::$app->db->beginTransaction();

        try {
            if ($model->load(Yii::$app->request->post())) {
                $model->image = $prod_img;

                if ($model->save()) {
                    $imgPath = Yii::getAlias('@frontend') . '/web/images/articles/';

                    $result = $this->addImage($imgFile, $imgPath, $model);

                    if ($result) {
                        if (!empty($prod_img)) {
                            if (file_exists($imgPath . $prod_img)) {
                                unlink($imgPath . $prod_img);
                            }
                        }

                    } else {
                        $transaction->rollBack();
                    }

                    if ($transaction->isActive) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }

                } else {
                    $transaction->rollBack();
                    print_r($model->errors);
                }
            }
        } catch (\Exception $e) {
            $transaction->rollBack();
            print_r($e->getMessage());
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Articles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = new Articles();
        $prod_img = $model->image;

        $imgFile = UploadedFile::getInstance($model, "image");
        $transaction = Yii::$app->db->beginTransaction();

        try {
            if ($model->load(Yii::$app->request->post())) {
                $model->image = $prod_img;

                if ($model->save()) {
                    $imgPath = Yii::getAlias('@frontend') . '/web/images/articles/';

                    $result = $this->addImage($imgFile, $imgPath, $model);

                    if ($result) {
                        if (!empty($prod_img)) {
                            if (file_exists($imgPath . $prod_img)) {
                                unlink($imgPath . $prod_img);
                            }
                        }

                    } else {
                        $transaction->rollBack();
                    }

                    if ($transaction->isActive) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }

                } else {
                    $transaction->rollBack();
                    print_r($model->errors);
                }
            }
        } catch (\Exception $e) {
            $transaction->rollBack();
            print_r($e->getMessage());
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Articles model.
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
     * Finds the Articles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function addImage($imgFile, $imgPath, $model)
    {
        $image_name = Yii::$app->security->generateRandomString() . '.' . $imgFile->extension;

        $path = $imgPath . $image_name;
        echo $path;
        if ($imgFile->saveAs($path)) {
            $model->image = $image_name;
            $model->save(false);
            return true;
        } else {
            return false;
        }
    }
}
