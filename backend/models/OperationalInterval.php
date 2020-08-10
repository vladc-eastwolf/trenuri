<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "operational_interval".
 *
 * @property int $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property int $monday
 * @property int $tuesday
 * @property int $wednesday
 * @property int $thursday
 * @property int $friday
 * @property int $saturday
 * @property int $sunday
 *
 * @property Trip[] $trips
 */
class OperationalInterval extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operational_interval';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'start_date', 'end_date', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'monday' => 'Monday',
            'tuesday' => 'Tuesday',
            'wednesday' => 'Wednesday',
            'thursday' => 'Thursday',
            'friday' => 'Friday',
            'saturday' => 'Saturday',
            'sunday' => 'Sunday',
        ];
    }

    /**
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trip::className(), ['operational_interval_id' => 'id']);
    }
}
