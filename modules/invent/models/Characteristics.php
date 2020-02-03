<?php

namespace app\modules\invent\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "characteristics".
 *
 * @property int $id Идентификатор
 * @property string $name Наименование
 * @property int $type_id Тип
 * @property string $comment Комментарий
 */
class Characteristics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'characteristics';
    }

    public static function getCharacteristicsList() {
        // Выбираем только те категории, у которых есть дочерние категории
        $parents = Characteristics::find()->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type_id', 'comment'], 'required'],
            [['type_id'], 'integer'],
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
            'type_id' => 'Type ID',
            'comment' => 'Comment',
        ];
    }
}
