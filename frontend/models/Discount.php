<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "discount".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $student
 * @property int|null $schoolboy
 * @property int|null $retired
 * @property string|null $identity_card
 * @property int|null $size
 * @property string|null $extension
 * @property string|null $mime_type
 * @property string|null $created_at
 *
 * @property User $user
 * @property SchoolboyLicense[] $schoolboyLicenses
 * @property StudentLicense[] $studentLicenses
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

    public $imageFile1;
    public $imageFile2;
    public $imageFile3;
    public $discount_type;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'student', 'schoolboy', 'retired', 'size'], 'integer'],
            [['imageFile1', 'imageFile2', 'imageFile3'], 'file', 'extensions' => 'png, jpg'],
            [['created_at'], 'safe'],
            [['identity_card', 'extension', 'mime_type', 'discount_type'], 'string', 'max' => 45],
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
            'user_id' => 'User ID',
            'student' => 'Student',
            'schoolboy' => 'Schoolboy',
            'retired' => 'Retired',
            'identity_card' => 'Identity Card',
            'size' => 'Size',
            'extension' => 'Extension',
            'mime_type' => 'Mime Type',
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
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[SchoolboyLicenses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolboyLicenses()
    {
        return $this->hasMany(SchoolboyLicense::className(), ['discount_id' => 'id']);
    }

    /**
     * Gets query for [[StudentLicenses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentLicenses()
    {
        return $this->hasMany(StudentLicense::className(), ['discount_id' => 'id']);
    }
}
