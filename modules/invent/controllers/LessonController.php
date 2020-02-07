<?php


namespace app\modules\invent\controllers;


use app\modules\admin\models\CategoryLess;
use app\modules\invent\models\AccountsSearch;
use app\modules\invent\models\Lesson;
use yii\data\Pagination;

class LessonController extends AppInventController
{
    public function actionIndex()
    {
        $model = new CategoryLess(); // Для виджета меню
        $query = Lesson::find();
        $pages = new Pagination(['totalCount' => $query->count(),'pageSize' => 10]);
        $lesson = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',compact('model','lesson','pages'));
    }

    public function actionView($alias){
        $lesson = Lesson::find()->where(['alias' => $alias])->all();
        $lesson = $lesson[0];
        return $this->render('view',compact('lesson'));
    } // просмотр статьи

    public function actionSearch($q){
        $model = Lesson::find()->
        where(['LIKE', 'name', $q])->
        andWhere(['LIKE', 'content', $q])->all();
        return $this->render('search',compact('model','q'));
    } // Поиск по статьям

    public function actionViewList($id){
        $model = new CategoryLess(); // Для виджета меню
        $query = Lesson::find()->where(['category_less_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(),'pageSize' => 20]);
        $lesson = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',compact('model','lesson','pages'));
    } // Получить все статьи выбранной категории
}