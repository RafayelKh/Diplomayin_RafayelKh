<?php
/**
 * Created by PhpStorm.
 * User: ghost
 * Date: 03/03/19
 * Time: 16:01
 */

namespace frontend\modules\blog\controllers;

use common\models\Products;
use frontend\modules\blog\models\Articles;
use frontend\modules\blog\models\Comments;
use yii\web\Controller;

class BlogController extends Controller
{

    public function actionIndex(){
        $articles = Articles::find()->asArray()->all();
        return $this->render('index',['articles' => $articles]);
    }

    public function actionArticle($id,$slug=""){
        $article = Articles::find()->with(['comments' => function($article){
            $article->with(['user']);
        } ])->where(['id' => $id])->orderBy(['created_at' => SORT_DESC])->asArray()->one();

        $model = new Comments();
        $model->user_id = \Yii::$app->user->id;
        $model->article_id = $id;
        if($model->load(\Yii::$app->request->post()) && $model->save()){
            return $this->refresh();
        }

//        $comment = Comments::findOne(3);
//        $comment->delete();
//        $comment->user_id = 1;
//        $comment->article_id = 2;
//        $comment->message = "hwgjhqwgehjgqwhjegjqwhegqwejqhwgehjqwejh";
//        if($comment->isNewRecord){
//            $comment->insert();
//        }else{
//            $comment->update();
//        }
//        $comment->save();


        //$comments = Comments::find()->where(['artcile_id' => $id])->asArray()->all();
        return $this->render('article',['article' => $article,'model' => $model]);
    }



}
