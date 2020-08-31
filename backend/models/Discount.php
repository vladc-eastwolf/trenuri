<?php

namespace backend\models;

use Yii;
use frontend\models\User;


/**
 * This is the model class for table "discount".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $identity_card_id
 * @property int|null $student_id
 * @property int|null $school_id
 * @property int|null $retired_id
 * @property int $status
 * @property string $send_at
 *
 * @property IdentityCard $identityCard
 * @property RetiredLicense $retired
 * @property SchoolLicense $school
 * @property StudentLicense $student
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'identity_card_id', 'student_id', 'school_id', 'retired_id', 'status'], 'integer'],
            [['send_at'], 'safe'],
            [['identity_card_id'], 'exist', 'skipOnError' => true, 'targetClass' => IdentityCard::className(), 'targetAttribute' => ['identity_card_id' => 'id']],
            [['retired_id'], 'exist', 'skipOnError' => true, 'targetClass' => RetiredLicense::className(), 'targetAttribute' => ['retired_id' => 'id']],
            [['school_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchoolLicense::className(), 'targetAttribute' => ['school_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudentLicense::className(), 'targetAttribute' => ['student_id' => 'id']],
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
            'identity_card_id' => 'Identity Card ID',
            'student_id' => 'Student ID',
            'school_id' => 'School ID',
            'retired_id' => 'Retired ID',
            'status' => 'Status',
            'send_at' => 'Send At',
        ];
    }

    /**
     * Gets query for [[IdentityCard]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdentityCard()
    {
        return $this->hasOne(IdentityCard::className(), ['id' => 'identity_card_id']);
    }

    /**
     * Gets query for [[Retired]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRetired()
    {
        return $this->hasOne(RetiredLicense::className(), ['id' => 'retired_id']);
    }

    /**
     * Gets query for [[School]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(SchoolLicense::className(), ['id' => 'school_id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(StudentLicense::className(), ['id' => 'student_id']);
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
