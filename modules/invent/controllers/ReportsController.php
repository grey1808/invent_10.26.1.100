<?php


namespace app\modules\invent\controllers;


use app\modules\invent\models\Models;
use app\modules\invent\models\Technics;
use app\modules\invent\models\TechnicsSearch;
use yii\web\NotFoundHttpException;
use Yii;

class ReportsController extends AppInventController
{

    public $layout = 'main_reports';


    public function actionIndex(){
        return $this->render('index');
    }




    /**
     * Lists all Technics models.
     * @return mixed
     */
    public function actionTechnicsFull($category_id = false)
    {
        $searchModel = new TechnicsSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,(int)$category_id);
        $request = Yii::$app->request->queryParams;
        $session = Yii::$app->session;
        if ($session->isActive) {$session->open();}
        $session->set('request', $request);

            return $this->render('technics-full', [
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

    public function actionPrint($category_id = false){



        $searchModel = new TechnicsSearch();

        $request = Yii::$app->session->get('request');
        Yii::$app->request->queryParams = $request;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,(int)$category_id);
        debug($dataProvider);
        die();

        return $this->render('technics-full', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


}