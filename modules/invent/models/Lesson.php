<?php

namespace app\modules\invent\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property int $user_id_create
 * @property int $user_id_update
 * @property string $date_create
 * @property string $date_update
 * @property string $comment
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['user_id_create', 'user_id_update'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
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
            'content' => 'Content',
            'user_id_create' => 'User Id Create',
            'user_id_update' => 'User Id Update',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'comment' => 'Comment',
        ];
    }
}
