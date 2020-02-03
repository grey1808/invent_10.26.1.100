<?php

namespace app\modules\invent\models;

use app\modules\admin\models\Category;
use app\modules\admin\models\Technics;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "servers".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $ipaddress_close
 * @property int $ipaddress_free
 * @property int $technics_id
 * @property string $comment
 */
class Servers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servers';
    }

    public function getServer ()
    {
        return $this->hasOne(Servers::className(),['id'=>'parent_id']);
    }

    public function getTechnics ()
    {
        return $this->hasOne(Technics::className(),['id'=>'technics_id']);
    }

    public static function getParentsList() {
        $parents = \app\modules\invent\models\Servers::find()->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'technics_id'], 'integer'],
            [['name', 'ipaddress_free', 'ipaddress_close', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родитель',
            'name' => 'Имя',
            'ipaddress_close' => 'ip закрытый',
            'ipaddress_free' => 'ip открытый',
            'technics_id' => 'Техника',
            'comment' => 'Комментарий',
        ];
    }
}
