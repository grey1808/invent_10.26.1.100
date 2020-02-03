<?php


namespace app\modules\admin\controllers;
use Yii;
use app\modules\admin\models\Characteristics;
use app\modules\admin\models\CharacteristicsComposition;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class CharacteristicsDinamController1 extends AppAdminController
{
//    /**
//     * @inheritdoc
//     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['create', 'update', 'delete'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ]
//        ];
//    }

    /**
     * Update all addresses
     * @param Model $items
     * @return nothing
     */
    protected function batchUpdate($items)
    {
        if (Model::loadMultiple($items, Yii::$app->request->post()) &&
            Model::validateMultiple($items)) {
            foreach ($items as $key => $item) {
                $item->save();
            }
        }
    }

    /**
     * Finds the Addresses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CharacteristicsComposition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CharacteristicsComposition::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Characteristics the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findCharacteristics($id)
    {
        if (($model = Characteristics::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpdate($characteristicsId)
    {
        $characteristics = $this->findCharacteristics($characteristicsId);
        $this->batchUpdate($characteristics->name);
        return $this->renderAjax('_composition', ['model' => $characteristics]);
    }

    /**
     * action call by AJAX to create new fake address
     * @param  integer $сharacteristicsId
     * @return mixed
     */
    public function actionCreate($сharacteristicsId)
    {
        $characteristics = $this->findCharacteristics($сharacteristicsId);
        $model = new CharacteristicsComposition();
        $model->addOne();
//        $characteristics->link('characteristics-composition', $model); // link сохраняет в базу данных без валидации, будьте осторожны
        return $this->renderAjax('_composition', ['model' => $model]);
//        return $this->renderFile('@app\views\characteristics\_composition', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $user = $model->name;
        $model->delete();
        return $this->renderAjax('_composition', ['model' => $user]);
    }

}