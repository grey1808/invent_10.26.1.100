<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Rdp;
use app\modules\admin\models\RdpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RdpController implements the CRUD actions for Rdp model.
 */
class RdpController extends AppAdminController
{


    /**
     * Lists all Rdp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RdpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        Yii::$app->getView()->params['title'] = '<i class="fa fa-list" aria-hidden="true"></i> Локации: список RDP';

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rdp model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        Yii::$app->getView()->params['title'] = '<i class="fa fa-search" aria-hidden="true"></i> Просмотр RDP';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Rdp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rdp();
        Yii::$app->getView()->params['title'] = '<i class="fa fa-plus-square" aria-hidden="true"></i>Добавить RDP';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Rdp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        Yii::$app->getView()->params['title'] = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Обновить RDP: '.$model->name;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rdp model.
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
     * Finds the Rdp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rdp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rdp::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
