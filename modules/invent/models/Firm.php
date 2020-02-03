<?php

namespace app\modules\invent\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "firm".
 *
 * @property int $id Идентификатор
 * @property string $name Наименование
 * @property string $comment Комментарий
 */
class Firm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'firm';
    }

    public static function getFirmList() {
        // Выбираем только те категории, у которых есть дочерние категории
        $parents = Firm::find()->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'comment'], 'required'],
            [['name', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'comment' => 'Comment',
        ];
    }
}
