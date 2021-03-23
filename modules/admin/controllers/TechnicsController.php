<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Characteristics;
use app\modules\admin\models\CharacteristicsComposition;
use app\modules\admin\models\TechGroup;
use Yii;
use app\modules\admin\models\Technics;
use app\modules\admin\models\TechnicsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TechnicsController implements the CRUD actions for Technics model.
 */
class TechnicsController extends AppAdminController
{


    /**
     * Lists all Technics models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TechnicsSearch();
        Yii::$app->getView()->params['title'] = '<i class="fa fa-list" aria-hidden="true"></i> Техника: список техники';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Technics model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        Yii::$app->getView()->params['title'] = '<i class="fa fa-search" aria-hidden="true"></i> Просмотр техники';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Technics model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Technics();
        Yii::$app->getView()->params['title'] = '<i class="fa fa-plus-square" aria-hidden="true"></i>Добавить единицу техники';
        if ($model->load(Yii::$app->request->post())) {
            $model->create_person_id = Yii::$app->user->identity->getId();
            $model->create_datetime = date('Y-m-d H:s');
            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Technics model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        Yii::$app->getView()->params['title'] = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Обновить единицу техники: '.$model->name;

        if ($model->load(Yii::$app->request->post())) {
            $model->update_person_id = Yii::$app->user->identity->getId();
            $model->update_datetime = date('Y-m-d H:s');
            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Technics model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Technics model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Technics the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Technics::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionComp($id){
//        $techgroup = TechGroup::find($id)->one();
        $model = CharacteristicsComposition::find()->where('characteristics_id = :id', [':id' => $id])->asArray()->all();
        return json_encode($model);
    }
}
