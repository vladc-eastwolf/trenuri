<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Station;

class StationSearch extends Station
{
    /**
     * {@inheritdoc}
     */
    public $destination;
    public $origin;

    public function rules()
    {
        return [
            [['id', 'route_id', 'train_id'], 'integer'],
            [['name','destination','origin'], 'safe'],
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
        $query = Station::find();

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
            'route_id' => $this->route_id,
            'train_id' => $this->train_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->origin])
            ->andFilterWhere(['like', 'name', $this->destination]);

        return $dataProvider;
    }
}
