<?php

namespace app\models;

use Yii;


use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{


    public static function tableName()
    {
        return 'user';
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
//        return $this->password === $password;
//        echo Yii::$app->getSecurity()->generatePasswordHash($password).'<br>';
//        echo $this->password.'<br>';
//        die();
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function generateAuthKey(){
        $this->authKey  = Yii::$app->getSecurity()->generateRandomString();
    }
}
