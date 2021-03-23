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


    public function getTechGroup ()
    {
        return $this->hasOne(TechGroup::className(),['id'=>'tech_group_id']);
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


    public function getFullName()
    {
        if(!$this->invent_number == ''){
            return $this->invent_number . ' | ' . $this->name;
        }else{
            return  'Нет номера | ' . $this->name;
        }
    }


    public function getUsercreate() {
        return $this->hasOne(User::className(),['id'=>'create_person_id']);
    }
    public function getUserupdate() {
        return $this->hasOne(User::className(),['id'=>'update_person_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tech_group_id', 'category_id'], 'required'],
            [['firm_id', 'invent_number','model_id','create_person_id','update_person_id'], 'integer'],
            ['invent_number', 'validateIsInventNumber'],
            [['name', 'model', 'serial', 'comment'], 'string', 'max' => 255],
            [['params', 'category_id', 'create_datetime', 'update_datetime', 'create_person_id','update_person_id'], 'safe'],

        ];
    }
    public function validateIsInventNumber($attribute, $params)
    {
        $model = \app\modules\admin\models\Technics::find()->asArray()->all();
//        foreach ($model as $item) {
//            $array[] = $item['invent_number'];
//        }
//        if (!in_array($this->attributes,$array)) {
//            $technic = Technics::find()->where('invent_number',$this->attributes)->one();
//            return $this->addError($attribute, 'Такой инвентарный номер уже существует! '.$technic->name);
//        }

//        $technic = Technics::find()->where('invent_number',$this->attributes)->one();
//        return $this->addError($attribute, 'Такой инвентарный номер уже существует! '.$technic->name);


//        $model = \app\modules\invent\models\Technics::find()->asArray()->all();
        foreach ($model as $item) {
            if($this->attributes['invent_number'] == $item['invent_number'] && $this->attributes['id'] != $item['id']){
                $technic = Technics::find()->where(['invent_number' => $this->attributes['invent_number']])->one();
                $this->addError($attribute, 'Такой инвентарный номер уже существует! '.$technic->name);
            }
        }
    } // проверка на уникальность идентификатора



    function getChildrenList(){
        $data = \app\modules\invent\models\Category::find()->all();
        // передаём айди запрошенной категории и массив содержаший все категории
        $res = $this->getIdAllChildrenByParent($this->category_id, $data);

        if (empty($res)){
            return $this->category_id;
        }
        $res = explode( ',', $res );
        return $res;
    } // Получение дочерних элементов
    function getIdAllChildrenByParent($catId, $rsCategories) {

        // создаём массив для хранения айдишников дочерних категорий
        $arrIdChildCats = array();

        // сохраняем айдишники дочерних категорий в массив
        foreach($rsCategories as $value) {
            if($value['parent_id'] == $catId) {
                $arrIdChildCats[] = $value['id'];
            }
        }

        // найденные айдишники записываем в строку и проходимся
        // по каждому из них нашей функцией, чтобы найти ещё дочерние категории
        $result = '';
        foreach($arrIdChildCats as $value) {
            $result .= "{$value}, ";
            $result .= $this->getIdAllChildrenByParent($value, $rsCategories);
        }

        return $result;

    } // Фенкция получения дочерних элементов переданного массива


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
            'model_id' => 'Модель2',
            'serial' => 'Серийный номер',
            'params' => 'Параметры',
            'comment' => 'Комментарий',
            'create_person_id' => 'Автор создания',
            'update_person_id' => 'Автор обновления',
        ];
    }

}
