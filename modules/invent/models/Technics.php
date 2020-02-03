<?php

namespace app\modules\invent\models;

use app\modules\invent\models\Category;
use app\modules\invent\models\Characteristics;
use app\modules\invent\models\Firm;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "technics".
 *
 * @property int $id Идентификатор
 * @property int $tech_group_id Группа техники
 * @property int $category_id Родительская категория
 * @property int $firm_id Производитель
 * @property string $name Наименование техники
 * @property string $invent_number Инвентарный номер
 * @property string $model Модель техники
 * @property string $serial Серийный номер
 * @property string $params
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

    public static function getTechnicssList() {
        $parents = \app\modules\invent\models\Technics::find()->all();

        return ArrayHelper::map($parents, 'id', 'name');
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
            'tech_group_id' => 'Группа',
            'category_id' => 'Структура',
            'firm_id' => 'Производитель',
            'name' => 'Наименование',
            'invent_number' => 'Инвентарный номер',
            'model' => 'Модель',
            'serial' => 'Серийный номер',
            'params' => 'Params',
            'comment' => 'Комментарий',
        ];
    }
}
