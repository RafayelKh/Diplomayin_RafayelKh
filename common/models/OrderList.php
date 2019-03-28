<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_list".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $surname
 * @property string $address
 * @property string $post_index
 * @property string $country
 * @property string $phone
 * @property string $message
 */
class OrderList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'surname', 'address', 'post_index', 'country', 'phone', 'message'], 'required'],
            [['user_id', 'phone'], 'integer'],
            [['message'], 'string'],
            [['name', 'surname', 'address'], 'string', 'max' => 120],
            [['post_index'], 'string', 'max' => 50],
            [['country'], 'string', 'max' => 100],
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
            'name' => 'Name',
            'surname' => 'Surname',
            'address' => 'Address',
            'post_index' => 'Post Index',
            'country' => 'Country',
            'phone' => 'Phone',
            'message' => 'Message',
        ];
    }
}
