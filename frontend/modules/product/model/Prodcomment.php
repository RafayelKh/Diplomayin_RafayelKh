<?php

namespace frontend\modules\product\model;

use common\models\User;
use Yii;

/**
 * This is the model class for table "prodcomment".
 *
 * @property int $id
 * @property int $user_id
 * @property int $prod_id
 * @property string $content
 * @property string $date
 *
 * @property User $user
 */
class Prodcomment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodcomment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'prod_id', 'content'], 'required'],
            [['user_id', 'prod_id'], 'integer'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'prod_id' => 'Prod ID',
            'content' => 'Content',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
