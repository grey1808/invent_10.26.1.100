<?php


namespace app\modules\invent\controllers;


use app\components\AccessRule;
use app\models\User;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\filters\AccessControl;

class AppInventController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'controllers' => ['invent/technics','invent/rdp','invent/servers','invent/accounts','invent/token','invent/lesson','invent/models','invent/reports'],
                        'matchCallback' => function($rule, $action){
                            return \Yii::$app->user->identity->user_group_id === 1;
                        },
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['invent/technics','invent/lesson','invent/models'],
                        'matchCallback' => function($rule, $action){
                            return \Yii::$app->user->identity->user_group_id === 2;
                        },
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['invent/lesson'],
                        'matchCallback' => function($rule, $action){
                            return \Yii::$app->user->identity->user_group_id === 3;
                        },
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    static public function getTranslit($str) {
        $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', ' ');
        $lat = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', '_');
        return str_replace($rus, $lat, $str);
    }
}