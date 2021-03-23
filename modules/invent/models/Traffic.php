<?php

namespace app\modules\invent\models;

use Yii;

/**
 * This is the model class for table "traffic".
 *
 * @property int $id
 * @property string $datetime
 * @property int $person_id
 * @property int $technics_id
 * @property int $category_id_old
 * @property int $category_id_new
 * @property int $status
 */
class Traffic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'traffic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime'], 'safe'],
            [['person_id', 'technics_id', 'category_id_old', 'category_id_new', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'datetime' => 'Datetime',
            'person_id' => 'Person ID',
            'technics_id' => 'Technics ID',
            'category_id_old' => 'Category Id Old',
            'category_id_new' => 'Category Id New',
            'status' => 'Status',
        ];
    }
}
