<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Schedule;

/**
 * ScheduleSearch represents the model behind the search form of `backend\models\Schedule`.
 */
class ScheduleSearch extends Schedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['station_order', 'distance', 'arrival_time', 'departure_time', 'trip_id', 'station_id'], 'safe'],
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
        $query = Schedule::find()->joinWith(['trip as t','station as s','line']);

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

        $query->andFilterWhere(['like', 'station_order', $this->station_order])
            ->andFilterWhere(['like', 'distance', $this->distance])
            ->andFilterWhere(['like', 'line.name', $this->trip_id])
            ->andFilterWhere(['like', 'schedule.departure_time', $this->departure_time])
            ->andFilterWhere(['like', 'schedule.arrival_time', $this->arrival_time])
            ->andFilterWhere(['like', 's.name', $this->station_id]);



        return $dataProvider;
    }
}
