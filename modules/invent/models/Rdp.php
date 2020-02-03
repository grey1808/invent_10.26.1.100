<?php

namespace app\modules\invent\models;

use app\modules\invent\models\Category;
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

    public function getCategoryall ()
    {
        return $this->hasOne(Category::className(),['id'=>'structure_id']);
    }

    public function getCategoryId() {
        return $this->category->id;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','structure_id'], 'required'],
            [['structure_id', 'technics_id','vipnet'], 'integer'],
            [['name', 'ipaddress', 'connect_id', 'connect_pass', 'vipnet_name','comment'], 'string', 'max' => 255],
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
            'connect_id' => 'id подключения',
            'connect_pass' => 'Пароль',
            'structure_id' => 'Подразделение',
            'technics_id' => 'Техника',
            'vipnet' => 'VipNet',
            'vipnet_name' => 'Имя пользователя VipNet',
            'comment' => 'Комментарий'
        ];
    }
}
