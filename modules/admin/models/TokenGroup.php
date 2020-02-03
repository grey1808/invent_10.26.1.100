<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "token_group".
 *
 * @property int $id Идентификатор
 * @property string $name Наименование группы
 * @property string $comment Комментарий
 */
class TokenGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'token_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'comment'], 'required'],
            [['name'], 'string', 'max' => 11],
            [['comment'], 'string', 'max' => 255],
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
