<?php

namespace app\modules\invent\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id Идентификатор
 * @property int $parent_id Родительская структура
 * @property int $code_infis Код инфис
 * @property string $name Наименование
 * @property string $alias Алиас
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'name', 'alias', 'comment'], 'required'],
            [['parent_id', 'code_infis'], 'integer'],
            [['name', 'alias', 'comment'], 'string', 'max' => 255],
        ];
    }

    /* Геттер для массива значение категорий */
    public static function getParentsList() {
        $parents = Category::find()->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }
    /* Геттер для массива значение категорий */

    public function getParentId(){

    }


    public static function getParentsListSelect() {
        $parents = Category::find()->all();
        $parents = \app\components\MenuWidget::widget(['tpl' => 'select_filter', 'model' => $parents]);
        $parents = '
                    <select class="form-control" name="TechnicsSearch[category_id]">
                        <option></option>

        ';
        $parents .= \app\components\MenuWidget::widget(['tpl' => 'select_filter', 'model' => $parents]).'</select>';

        return $parents;
    }

    public static function getParentsList2()
    {
        // Выбираем только те категории, у которых есть дочерние категории
        $parents = Category::find()
            ->select(['c.id', 'c.name'])
            ->join('JOIN', 'category c', 'category.parent_id = c.id')
            ->distinct(true)
            ->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'code_infis' => 'Code Infis',
            'name' => 'Name',
            'alias' => 'Alias',
            'comment' => 'Comment',
        ];
    }
}
