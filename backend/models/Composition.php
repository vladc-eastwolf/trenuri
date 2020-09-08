<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "composition".
 *
 * @property int $id
 * @property int|null $train_id
 * @property int|null $seats_first_class
 * @property int|null $seats_second_class
 * @property int|null $additional_capacity
 * @property string|null $update_time
 * @property int|null $operator_id
 * @property string|null $description
 * @property int|null $trip_id
 * @property Operator $operator
 * @property Train $train
 * @property CompositionHistory[] $compositionHistories
 * @property Operates[] $operates
 */
class Composition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'composition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['train_id', 'seats_first_class', 'seats_second_class', 'additional_capacity', 'operator_id','trip_id'], 'integer'],
            [['train_id', 'operator_id'], 'required'],
            [['update_time'], 'safe'],
            [['description'], 'string', 'max' => 45],
            [['operator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Operator::className(), 'targetAttribute' => ['operator_id' => 'id']],
            [['train_id'], 'exist', 'skipOnError' => true, 'targetClass' => Train::className(), 'targetAttribute' => ['train_id' => 'id']],
            [['trip_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trip::className(), 'targetAttribute' => ['trip_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'train_id' => 'Train ID',
            'seats_first_class' => 'Seats First Class',
            'seats_second_class' => 'Seats Second Class',
            'additional_capacity' => 'Additional Capacity',
            'update_time' => 'Update Time',
            'operator_id' => 'Operator ID',
            'description' => 'Description',
            'trip_id' => 'Trip ID',
        ];
    }

    /**
     * Gets query for [[Operator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperator()
    {
        return $this->hasOne(Operator::className(), ['id' => 'operator_id']);
    }
    /**
     * Gets query for [[Train]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrain()
    {
        return $this->hasOne(Train::className(), ['id' => 'train_id']);
    }

    /**
     * Gets query for [[CompositionHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompositionHistories()
    {
        return $this->hasMany(CompositionHistory::className(), ['composition_id' => 'id']);
    }

    /**
     * Gets query for [[Operates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperates()
    {
        return $this->hasMany(Operates::className(), ['composition_id' => 'id']);
    }
    public function getTrip()
    {
        return $this->hasOne(Trip::className(), ['id' => 'trip_id']);
    }
}
