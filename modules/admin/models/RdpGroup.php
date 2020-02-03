<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "rdp_group".
 *
 * @property int $id Идентификатор
 * @property string $name Имя группы (Например Teamviewer)
 * @property string $comment Комментарий
 */
class RdpGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rdp_group';
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
