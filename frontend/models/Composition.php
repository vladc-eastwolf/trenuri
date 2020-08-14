<?php

namespace frontend\models;

use backend\models\Train;
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
 *
 * @property Ticket[] $tickets
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

    public $seat;
    public $ticket_type;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['train_id', 'seats_first_class', 'seats_second_class', 'additional_capacity', 'operator_id', 'seat', 'ticket_type'], 'integer'],
            [['update_time'], 'safe'],
            [['description'], 'string', 'max' => 45],
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
        ];
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['composition_id' => 'id']);
    }

    public function getTrain()
    {
        return $this->hasOne(Train::className(), ['id' => 'train_id']);
    }
}
