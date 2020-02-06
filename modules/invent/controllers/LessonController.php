<?php


namespace app\modules\invent\controllers;


use app\modules\admin\models\CategoryLess;
use app\modules\invent\models\AccountsSearch;
use app\modules\invent\models\Lesson;

class LessonController extends AppInventController
{
    public function actionIndex()
    {
        $model = new CategoryLess();
        $lesson = Lesson::find()->all();
//        debug($lesson);
//        die();
        return $this->render('index',compact('model','lesson'));
    }
    public function actionView($id){
        $lesson = Lesson::findOne($id);
        $model = new CategoryLess();
        return $this->render('index',compact('model','lesson'));
    }
}