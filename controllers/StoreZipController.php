<?php

namespace app\controllers;

use Yii;
use app\models\StoreZip;
use app\models\StoreZipSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StoreZipController implements the CRUD actions for StoreZip model.
 */
class StoreZipController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all StoreZip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StoreZipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StoreZip model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new StoreZip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StoreZip();

        if ($model->load(Yii::$app->request->post())) {

            $model->id = self::saveStoreZipCodes($model);

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    private function saveStoreZipCodes($model) {
        $zipcodes = explode(",", $model->zipcode);
        $last_id = '';
        foreach ($zipcodes as $zipcode) {
            $newZip = new StoreZip();
            $newZip->store_id = $model->store_id;
            $newZip->zipcode = trim($zipcode);
            $newZip->save();
            $last_id = $newZip->id;
        }
        return $last_id;
    }
    private function deleteStoreZipCodes($store_id) {
        StoreZip::deleteAll(['store_id' => $store_id]);
    }
    /**
     * Updates an existing StoreZip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->zipcode = implode(",", StoreZip::getAllZipCodesByStoreId($model->store_id));

        if ($model->load(Yii::$app->request->post())) {
            self::deleteStoreZipCodes($model->store_id);
            $model->id = self::saveStoreZipCodes($model);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StoreZip model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StoreZip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StoreZip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StoreZip::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
