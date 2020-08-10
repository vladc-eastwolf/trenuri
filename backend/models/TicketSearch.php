<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ticket;

/**
 * TicketSearch represents the model behind the search form of `backend\models\Ticket`.
 */
class TicketSearch extends Ticket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'composition_id', 'departure_station_id', 'arrival_station_id', 'is_first_class', 'is_second_class'], 'integer'],
            [['name', 'email', 'sales_time', 'journey_date', 'seat_reserved'], 'safe'],
            [['price'], 'number'],
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
        $query = Ticket::find();

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
            'sales_time' => $this->sales_time,
            'composition_id' => $this->composition_id,
            'journey_date' => $this->journey_date,
            'departure_station_id' => $this->departure_station_id,
            'arrival_station_id' => $this->arrival_station_id,
            'is_first_class' => $this->is_first_class,
            'is_second_class' => $this->is_second_class,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'seat_reserved', $this->seat_reserved]);

        return $dataProvider;
    }
}
