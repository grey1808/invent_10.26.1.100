<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tech_group".
 *
 * @property int $id Идентификатор
 * @property string $name Наименование
 * @property int $characteristics_id
 * @property string $comment Комментарий
 */
class TechGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tech_group';
    }

    public function getCharacteristics ()
    {
        return $this->hasOne(Characteristics::className(),['id'=>'characteristics_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['characteristics_id'], 'integer'],
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
            'characteristics_id' => 'Характеристика',
            'comment' => 'Комментарий',
        ];
    }
}
