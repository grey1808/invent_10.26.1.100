<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "characteristics_composition".
 *
 * @property int $id Идентификатор
 * @property int $characteristics_id Характеристика
 * @property string $name Наименование
 * @property string $value Значение поля
 * @property string $comment Комментарий
 */
class CharacteristicsComposition extends \yii\db\ActiveRecord
{
    const DEFAULT_NAME = null;
    const DEFAULT_COMMENT = null;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'characteristics_composition';
    }

    public function getCharacteristics ()
    {
        return $this->hasOne(Characteristics::className(),['id'=>'characteristics_id']);
//        return $this->hasOne(Characteristics::className(),['characteristics_id'=>'id']);
//        return $this->hasMany(CharacteristicsComposition::className(),['characteristics_id'=>'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['characteristics_id', 'name'], 'required'],
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
            'characteristics_id' => 'Characteristics ID',
            'name' => 'Наименование',
            'comment' => 'Комментарий',
        ];
    }


    public function addOne()
    {
        $this->name = self::DEFAULT_NAME;
        $this->comment = self::DEFAULT_COMMENT;
    }
}
