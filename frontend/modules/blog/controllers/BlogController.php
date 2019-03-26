<?php
/**
 * Created by PhpStorm.
 * User: ghost
 * Date: 03/03/19
 * Time: 16:01
 */

namespace frontend\modules\blog\controllers;

use common\models\Product;
use frontend\modules\blog\models\Articles;
use frontend\modules\blog\models\Comments;
use yii\data\Pagination;
use yii\web\Controller;

class BlogController extends Controller
{

    public function actionIndex()
    {
        $articles = Articles::find();
        $pagination = new Pagination(['totalCount' => $articles->count(), 'pageSize' => 1]);

        $articles = $articles->offset($pagination->offset)->limit($pagination->limit);
        $articles = $articles->asArray()->all();

        return $this->render('index', ['info' => $articles, 'pagination' => $pagination]);
    }

    public function actionArticle($id = '')
    {
        $article = Articles::find()->with(['comments' => function ($article) {
            $article->with(['user']);
        }])->where(['id' => $id])->orderBy(['created_at' => SORT_DESC])->asArray()->one();

        $model = new Comments();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                return $this->refresh();
            }
        }

        return $this->render('article', ['messages' => $article, 'model' => $model]);
    }


}
