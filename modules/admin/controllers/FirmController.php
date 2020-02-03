<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Firm;
use app\modules\admin\models\FirmSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FirmController implements the CRUD actions for Firm model.
 */
class FirmController extends AppAdminController
{


    /**
     * Lists all Firm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FirmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        Yii::$app->getView()->params['title'] = '<i class="fa fa-list" aria-hidden="true"></i> Производители: список производителей';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Firm model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        Yii::$app->getView()->params['title'] = '<i class="fa fa-search" aria-hidden="true"></i> Просмотр производителя';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Firm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Firm();

        Yii::$app->getView()->params['title'] = '<i class="fa fa-plus-square" aria-hidden="true"></i>Добавить производителя';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Firm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        Yii::$app->getView()->params['title'] = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Обновить производителя: '.$model->name;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Firm model.
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
     * Finds the Firm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Firm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Firm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
