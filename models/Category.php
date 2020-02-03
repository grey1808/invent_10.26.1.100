<?php


namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName ()
    {
        return 'category';
    }

    public function getCategory ()
    {
        return $this->hasOne(Category::className(),['id'=>'parent_id']);
    }
}