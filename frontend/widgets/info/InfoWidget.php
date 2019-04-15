<?php

namespace frontend\widgets\info;

use yii\bootstrap\Widget;
use common\models\Info;

class InfoWidget extends Widget
{

    public function run(){
        $info = Info::find()->where(['type' => $this->type])->asArray()->one();
        if($this->content){
            $info['content'] = $this->content;
        }
        return $this->render('info',['data' => $info]);
    }
}