<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CompositionHistory;

/**
 * CompositionHistorySearch represents the model behind the search form of `backend\models\CompositionHistory`.
 */
class CompositionHistorySearch extends CompositionHistory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['composition_id', 'seats_first_class', 'seats_second_class', 'additional_capacity',], 'integer'],
            [['train_id', 'update_time', 'composition_id', 'seats_first_class', 'seats_second_class', 'additional_capacity', 'operator_id'], 'safe'],
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
        $query = CompositionHistory::find();
        $query->joinWith('operator')->joinWith('train');

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
            'composition_id' => $this->composition_id,
            'update_time' => $this->update_time,
        ]);
        $query->andFilterWhere(['like', 'Concat(train.type,train.number)', $this->train_id])
            ->andFilterWhere(['>=', 'seats_first_class', $this->seats_first_class])
            ->andFilterWhere(['>=', 'seats_second_class', $this->seats_second_class])
            ->andFilterWhere(['>=', 'additional_capacity', $this->additional_capacity])
            ->andFilterWhere(['like', 'operator.name', $this->operator_id]);


        return $dataProvider;
    }
}
