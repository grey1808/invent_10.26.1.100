<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property int $user_id_create
 * @property int $user_id_update
 * @property string $date_create
 * @property string $date_update
 * @property string $comment
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }


    public function getCategoryLess ()
    {
        return $this->hasOne(CategoryLess::className(),['id'=>'category_less_id']);
    }

    public static function getParentsList() {
        $parents = \app\modules\admin\models\CategoryLess::find()->all();
        return ArrayHelper::map($parents, 'id', 'name');
    }

    public function getUserCreate ()
    {
        return $this->hasOne(User::className(),['id'=>'user_id_create']);
    }
    public static function getUserList() {
        $parents = \app\modules\admin\models\User::find()->all();

        return ArrayHelper::map($parents, 'id', 'username');
    }
    public function getUserUpdate ()
    {
        return $this->hasOne(User::className(),['id'=>'user_id_update']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['user_id_create', 'user_id_update','category_less_id'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
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
            'category_less_id' => 'Категория',
            'name' => 'Имя',
            'content' => 'Статья',
            'user_id_create' => 'Автор',
            'user_id_update' => 'Автор последнего изменения',
            'date_create' => 'Дата создания',
            'date_update' => 'Дата обновления',
            'comment' => 'Комментарий',
        ];
    }
}
