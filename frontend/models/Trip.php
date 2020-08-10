<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "trip".
 *
 * @property int $id
 * @property int $line_id
 * @property int $operational_interval_id
 * @property int $train_id
 * @property string $departure_time
 * @property string $arrival_time
 *
 * @property Schedule[] $schedules
 * @property Line $line
 * @property OperationalInterval $operationalInterval
 * @property Train $train
 */
class Trip extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['line_id', 'operational_interval_id', 'train_id', 'departure_time', 'arrival_time'], 'required'],
            [['line_id', 'operational_interval_id', 'train_id'], 'integer'],
            [['departure_time', 'arrival_time'], 'safe'],
            [['line_id'], 'exist', 'skipOnError' => true, 'targetClass' => Line::className(), 'targetAttribute' => ['line_id' => 'id']],
            [['operational_interval_id'], 'exist', 'skipOnError' => true, 'targetClass' => OperationalInterval::className(), 'targetAttribute' => ['operational_interval_id' => 'id']],
            [['train_id'], 'exist', 'skipOnError' => true, 'targetClass' => Train::className(), 'targetAttribute' => ['train_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'line_id' => 'Line ID',
            'operational_interval_id' => 'Operational Interval ID',
            'train_id' => 'Train ID',
            'departure_time' => 'Departure Time',
            'arrival_time' => 'Arrival Time',
        ];
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['trip_id' => 'id']);
    }

    /**
     * Gets query for [[Line]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLine()
    {
        return $this->hasOne(Line::className(), ['id' => 'line_id']);
    }

    /**
     * Gets query for [[OperationalInterval]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperationalInterval()
    {
        return $this->hasOne(OperationalInterval::className(), ['id' => 'operational_interval_id']);
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
}
