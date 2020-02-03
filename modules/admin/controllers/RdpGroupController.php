<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\RdpGroup;
use app\modules\admin\models\RdpGroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RdpGroupController implements the CRUD actions for RdpGroup model.
 */
class RdpGroupController extends AppAdminController
{


    /**
     * Lists all RdpGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RdpGroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        Yii::$app->getView()->params['title'] = '<i class="fa fa-list" aria-hidden="true"></i> Группы RDP: список групп';

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RdpGroup model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        Yii::$app->getView()->params['title'] = '<i class="fa fa-search" aria-hidden="true"></i> Просмотр группы';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RdpGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RdpGroup();
        Yii::$app->getView()->params['title'] = '<i class="fa fa-plus-square" aria-hidden="true"></i> Добавить группу';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RdpGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        Yii::$app->getView()->params['title'] = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Обновить группу: '.$model->name;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RdpGroup model.
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
     * Finds the RdpGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RdpGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RdpGroup::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
