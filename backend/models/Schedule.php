<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $trip_id
 * @property int $station_id
 * @property string $station_order
 * @property string $distance
 * @property string|null $arrival_time
 * @property string|null $departure_time
 *
 * @property Station $station
 * @property Trip $trip
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $count;


    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trip_id', 'station_id', 'station_order', 'distance'], 'required'],
            [['trip_id', 'station_id','count'], 'integer'],
            [['arrival_time', 'departure_time'], 'safe'],
            [['station_order', 'distance'], 'string', 'max' => 255],
            [['station_id'], 'exist', 'skipOnError' => true, 'targetClass' => Station::className(), 'targetAttribute' => ['station_id' => 'id']],
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
            'trip_id' => 'Trip',
            'station_id' => 'Station',
            'station_order' => 'Station Order',
            'distance' => 'Distance',
            'arrival_time' => 'Arrival Time',
            'departure_time' => 'Departure Time',
        ];
    }

    /**
     * Gets query for [[Station]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStation()
    {
        return $this->hasOne(Station::className(), ['id' => 'station_id']);
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
    public function getLine()
    {
        return $this->hasOne(Line::className(),['id'=>'line_id'])->via('trip');
    }

}
