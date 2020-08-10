<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "operator".
 *
 * @property int $id
 * @property string $name
 * @property string $headquarters
 *
 * @property Line[] $lines
 */
class Operator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'headquarters'], 'required'],
            [['name', 'headquarters'], 'string', 'max' => 255],
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
            'headquarters' => 'Headquarters',
        ];
    }

    /**
     * Gets query for [[Lines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLines()
    {
        return $this->hasMany(Line::className(), ['operator_id' => 'id']);
    }
}
