<?php

namespace backend\models;

use Yii;
use common\models\User;

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
 * @property int|null $departure_station_id
 * @property int|null $arrival_station_id
 * @property string|null $departure_time
 * @property string|null $arrival_time
 * @property float|null $distance
 * @property int|null $is_first_class
 * @property int|null $is_second_class
 * @property string|null $seat_reserved
 * @property float|null $price
 *
 * @property Composition $composition
 * @property Station $departureStation
 * @property Station $arrivalStation
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
            [['user_id', 'composition_id', 'departure_station_id', 'arrival_station_id', 'is_first_class', 'is_second_class'], 'integer'],
            [['sales_time', 'journey_date', 'departure_time', 'arrival_time'], 'safe'],
            [['distance', 'price'], 'number'],
            [['name', 'email', 'seat_reserved'], 'string', 'max' => 45],
            [['composition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Composition::className(), 'targetAttribute' => ['composition_id' => 'id']],
            [['departure_station_id'], 'exist', 'skipOnError' => true, 'targetClass' => Station::className(), 'targetAttribute' => ['departure_station_id' => 'id']],
            [['arrival_station_id'], 'exist', 'skipOnError' => true, 'targetClass' => Station::className(), 'targetAttribute' => ['arrival_station_id' => 'id']],
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
            'departure_station_id' => 'Departure Station ID',
            'arrival_station_id' => 'Arrival Station ID',
            'departure_time' => 'Departure Time',
            'arrival_time' => 'Arrival Time',
            'distance' => 'Distance',
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
