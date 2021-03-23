<?php


namespace app\modules\invent\models;


use yii\db\ActiveRecord;

class Position extends ActiveRecord
{
    public static function tableName()
    {
        return 'position';
    }
}