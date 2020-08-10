<?php

namespace frontend\models;
use frontend\models\Image;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string|null $email_reset_token
 * @property string $email
 * @property string $firstname
 * @property string $lastname
 * @property string $phone
 * @property int $status
 * @property int|null $image_id
 * @property string $imageFile
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    public $imageFile;
    public $oldPassword;
    public $newPassword;
    public $confirmNewPassword;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_key', 'password_hash', 'email', 'firstname', 'lastname', 'phone', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at','image_id'], 'integer'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token','email_reset_token', 'email', 'firstname', 'lastname', 'phone', 'verification_token','oldPassword'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['password_reset_token','email_reset_token'], 'unique'],
            ['newPassword', 'string', 'min' => 6],
            ['confirmNewPassword', 'string', 'min' => 6],
            ['confirmNewPassword','compare','compareAttribute'=>'newPassword'],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email_reset_token' => 'Email Reset Token',
            'email' => 'Email',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'phone' => 'Phone',
            'image_id'=>'Image Id',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'imageFile'=>'Image File'
        ];
    }
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }
}
