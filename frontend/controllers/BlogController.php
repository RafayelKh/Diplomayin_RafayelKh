<?php
/**
 * Created by PhpStorm.
 * User: tea
 * Date: 2/27/19
 * Time: 7:50 PM
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Articles;
use common\models\Comments;
use common\models\Users;

class BlogController extends Controller
{

    public function actionIndex()
    {
        $info = Articles::find()->asArray()->all();


        return $this->render('index',['info' => $info]);
    }

    public function actionArticle($id)
    {
        $info = Articles::find()->where(['id' => $id])->asArray()->one();
        $messages = Comments::find()->where(['article_id' => $id])->asArray()->all();
        $post = Yii::$app->request->post('first_name');
        $model = new Comments();

        return $this->render('article', ['info' => $info,'messages' => $messages,'post' => $post, 'model' => $model]);
    }

    public function actionAdd($id)
    {

    $add = new Comments();

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $get_post = Yii::$app->request;
            $add->article_id = $id;
            $add->title = $get_post->post('title');
            $add->content = $get_post->post('content');
            $add->save();
        };

        return $this->refresh();
    }
}
