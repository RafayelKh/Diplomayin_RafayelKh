<?php

namespace frontend\modules\product\models;

use Yii;

/**
 * This is the model class for table "variants".
 *
 * @property int $id
 * @property int $prod_id
 * @property int $option_id
 * @property int $price
 * @property int $value_id
 *
 * @property Product $prod
 * @property Options $option
 * @property OptionValues $value
 */
class Variants extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'variants';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prod_id', 'option_id', 'price', 'value_id'], 'required'],
            [['prod_id', 'option_id', 'price', 'value_id'], 'integer'],
            [['prod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['prod_id' => 'id']],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => Options::className(), 'targetAttribute' => ['option_id' => 'id']],
            [['value_id'], 'exist', 'skipOnError' => true, 'targetClass' => OptionValues::className(), 'targetAttribute' => ['value_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prod_id' => 'Prod ID',
            'option_id' => 'Option ID',
            'price' => 'Price',
            'value_id' => 'Value ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Product::className(), ['id' => 'prod_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(Options::className(), ['id' => 'option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValue()
    {
        return $this->hasOne(OptionValues::className(), ['id' => 'value_id']);
    }
}
