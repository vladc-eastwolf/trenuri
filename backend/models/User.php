<?php

namespace backend\models;

use Yii;
use frontend\models\Image;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $auth_key
 * @property string $firstname
 * @property string $lastname
 * @property string $phone
 * @property int|null $image_id
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string|null $email_reset_token
 * @property string $email
 * @property int $status
 * @property string|null $discount
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 *
 * @property Discount[] $discounts
 * @property Ticket[] $tickets
 * @property Image $image
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_key', 'firstname', 'lastname', 'phone', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['image_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['auth_key'], 'string', 'max' => 32],
            [['firstname', 'lastname', 'phone', 'password_hash', 'password_reset_token', 'email_reset_token', 'email', 'discount', 'verification_token'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['email_reset_token'], 'unique'],
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
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'phone' => 'Phone',
            'image_id' => 'Image ID',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email_reset_token' => 'Email Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'discount' => 'Discount',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }

    /**
     * Gets query for [[Discounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscounts()
    {
        return $this->hasMany(Discount::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Image]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }
}
