<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Operates;

/**
 * OperatesSearch represents the model behind the search form of `backend\models\Operates`.
 */
class OperatesSearch extends Operates
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'composition_id'], 'integer'],
            [['date_from', 'date_to', 'composition_id', 'trip_id'], 'safe'],
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
        $query = Operates::find();
        $query->joinWith(['line']);

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
            'composition_id' => $this->composition_id,
        ]);

        $query->andFilterWhere(['like', 'date_from', $this->date_from])
            ->andFilterWhere(['like', 'date_to', $this->date_to])
            ->andFilterWhere(['like', 'line.name', $this->trip_id]);

        return $dataProvider;
    }
}
