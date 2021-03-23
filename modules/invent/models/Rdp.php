<?php

namespace app\modules\invent\models;

use app\modules\admin\models\RdpGroup;
use app\modules\invent\models\Category;
use Yii;
use yii\helpers\ArrayHelper;

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

    public $category;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rdp';
    }

    public function getTechnics ()
    {
        return $this->hasOne(Technics::className(),['id'=>'technics_id']);
    }
    public function getRdpGroup ()
    {
        return $this->hasOne(RdpGroup::className(),['id'=>'rdp_group_id']);
    }

    public function getCategoryall ()
    {
        return $this->hasOne(Category::className(),['id'=>'structure_id']);
    }

    public function getCategoryId() {
        return $this->category->id;
    }

    public static function getRdpList() {
        $parents = RdpGroup::find()->all();
        return ArrayHelper::map($parents, 'id', 'name');
    }

    function getChildrenList(){
        $data = \app\modules\invent\models\Category::find()->all();
        // передаём айди запрошенной категории и массив содержаший все категории
        $res = $this->getIdAllChildrenByParent($this->structure_id, $data);

        if (empty($res)){
            return $this->structure_id;
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
            [['name','structure_id'], 'required'],
            [['structure_id', 'technics_id','vipnet','rdp_group_id'], 'integer'],
            [['name', 'ipaddress','ipaddress2', 'connect_id', 'connect_pass', 'vipnet_name','comment'], 'string', 'max' => 255],
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
            'ipaddress2' => 'ip адрес 2',
            'connect_id' => 'id подключения',
            'connect_pass' => 'Пароль',
            'structure_id' => 'Подразделение',
            'technics_id' => 'Техника',
            'rdp_group_id' => 'Программа',
            'vipnet' => 'VipNet',
            'vipnet_name' => 'Имя пользователя VipNet',
            'comment' => 'Комментарий'
        ];
    }
}
