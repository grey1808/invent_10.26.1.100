<?php

namespace app\modules\admin\models;

use app\modules\invent\models\Firm;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "models".
 *
 * @property int $id
 * @property int $firm_id Производитель
 * @property int $name
 * @property int $comment
 */
class Models extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'models';
    }

    public function getFirm ()
    {
        return $this->hasOne(Firm::className(),['id'=>'firm_id']);
    }

    public static function getFirmList() {
        $parents = Firm::find()->all();
        return ArrayHelper::map($parents, 'id', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firm_id', 'name',], 'required'],
            [['firm_id'], 'integer'],
            [['comment', 'name'], 'string'],
            [['create_datetime', 'update_datetime', 'create_person_id', 'update_person_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'firm_id' => 'Производитель',
            'name' => 'Наименование модели',
            'comment' => 'Коментарий',
        ];
    }
}
