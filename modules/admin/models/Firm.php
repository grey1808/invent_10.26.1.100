<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "firm".
 *
 * @property int $id Идентификатор
 * @property string $name Наименование
 * @property string $comment Комментарий
 */
class Firm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'firm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
            'name' => 'Имя',
            'comment' => 'Комментарий',
        ];
    }
}
