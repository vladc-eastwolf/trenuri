<?php

namespace frontend\models;
use frontend\models\User;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $name
 * @property int $size
 * @property string $extension
 * @property string $mime_type
 * @property int $user_id
 * @property string $created_at
 * @property User $user
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size', 'user_id'], 'integer'],
            [['created_at'], 'safe'],
            [['user_id'], 'unique'],
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
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['image_id' => 'id']);
    }
    public function getPath()
    {
        return Yii::getAlias('@uploads') . '/image' . $this->id . '.' . $this->extension;

    }
}
