<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "train".
 *
 * @property int $id
 * @property string $type
 * @property string $number
 *
 * @property Trip[] $trips
 */
class Train extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'train';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'number'], 'required'],
            [['type', 'number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'number' => 'Number',
        ];
    }

    /**
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trip::className(), ['train_id' => 'id']);
    }

}
