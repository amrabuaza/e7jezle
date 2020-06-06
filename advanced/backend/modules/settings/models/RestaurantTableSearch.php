<?php

namespace backend\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\RestaurantTable;

/**
 * RestaurantTableSearch represents the model behind the search form of `backend\modules\settings\models\RestaurantTable`.
 */
class RestaurantTableSearch extends RestaurantTable
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'capacity', 'number_of_table', 'id_restaurant'], 'integer'],
            [['state', 'reservation_code'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = RestaurantTable::find();

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
            'capacity' => $this->capacity,
            'number_of_table' => $this->number_of_table,
            'id_restaurant' => $this->id_restaurant,
        ]);

        $query->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'reservation_code', $this->reservation_code]);

        return $dataProvider;
    }
}
