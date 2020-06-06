<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Restaurant;

/**
 * RestaurantSearch represents the model behind the search form about `frontend\models\Restaurant`.
 */
class RestaurantSearch extends Restaurant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'workTime', 'rate', 'number_tables', 'id_owners'], 'integer'],
            [['name', 'type', 'latitude', 'longitude', 'status'], 'safe'],
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
    public function search($params,$id = null)
    {
        if($id!=null)
        {
            $query = Restaurant::find()->where(['id_owners'=>$id]);
        }else {
            $query = Restaurant::find();
        }

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
            'workTime' => $this->workTime,
            'rate' => $this->rate,
            'number_tables' => $this->number_tables,
            'id_owners' => $this->id_owners,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
