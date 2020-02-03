<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id Идентификатор
 * @property string $surnname Имя
 * @property string $firstname Фамилия
 * @property string $partname Отчество
 * @property string $birthdate Дата рождения
 * @property string $email E-mail
 * @property int $position Должность
 * @property string $phonenumber Телефон
 * @property string $username Имя пользователя
 * @property string $password Пароль пользователя
 * @property string $authKey Хеш пароля
 * @property int $user_group_id Группа пользователя
 * @property int $status Статус пользователя
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
            [['birthdate'], 'safe'],
            [['user_group_id', 'status'], 'integer'],
            [['surnname', 'firstname', 'partname', 'email', 'username', 'password', 'authKey','position'], 'string', 'max' => 255],
            [['phonenumber'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surnname' => 'Фамилия',
            'firstname' => 'Имя',
            'partname' => 'Отчество',
            'birthdate' => 'Дата рождения',
            'email' => 'Email',
            'position' => 'Должность',
            'phonenumber' => 'Телефон',
            'username' => 'Логин',
            'password' => 'Пароль',
            'authKey' => 'Auth Key',
            'user_group_id' => 'Роль',
            'status' => 'Статус',
        ];
    }
}
