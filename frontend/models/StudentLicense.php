<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "student_license".
 *
 * @property int $id
 * @property int|null $discount_id
 * @property string|null $license_front
 * @property string|null $license_back
 * @property string|null $send_at
 *
 * @property Discount $discount
 */
class StudentLicense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_license';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discount_id'], 'integer'],
            [['send_at'], 'safe'],
            [['license_front', 'license_back'], 'string', 'max' => 255],
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
            'license_front' => 'License Front',
            'license_back' => 'License Back',
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
