<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "retired_license".
 *
 * @property int $id
 * @property string $name
 * @property int|null $size
 * @property string|null $extension
 * @property string|null $mime_type
 * @property int $status
 *
 * @property Discount[] $discounts
 */
class RetiredLicense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'retired_license';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['size', 'status'], 'integer'],
            [['name', 'extension', 'mime_type'], 'string', 'max' => 255],
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
            'size' => 'Size',
            'extension' => 'Extension',
            'mime_type' => 'Mime Type',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Discounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscounts()
    {
        return $this->hasMany(Discount::className(), ['retired_id' => 'id']);
    }
}
