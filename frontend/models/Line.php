<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "line".
 *
 * @property int $id
 * @property string $name
 * @property int $operator_id
 * @property int $departure_station_id
 * @property int $arrival_station_id
 *
 * @property Operator $operator
 * @property Station $departureStation
 * @property Station $arrivalStation
 * @property Trip[] $trips
 */
class Line extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'line';
    }
    public $number;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'operator_id', 'departure_station_id', 'arrival_station_id'], 'required'],
            [['operator_id', 'departure_station_id', 'arrival_station_id'], 'integer'],
            [['name','number'], 'string', 'max' => 255],
            [['operator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Operator::className(), 'targetAttribute' => ['operator_id' => 'id']],
            [['departure_station_id'], 'exist', 'skipOnError' => true, 'targetClass' => Station::className(), 'targetAttribute' => ['departure_station_id' => 'id']],
            [['arrival_station_id'], 'exist', 'skipOnError' => true, 'targetClass' => Station::className(), 'targetAttribute' => ['arrival_station_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'operator_id' => 'Operator ID',
            'departure_station_id' => 'Departure Station ID',
            'arrival_station_id' => 'Arrival Station ID',
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
     * Gets query for [[DepartureStation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartureStation()
    {
        return $this->hasOne(Station::className(), ['id' => 'departure_station_id']);
    }

    /**
     * Gets query for [[ArrivalStation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArrivalStation()
    {
        return $this->hasOne(Station::className(), ['id' => 'arrival_station_id']);
    }

    /**
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trip::className(), ['line_id' => 'id']);
    }
}
