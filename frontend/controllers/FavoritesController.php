<?php

namespace frontend\controllers;

use Yii;
use common\models\Favorites;
use frontend\models\FavoritesSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Product;
use common\models\Cart;

/**
 * FavoritesController implements the CRUD actions for Favorites model.
 */
class FavoritesController extends Controller
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
     * Lists all Favorites models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Product::find()->with('cat', 'brand');
        $cookies = Yii::$app->request->cookies;
        $searchModel = new FavoritesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($cookies->has('fav')) {
            $cookiearray = $cookies->getValue('prod_id');
            $cookie = unserialize($cookiearray);

            if ($cookie) {
                foreach ($cookie as $id) {
                    $query->orWhere(['id' => $id]);
                }
                $query->asArray()->all();
            }

        }
        $favorites = Favorites::find()->with(['prod' => function ($favorites) {
            $favorites->with(['cat', 'brand']);
        }])->where(['user_id' => Yii::$app->user->id])->asArray()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'prods' => $favorites,
        ]);
    }

    /**
     * Displays a single Favorites model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public
    function actionFilm($id)
    {
        $user_id = Yii::$app->user->id;

        $id = intval($id);

        $cart = new Cart();
        $cart->prod_id = $id;
        $cart->user_id = $user_id;
        $cart->qty = 1;
        if ($cart->save()) {
            $del = Favorites::find()->where(['user_id' => $user_id])->andWhere(['prod_id' => $id])->one()->delete();
        }
        return $this->redirect(Url::to('@web') . '/cart');
    }

    /**
     * Creates a new Favorites model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public
    function actionCreate($id)
    {
        if (Yii::$app->user->isGuest) {
            $cookies = Yii::$app->response->cookies;

            $cookie = $id;

            $cookies->add(new \yii\web\Cookie([
                'name' => 'prod_id',
                'value' => "$id",
            ]));
        }
        $model = new Favorites();
        $model->user_id = Yii::$app->user->id;
        $model->prod_id = intval($id);


        $searchModel = new FavoritesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model->save(false);
        $model = new Favorites();


        $prods = Favorites::find()->where(['user_id' => Yii::$app->user->id])->asArray()->all();


        return $this->render('index', ['prods' => $prods,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,]);
    }


    /**
     * Updates an existing Favorites model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Favorites model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionDelete($id)
    {
        $del_item = Favorites::find()->where(['prod_id' => $id])->andWhere(['user_id' => Yii::$app->user->id])->one();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Favorites model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Favorites the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = Favorites::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
