<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "coupon_codes".
 *
 * @property int $id
 * @property string $code
 * @property int $is_active
 * @property int $qty
 */
class CouponCodes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coupon_codes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['is_active', 'qty'], 'integer'],
            [['code'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'is_active' => 'Is Active',
            'qty' => 'Qty',
        ];
    }
}
