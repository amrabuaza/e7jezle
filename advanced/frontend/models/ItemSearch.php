<?php

namespace frontend\models;

use backend\modules\settings\models\Menu;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\Item;

/**
 * ItemSearch represents the model behind the search form about `backend\modules\settings\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'price', 'id_mnue'], 'integer'],
            [['name', 'description', 'picture'], 'safe'],
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
        $id = Yii::$app->user->id;
        $restaurnat_id = Restaurant::find()->where(['id_owners'=>$id])->addSelect('id');
        $id_Menu = Menu::find()->where(['id_restaurant'=>$restaurnat_id])->addSelect('id');
        $query = Item::find()->where(['id_mnue'=>$id_Menu]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            //$query->where(['id_mnue'=>$id_Menu]);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'price' => $this->price,
            'id_mnue' => $this->id_mnue,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'picture', $this->picture]);

        return $dataProvider;
    }
}
