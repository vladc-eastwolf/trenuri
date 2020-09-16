<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string|null $auth_key
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $phone
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property string $created_at
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }
    public $newPassword;
    public $confirmNewPassword;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password_hash', 'email'], 'required'],
            [['status'], 'integer'],
            [['created_at'], 'safe'],
            [['auth_key'], 'string', 'max' => 32],
            ['newPassword', 'string', 'min' => 6],
            ['confirmNewPassword', 'string', 'min' => 6],
            ['confirmNewPassword','compare','compareAttribute'=>'newPassword'],
            [['firstname', 'lastname', 'phone', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
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
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'phone' => 'Phone',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
