<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "technics".
 *
 * @property int $id Идентификатор
 * @property int $tech_group_id Группа техники
 * @property int $category_id Родительская категория
 * @property int $firm_id Производитель
 * @property string $name Наименование техники
 * @property int $invent_number Инвентарный номер
 * @property string $model Модель техники
 * @property string $serial Серийный номер
 * @property string $comment Комментарий
 */
class Technics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'technics';
    }


//    public function getTechGroup ()
//    {
//        return $this->hasOne(TechGroup::className(),['id'=>'tech_group_id']);
//    }
    public function getCharacteristics ()
    {
        return $this->hasOne(Characteristics::className(),['id'=>'tech_group_id']);
    }

    public function getCategory ()
    {
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }

    public function getFirm ()
    {
        return $this->hasOne(Firm::className(),['id'=>'firm_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tech_group_id', 'category_id'], 'required'],
            [['firm_id', 'invent_number'], 'integer'],
            [['name', 'model', 'serial', 'comment'], 'string', 'max' => 255],
            [['params'], 'safe'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tech_group_id' => 'Группа техники',
            'category_id' => 'Подразделение',
            'firm_id' => 'Производитель',
            'name' => 'Наименование',
            'invent_number' => 'Инвентарный номер',
            'model' => 'Модель',
            'serial' => 'Серийный номер',
            'params' => 'Параметры',
            'comment' => 'Комментарий',
        ];
    }
}
