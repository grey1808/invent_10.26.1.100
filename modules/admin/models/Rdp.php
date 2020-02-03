<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "rdp".
 *
 * @property int $id Идентификатор
 * @property string $name Наименование
 * @property string $ipaddress ip адрес удаленного клиента
 * @property int $structure_id Локация (Место из структуры)
 * @property int $technics_id Выбор техники
 * @property string $comment Комментарий
 */
class Rdp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'rdp';
    }

    public function getCategory ()
    {
        return $this->hasOne(Category::className(),['id'=>'structure_id']);
    }

    public function getTechnics ()
    {
        return $this->hasOne(Technics::className(),['id'=>'technics_id']);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'structure_id', 'technics_id'], 'required'],
            [['structure_id', 'technics_id'], 'integer'],
            [['name', 'ipaddress', 'comment'], 'string', 'max' => 255],
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
            'ipaddress' => 'ip адрес',
            'structure_id' => 'Категория',
            'technics_id' => 'Техника',
            'technics_id_comment' => 'Техника',
            'comment' => 'Комментарий',
        ];
    }
}
