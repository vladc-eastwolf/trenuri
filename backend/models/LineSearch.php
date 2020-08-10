<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Line;

/**
 * LineSearch represents the model behind the search form of `backend\models\Line`.
 */
class LineSearch extends Line
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'operator_id', 'departure_station_id', 'arrival_station_id'], 'safe'],
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
        $query = Line::find()->from(Line::tableName(). ' l');
            $query->joinWith(['operator as o','departureStation as ds','arrivalStation as as']);

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
        ]);

        $query->andFilterWhere(['like', 'l.name', $this->name])
            ->andFilterWhere(['like', 'ds.name', $this->departure_station_id])
            ->andFilterWhere(['like', 'as.name', $this->arrival_station_id])
            ->andFilterWhere(['like', 'o.name', $this->operator_id]);


        return $dataProvider;
    }
}
