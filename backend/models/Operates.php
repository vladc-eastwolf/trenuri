<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "operates".
 *
 * @property int $id
 * @property int|null $composition_id
 * @property int|null $trip_id
 * @property string|null $date_from
 * @property string|null $date_to
 *
 * @property Composition $composition
 * @property Trip $trip
 */
class Operates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['composition_id', 'trip_id'], 'integer'],
            [['date_from', 'date_to'], 'string', 'max' => 45],
            [['composition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Composition::className(), 'targetAttribute' => ['composition_id' => 'id']],
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
            'composition_id' => 'Composition ID',
            'trip_id' => 'Trip ID',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
        ];
    }

    /**
     * Gets query for [[Composition]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComposition()
    {
        return $this->hasOne(Composition::className(), ['id' => 'composition_id']);
    }

    /**
     * Gets query for [[Trip]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrip()
    {
        return $this->hasOne(Trip::className(), ['id' => 'trip_id']);
    }

    public function getTrain()
    {
        return $this->hasOne(Train::className(), ['id' => 'train_id'])->via('composition');
    }

    public function getOperator()
    {
        return $this->hasOne(Operator::className(), ['id' => 'operator_id'])->via('composition');
    }

    public function getLine()
    {
        return $this->hasOne(Line::className(), ['id' => 'line_id'])->via('trip');
    }
}
