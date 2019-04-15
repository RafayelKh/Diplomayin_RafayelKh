<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrderList;

/**
 * OrderSearch represents the model behind the search form of `common\models\OrderList`.
 */
class OrderSearch extends OrderList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'phone', 'status', 'price'], 'integer'],
            [['name', 'surname', 'address', 'post_index', 'country', 'message'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = OrderList::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'phone' => $this->phone,
            'status' => $this->status,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'post_index', $this->post_index])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
