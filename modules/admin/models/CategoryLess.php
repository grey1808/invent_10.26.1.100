<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category_less".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $comment
 */
class CategoryLess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_less';
    }

    public function getCategory ()
    {
        return $this->hasOne(CategoryLess::className(),['id'=>'parent_id']);
    }

    public static function getParentsList() {
        $parents = \app\modules\admin\models\CategoryLess::find()->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
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
            'parent_id' => 'Родитель',
            'name' => 'Имя',
            'comment' => 'Комментарий',
        ];
    }
}
