<?php

namespace app\controllers;

use app\models\BikeEventVendorsMapping;
use Yii;
use app\models\Vendor;
use app\models\VendorSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

//use app\models\Userinfo;

/**
 * VendorController implements the CRUD actions for Vendor model.
 */
class VendorController extends Controller
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
			
			'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','update','delete','view'],
                'rules' => [                    
                    [
                        'allow' => true,
                        'actions' => ['index','create','update','delete','view'],
                        'roles' => ['@'],
                        /*
                            'matchCallback' => function ($rule, $action) {
                           return Yii::$app->user->identity->userTypeId==Userinfo::ADMIN_USER_TYPE_ID;
                        },
                        */  
                    ], 
                ],
            ],
			
        ];
    }
    public function actionRenderVendor() {
        $model = new Vendor();

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_new_vendor', [
                'model' => $model,
                'disabled' => false,
            ]);
        }
    }
    public function actionSetVendorValue() {

        if (Yii::$app->request->isAjax) {

            $vendor_id = isset($_POST['vendor_id']) ? $_POST['vendor_id'] : 0;

            $model = Vendor::findOne($vendor_id);

            return $this->renderAjax('_render_vendor_fields', [
                'vendor' => $model,
                'disabled' => false,
            ]);
        }
    }

    /**
     * Lists all Vendor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VendorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vendor model.
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
     * Creates a new Vendor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vendor();

        if ($model->load(Yii::$app->request->post()) && $model->save())
		{
			if(isset($_POST['back_manage']) && ($_POST['back_manage']==1))
			{
					  return $this->redirect(['index']);
			}
			else
			{
				return $this->redirect(['view', 'id' => $model->id]);
			}
        } 
		else
		{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Vendor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save())
		{
			if(isset($_POST['back_manage']) && ($_POST['back_manage']==1))
			{
					  return $this->redirect(['index']);
			}
			else
			{
				return $this->redirect(['view', 'id' => $model->id]);
			}
        }
		else
		{
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDynamicDeleting() {
        if (Yii::$app->request->isAjax && !empty($_POST['event_id'])) {
                $event_id = $_POST['event_id'];
                BikeEventVendorsMapping::deleteAll(['bike_event_id' => $event_id]);
        }
    }

    /**
     * Deletes an existing Vendor model.
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
     * Finds the Vendor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vendor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vendor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
