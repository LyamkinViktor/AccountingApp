<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int    $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @return string
     */
    public static function tableName():string
    {
        return 'user';
    }

    /**
     * @return array
     */
    public function rules():array
    {
        return [
            [['username', 'password', 'auth_key', 'access_token'], 'required'],
            [['username'], 'string', 'max' => 55],
            [['password', 'auth_key', 'access_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels():array
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }


    /**
     * @param integer|string $id
     *
     * @return User|IdentityInterface|null
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @param mixed $token
     * @param null  $type
     *
     * @return array|ActiveRecord|IdentityInterface|null
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['access_token' => $token])->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     *
     * @return static|null
     */
    public static function findByUsername(string $username):?User
    {
        return self::findOne(['username' => $username]);
    }

    /**
     * @return integer|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthKey():string
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     *
     * @return boolean
     */
    public function validateAuthKey($authKey):bool
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     *
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword(string $password):bool
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
