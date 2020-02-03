<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property int $id
 * @property string $name Имя сервиса
 * @property string $url_1 Адрес сервиса основной
 * @property string $url_2 Адрес сервиса зеркало 1
 * @property string $url_3 Адрес сервиса зеркало 2
 * @property string $url_4 Адрес сервиса зеркало 3
 * @property string $login Логин
 * @property string $password Пароль
 * @property string $user Пользователь системы ФИО
 * @property string $comment Комментарий
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url_1', 'url_2', 'url_3', 'url_4', 'login', 'password', 'user', 'comment'], 'string', 'max' => 255],
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
            'url_1' => 'Url 1',
            'url_2' => 'Url 2',
            'url_3' => 'Url 3',
            'url_4' => 'Url 4',
            'login' => 'Login',
            'password' => 'Password',
            'user' => 'User',
            'comment' => 'Comment',
        ];
    }
}
