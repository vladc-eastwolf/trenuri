<?php

namespace backend\models;

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
 *
 * @property Composition $composition
 * @property Operator $operator
 * @property Train $train
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
            [['composition_id', 'update_time'], 'required'],
            [['composition_id', 'train_id', 'seats_first_class', 'seats_second_class', 'additional_capacity', 'operator_id'], 'integer'],
            [['update_time'], 'safe'],
            [['composition_id', 'update_time'], 'unique', 'targetAttribute' => ['composition_id', 'update_time']],
            [['composition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Composition::className(), 'targetAttribute' => ['composition_id' => 'id']],
            [['operator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Operator::className(), 'targetAttribute' => ['operator_id' => 'id']],
            [['train_id'], 'exist', 'skipOnError' => true, 'targetClass' => Train::className(), 'targetAttribute' => ['train_id' => 'id']],
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
     * Gets query for [[Operator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperator()
    {
        return $this->hasOne(Operator::className(), ['id' => 'operator_id']);
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
