<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "characteristics".
 *
 * @property int $id Идентификатор
 * @property string $name Наименование
 * @property string $comment Комментарий
 */
class Characteristics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'characteristics';
    }

    public function getCharacteristicsType ()
    {
        return $this->hasOne(CharacteristicsType::className(),['id'=>'type_id']); // техника или программы
    }

    public function getCharacteristicsComposition ()
    {
//        return $this->hasOne(CharacteristicsComposition::className(),['id'=>'characteristics_id']);
        return $this->hasMany(CharacteristicsComposition::className(),['characteristics_id'=>'id']);
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','type_id'], 'required'],
            [['type_id'], 'integer'],
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
            'name' => 'Наименование',
            'type_id' => 'Тип',
            'comment' => 'Комментарий',
        ];
    }
}
