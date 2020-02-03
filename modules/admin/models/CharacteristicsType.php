<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "characteristics_type".
 *
 * @property int $id Идентификатор
 * @property string $name Наименование
 * @property string $comment Комментарий
 */
class CharacteristicsType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'characteristics_type';
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
