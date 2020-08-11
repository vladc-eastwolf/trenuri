<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "station".
 *
 * @property int $id
 * @property string $name
 * @property int $location_id
 *
 * @property Line[] $lines
 * @property Line[] $lines0
 * @property Schedule[] $schedules
 * @property Location $location
 */
class Station extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'station';
    }
    public $origin;
    public $destination;
    public $date;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'location_id'], 'required'],
            ['destination', 'required', 'message' => 'Please choose a destination.'],
            ['origin', 'required', 'message' => 'Please choose a departure station.'],
            ['date', 'required', 'message' => 'Please choose when you want to travel.'],
            [['location_id'], 'integer'],
            [['date'],'safe'],
            [['name','origin','destination'], 'string', 'max' => 255],
            [['date'],'date','format'=>'php:Y-m-d'],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
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
            'location_id' => 'Location ID',
        ];
    }

    /**
     * Gets query for [[Lines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLines()
    {
        return $this->hasMany(Line::className(), ['departure_station_id' => 'id']);
    }

    /**
     * Gets query for [[Lines0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLines0()
    {
        return $this->hasMany(Line::className(), ['arrival_station_id' => 'id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['station_id' => 'id']);
    }

    /**
     * Gets query for [[Location]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }
}
