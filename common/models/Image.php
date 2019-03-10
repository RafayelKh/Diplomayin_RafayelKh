<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $prod_id
 * @property string $image_src
 *
 * @property Product $prod
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prod_id', 'image_src'], 'required'],
            [['prod_id'], 'integer'],
            [['image_src'], 'string', 'max' => 255],
            [['prod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['prod_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prod_id' => 'Prod ID',
            'image_src' => 'Image Src',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Product::className(), ['id' => 'prod_id']);
    }
}
