<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id Идентификатор
 * @property int $parent_id Родительская структура
 * @property int $code_infis Код инфис
 * @property string $name Наименование
 * @property string $comment Коментарий
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    public function getCategory ()
    {
        return $this->hasOne(Category::className(),['id'=>'parent_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id', 'code_infis'], 'integer'],
            [['name','alias', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'code_infis' => 'Код ИНФИС',
            'name' => 'Наименование подразделения',
            'comment' => 'Комментарий',
        ];
    }
}
