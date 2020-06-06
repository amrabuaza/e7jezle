<?php

namespace backend\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\UserOrder;

/**
 * UserOrderSearch represents the model behind the search form about `backend\modules\settings\models\UserOrder`.
 */
class UserOrderSearch extends UserOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bill', 'id_rustarurant', 'id_table', 'id_user'], 'integer'],
            [['date'], 'safe'],
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
        $query = UserOrder::find();

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
            'date' => $this->date,
            'bill' => $this->bill,
            'id_rustarurant' => $this->id_rustarurant,
            'id_table' => $this->id_table,
            'id_user' => $this->id_user,
        ]);

        return $dataProvider;
    }
}
