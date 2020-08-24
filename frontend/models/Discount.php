<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "discount".
 *
 * @property int $id
 * @property string $name
 * @property string $size
 * @property string $extension
 * @property string $mine_type
 * @property int $user_id
 * @property string|null $student
 * @property string|null $schoolboy
 * @property string|null $retired
 * @property string $send_at
 *
 * @property User $user
 */
class Discount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discount';
    }
    public $discount_type;
    public $imageFile1;
    public $imageFile2;
    public $imageFile3;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'size', 'extension', 'mine_type', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['send_at'], 'safe'],
            [['name', 'size', 'extension', 'mine_type', 'student', 'schoolboy', 'retired','discount_type'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'mine_type' => 'Mine Type',
            'user_id' => 'User ID',
            'student' => 'Student',
            'schoolboy' => 'Schoolboy',
            'retired' => 'Retired',
            'send_at' => 'Send At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
