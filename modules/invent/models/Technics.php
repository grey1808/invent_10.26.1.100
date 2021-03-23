<?php

namespace app\modules\invent\models;

use app\modules\admin\models\User;
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
    public function getModels ()
    {
        return $this->hasOne(Models::className(),['id'=>'model_id']);
    }

    public function getUsercreate() {
        return $this->hasOne(User::className(),['id'=>'create_person_id']);
    }
    public function getUserupdate() {
        return $this->hasOne(User::className(),['id'=>'update_person_id']);
    }

    public static function getModelList() {
        // Выбираем только те категории, у которых есть дочерние категории
        $parents = Models::find()->all();
//        array_unshift($parents,)
//        ArrayHelper::setValue($parents, 'key.in', ['id' => 'null','name'=>'Не указанно','comment' => '']);

        return ArrayHelper::map($parents, 'id', 'name');
    }

    public static function getTechnicssList() {
        $parents = \app\modules\invent\models\Technics::find()->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }



    public function getFullName()
    {
        if(!isset($this->invent_number)){
            return $this->invent_number . ' |' . $this->name;
        }else{
            return  'Нет инвентарного номера | ' . $this->name;
        }
    }

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
    public function rules()
    {
        return [
            [['tech_group_id'], 'required'],
            [['firm_id', 'invent_number','model_id'], 'integer'],
            ['invent_number', 'validateIsInventNumber'],
            [['name', 'model', 'serial', 'comment'], 'string', 'max' => 255],
            [['name', 'model', 'serial','invent_number'], 'trim'],
            [['params', 'category_id', 'create_datetime', 'update_datetime', 'category_id','create_person_id','update_person_id'], 'safe'],
        ];
    }

    public function validateIsInventNumber($attribute)
    {
        $model = Technics::find()->asArray()->all();
        foreach ($model as $item) {
            if($this->attributes['invent_number'] == $item['invent_number'] && $this->attributes['id'] != $item['id']){
                $technic = Technics::find()->where(['invent_number' => $this->attributes['invent_number']])->one();
                $this->addError($attribute, 'Такой инвентарный номер уже существует! '.$technic->name);
            }
        }
    } // проверка на уникальность идентификатора

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
            'model' => 'Модель старая',
            'model_id' => 'Модель',
            'serial' => 'Серийный номер',
            'params' => 'Params',
            'comment' => 'Комментарий',
            'create_person_id' => 'Автор создания',
            'update_person_id' => 'Автор обновления',
        ];
    }
}
