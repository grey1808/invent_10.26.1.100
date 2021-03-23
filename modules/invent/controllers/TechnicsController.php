<?php

namespace app\modules\invent\controllers;

use app\modules\invent\controllers\AppInventController;
use app\modules\invent\models\Firm;
use app\modules\invent\models\Models;
use Yii;
use app\modules\invent\models\Technics;
use app\modules\invent\models\TechnicsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TechnicsController implements the CRUD actions for Technics model.
 */
class TechnicsController extends AppInventController
{


    /**
     * Lists all Technics models.
     * @return mixed
     */
    public function actionIndex($category_id = false)
    {
        $searchModel = new TechnicsSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,(int)$category_id);

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


    public function actionMove($id)
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

    public function actionAutocomplete(){
        $id = Yii::$app->request->post('firm_id');
        $model = Models::find()->where(['firm_id'=>$id])->all();
        $result = '<option value="">Выберите параметр</option>';
        foreach ($model as $item){
            $result .= "<option value='$item->id'>$item->name</option>";
        }
        return json_encode($result);
    }

}
