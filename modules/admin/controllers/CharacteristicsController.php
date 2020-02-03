<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\CharacteristicsComposition;
use Yii;
use app\modules\admin\models\Characteristics;
use app\modules\admin\models\CharacteristicsSearch;
use yii\base\Model;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CharacteristicsController implements the CRUD actions for Characteristics model.
 */
class CharacteristicsController extends AppAdminController
{
    /**
     * Lists all Characteristics models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CharacteristicsSearch();
        Yii::$app->getView()->params['title'] = '<i class="fa fa-list" aria-hidden="true"></i> Характеристики: список характеристик';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Characteristics model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        Yii::$app->getView()->params['title'] = '<i class="fa fa-search" aria-hidden="true"></i> Просмотр характеристики';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Characteristics model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Characteristics();
        Yii::$app->getView()->params['title'] = '<i class="fa fa-plus-square" aria-hidden="true"></i>Добавить характеристику';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Characteristics model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        Yii::$app->getView()->params['title'] = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Обновить характеристику: '.$model->name;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Characteristics model.
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
     * Finds the Characteristics model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Characteristics the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Characteristics::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSavecreate()
    {

        $model = new Characteristics();

        if ($model->load(Yii::$app->request->post())&&$model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Характеристика № {$model->id} добавлена");
                return $this->redirect('create');
            }
        } else {

            return $this->render('create', compact('model')

            );
        }
    }

    public function actionUpdatecreate($id)
    {
        $model = $this->findModel($id);
        Yii::$app->getView()->params['title'] = '<i class="glyphicon glyphicon-edit"></i> Характеристика: изменить характеристику - '.$model->name;
        if ($model->load(Yii::$app->request->post())&&$model->validate()){
            if ($model->save()){
                return $this->redirect(['create']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    public function actionUpdateout($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $model = $this->findModel($id);
        Yii::$app->getView()->params['title'] = '<i class="glyphicon glyphicon-edit"></i> Характеристика: изменить характеристику - '.$model->name;
        if ($model->load(Yii::$app->request->post())&&$model->validate()){
            if ($model->save()){
                return $this->redirect($session['url']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }


/************************************************************************************************************/

    /**
     * Update all addresses
     * @param Model $items
     * @return nothing
     */
    protected function batchUpdate($items)
    {
//        var_dump($items);

        if (Model::loadMultiple($items, Yii::$app->request->post()) && Model::validateMultiple($items)) {
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
    protected function findModelDinam($id)
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

    public function actionUpdateDinam($id)
    {
        $characteristics = $this->findCharacteristics($id);

        if (Yii::$app->request->isPjax) {
            $this->batchUpdate($characteristics->characteristicsComposition);

            $model = $this->findModel($id);
            Yii::$app->getView()->params['title'] = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Обновить характеристику: '.$model->name;
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * action call by AJAX to create new fake address
     * @param  integer $сharacteristicsId
     * @return mixed
     */
    public function actionCreateDinam($id,$modelid)
    {
        $characteristics = $this->findCharacteristics($id);
        $this->batchUpdate($characteristics->characteristicsComposition);
        $model = new CharacteristicsComposition();
        $model->addOne($modelid);
        $model->link('characteristics', $characteristics); // link сохраняет в базу данных без валидации, будьте осторожны
        $model = $this->findModel($modelid);
        Yii::$app->getView()->params['title'] = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Обновить характеристику: '.$model->name;
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDeleteDinam($id,$modelid)
    {
        $model = $this->findModelDinam($id);
        $user = $model->name;
        $model->delete();
        $model = $this->findModel($modelid);
        Yii::$app->getView()->params['title'] = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Обновить характеристику: '.$model->name;

//        return $this->redirect(Url::to([
//            'update','id'=>$modelid
//        ]));

        return $this->render('update', [
            'model' => $model,
        ]);
//        return $this->renderAjax('update', ['model' => $user]);
    }




}
