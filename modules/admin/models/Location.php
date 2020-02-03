<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id Идентификатор
 * @property int $structure_id Местоположение
 * @property int $technics_id id техники
 * @property int $programs_id Утсновленные програмы
 * @property int $invent_number Инвентарный номер
 * @property string $create_datetime Дата создания
 * @property int $update_datetime Дата обновления
 * @property int $user_id Последний изменивший пользователь
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
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
            [['structure_id', 'technics_id', 'invent_number'], 'required'],
            [['structure_id', 'technics_id', 'programs_id', 'invent_number', 'user_id'], 'integer'],
            [['create_datetime', 'update_datetime'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'structure_id' => 'Подразделение',
            'technics_id' => 'Техника',
            'programs_id' => 'Программы',
            'invent_number' => 'Инвентарный номер',
            'create_datetime' => 'Дата создания',
            'update_datetime' => 'Дата обновления',
            'user_id' => 'Автор',
        ];
    }
}
