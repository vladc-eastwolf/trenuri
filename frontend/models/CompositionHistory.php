<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "composition_history".
 *
 * @property int $composition_id
 * @property int|null $train_id
 * @property int|null $seats_first_class
 * @property int|null $seats_second_class
 * @property int|null $additional_capacity
 * @property string $update_time
 * @property int|null $operator_id
 */
class CompositionHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'composition_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['composition_id', 'train_id', 'seats_first_class', 'seats_second_class', 'additional_capacity', 'operator_id'], 'integer'],
            [['update_time'], 'safe'],
            [['composition_id'], 'unique'],
            [['composition_id', 'update_time'], 'unique', 'targetAttribute' => ['composition_id', 'update_time']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'composition_id' => 'Composition ID',
            'train_id' => 'Train ID',
            'seats_first_class' => 'Seats First Class',
            'seats_second_class' => 'Seats Second Class',
            'additional_capacity' => 'Additional Capacity',
            'update_time' => 'Update Time',
            'operator_id' => 'Operator ID',
        ];
    }
}
