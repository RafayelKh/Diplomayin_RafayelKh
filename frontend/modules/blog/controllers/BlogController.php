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

    public function actionIndex(){
        $articles = Articles::find();
        $pagination = new Pagination(['totalCount' => $articles->count(),'pageSize' => 6]);

        $articles = $articles->offset($pagination->offset)->limit($pagination->limit);
        $articles = $articles->asArray()->all();

        return $this->render('index',['info' => $articles]);
    }

    public function actionArticle($id,$slug=""){
        $article = Articles::find()->with(['comments' => function($article){
            $article->with([' user']);
        } ])->where(['id' => $id])->orderBy(['created_at' => SORT_DESC])->asArray()->one();

        $model = new Comments();
        $model->user_id = \Yii::$app->user->id;
        $model->article_id = $id;
        if($model->load(\Yii::$app->request->post()) && $model->save()){
            return $this->refresh();
        }

        echo '<pre>';
        var_dump($article);
        die;
        //$comments = Comments::find()->where(['artcile_id' => $id])->asArray()->all();
        return $this->render('article',['messages' => $article,'model' => $model]);
    }



}
