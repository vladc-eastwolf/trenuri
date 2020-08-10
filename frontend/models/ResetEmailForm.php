<?php
namespace frontend\models;

use yii\base\InvalidArgumentException;
use yii\base\Model;
use common\models\User;

/**
 * Password reset form
 */
class ResetEmailForm extends Model
{
    public $email;

    /**
     * @var \common\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws InvalidArgumentException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidArgumentException('Email reset token cannot be blank.');
        }
        $this->_user = User::findByEmailResetToken($token);
        if (!$this->_user) {
            throw new InvalidArgumentException('Wrong email reset token.');
        }
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            [['email'],'string','max'=>255],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if Email was reset.
     */
    public function resetEmail()
    {
        $user = $this->_user;
        $user->email=$this->email;
        $user->removeEmailResetToken();

        return $user->save();
    }
}
