<?php

namespace app\controllers;

use app\models\PercentOff;
use Yii;
use app\models\DealBrand;
use app\models\DealsBrandSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DealsBrandController implements the CRUD actions for DealBrand model.
 */
class DealsBrandController extends Controller
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
     * Lists all DealBrand models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DealsBrandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DealBrand model.
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
     * Creates a new DealBrand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DealBrand();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Deal_Brand_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DealBrand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Deal_Brand_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DealBrand model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionRenderBrand() {
        $model = new DealBrand();
        $percentOffModel = new PercentOff();
        $counter = $_POST['counter'];
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_render_brand_fields', [
                'model' => $model,
                'percent_off' => $percentOffModel,
                'counter' => $counter,
            ]);
        }
    }
    public function actionRenderExistingBrand() {
        $model = new DealBrand();

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_new_existing_brand', [
                'model' => $model
            ]);
        }
    }

    public function actionSetBrandValue() {

        if (Yii::$app->request->isAjax) {

            $brand_id = isset($_POST['brand_id']) ? $_POST['brand_id'] : 0;
            $counter = $_POST['counter'];

            $model = DealBrand::findOne($brand_id);

            return $this->renderAjax('_render_brand_fields', [
                'model' => $model,
                'counter' => $counter,
            ]);
        }
    }

    /**
     * Finds the DealBrand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DealBrand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DealBrand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
