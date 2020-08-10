<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property int|null $user_id
 * @property string|null $sales_time
 * @property int|null $composition_id
 * @property string|null $journey_date
 * @property int|null $schedule_departure_station_id
 * @property int|null $schedule_arrival_station_id
 * @property int|null $is_first_class
 * @property int|null $is_second_class
 * @property string|null $seat_reserved
 * @property float|null $price
 *
 * @property Composition $composition
 * @property Schedule $scheduleDepartureStation
 * @property Schedule $scheduleArrivalStation
 * @property User $user
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'composition_id', 'schedule_departure_station_id', 'schedule_arrival_station_id', 'is_first_class', 'is_second_class'], 'integer'],
            [['sales_time', 'journey_date'], 'safe'],
            [['price'], 'number'],
            [['name', 'email', 'seat_reserved'], 'string', 'max' => 45],
            [['composition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Composition::className(), 'targetAttribute' => ['composition_id' => 'id']],
            [['schedule_departure_station_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schedule::className(), 'targetAttribute' => ['schedule_departure_station_id' => 'id']],
            [['schedule_arrival_station_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schedule::className(), 'targetAttribute' => ['schedule_arrival_station_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'email' => 'Email',
            'user_id' => 'User ID',
            'sales_time' => 'Sales Time',
            'composition_id' => 'Composition ID',
            'journey_date' => 'Journey Date',
            'schedule_departure_station_id' => 'Schedule Departure Station ID',
            'schedule_arrival_station_id' => 'Schedule Arrival Station ID',
            'is_first_class' => 'Is First Class',
            'is_second_class' => 'Is Second Class',
            'seat_reserved' => 'Seat Reserved',
            'price' => 'Price',
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
     * Gets query for [[ScheduleDepartureStation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScheduleDepartureStation()
    {
        return $this->hasOne(Schedule::className(), ['id' => 'schedule_departure_station_id']);
    }

    /**
     * Gets query for [[ScheduleArrivalStation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScheduleArrivalStation()
    {
        return $this->hasOne(Schedule::className(), ['id' => 'schedule_arrival_station_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
