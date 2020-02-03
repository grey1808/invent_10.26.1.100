<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "token".
 *
 * @property int $id Идентификатор
 * @property int $token_group_id Группа токена
 * @property string $fullname Владелец 
 * @property string $startdate Дата начала действия
 * @property string $enddate Дата окончания действия
 * @property string $token_nubmer Номер токена
 * @property int $user_id Последний изменивший пользователь
 * @property string $comment Комментарий
 */
class Token extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'token';
    }

    public function getGroupToken ()
    {
        return $this->hasOne(TokenGroup::className(),['id'=>'token_group_id']);
    }

    public static function getTokenGroupList() {
        $parents = \app\modules\admin\models\TokenGroup::find()->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['token_group_id', 'fullname', 'startdate', 'enddate'], 'required'],
            [['token_group_id', 'user_id'], 'integer'],
            [['startdate', 'enddate'], 'safe'],
            [['fullname', 'token_nubmer', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token_group_id' => 'Группа',
            'fullname' => 'Имя',
            'startdate' => 'Дата начала',
            'enddate' => 'Дата окончания',
            'token_nubmer' => 'Номер',
            'user_id' => 'Пользователь',
            'comment' => 'Комментарий',
        ];
    }
}
