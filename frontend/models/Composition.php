<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "composition".
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $seats_first_class
 * @property int|null $seats_second_class
 * @property int|null $additional_capacity
 * @property string|null $update_time
 * @property int|null $operator_id
 * @property string|null $description
 *
 * @property Operator $operator
 * @property CompositionHistory[] $compositionHistories
 * @property Operates[] $operates
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
            [['seats_first_class', 'seats_second_class', 'additional_capacity', 'operator_id', 'seat','ticket_type'], 'integer'],
            [['update_time'], 'safe'],
            [['code', 'description'], 'string', 'max' => 45],
            [['operator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Operator::className(), 'targetAttribute' => ['operator_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'seats_first_class' => 'Seats First Class',
            'seats_second_class' => 'Seats Second Class',
            'additional_capacity' => 'Additional Capacity',
            'update_time' => 'Update Time',
            'operator_id' => 'Operator ID',
            'description' => 'Description',
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
     * Gets query for [[CompositionHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompositionHistories()
    {
        return $this->hasMany(CompositionHistory::className(), ['composition_id' => 'id']);
    }

    /**
     * Gets query for [[Operates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperates()
    {
        return $this->hasMany(Operates::className(), ['composition_id' => 'id']);
    }
}
