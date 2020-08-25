<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "schoolboy_license".
 *
 * @property int $id
 * @property int|null $discount_id
 * @property string|null $notebook
 * @property string|null $send_at
 *
 * @property Discount $discount
 */
class SchoolboyLicense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schoolboy_license';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discount_id'], 'integer'],
            [['send_at'], 'safe'],
            [['notebook'], 'string', 'max' => 45],
            [['discount_id'], 'exist', 'skipOnError' => true, 'targetClass' => Discount::className(), 'targetAttribute' => ['discount_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'discount_id' => 'Discount ID',
            'notebook' => 'Notebook',
            'send_at' => 'Send At',
        ];
    }

    /**
     * Gets query for [[Discount]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscount()
    {
        return $this->hasOne(Discount::className(), ['id' => 'discount_id']);
    }
}
