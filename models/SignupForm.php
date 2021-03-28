<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * Class SignupForm
 * @package app\models
 */
class SignupForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;

    /**
     * @return array
     */
    public function rules():array
    {
        return [
            [['username', 'password', 'password_repeat'], 'required'],
            [['username', 'password', 'password_repeat'], 'string', 'min' => 4, 'max' => 20],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * User signup action.
     *
     * @return boolean
     * @throws Exception \Exception.
     */
    public function signup():bool
    {
        $user = new User();
        $user->username = $this->username;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->access_token = Yii::$app->security->generateRandomString();
        $user->auth_key = Yii::$app->security->generateRandomString();

        if ($user->save()) {
            return true;
        }
        Yii::error('User was not saved. '.VarDumper::dumpAsString($user->errors));

        return false;
    }
}
