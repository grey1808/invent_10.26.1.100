<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user_group".
 *
 * @property int $id Группа пользователей
 * @property string $name Наименование группы
 * @property string $comment Комментарий
 */
class UserGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'comment'], 'required'],
            [['name', 'comment'], 'string', 'max' => 255],
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
            'comment' => 'Comment',
        ];
    }
}
