<?php

namespace frontend\modules\blog\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $article_id
 * @property string $title
 * @property string $content
 * @property string $date
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'article_id', 'title', 'content'], 'required'],
            [['id', 'article_id'], 'integer'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'title' => 'Title',
            'content' => 'Content',
            'date' => 'Date',
        ];
    }
}
