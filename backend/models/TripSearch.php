<?php

namespace backend\models;

use kartik\time\TimePicker;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Trip;

/**
 * TripSearch represents the model behind the search form of `backend\models\Trip`.
 */
class TripSearch extends Trip
{
    public $timepicker;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['departure_time', 'arrival_time', 'line_id', 'operational_interval_id', 'train_id', 'timepicker'], 'safe'],
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
        $query = Trip::find()->from(Trip::tableName() . ' t');
        $query->joinWith(['line as l', 'operationalInterval as o', 'train as tr']);

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
        $query->andFilterWhere(['like', 'l.name', $this->line_id])
            ->andFilterWhere(['like', 'o.name', $this->operational_interval_id])
            ->andFilterWhere(['like', 'Concat(tr.type,tr.number)', $this->train_id])
            ->andFilterWhere(['like', 'departure_time', $this->departure_time])
            ->andFilterWhere(['like', 'arrival_time', $this->arrival_time]);


        return $dataProvider;
    }
}
