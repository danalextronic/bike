<?php

namespace app\controllers;

use app\models\BikeEventVendorsMapping;
use app\models\BikeEventActivitiesMapping;
use app\models\Store;
use app\models\Userinfo;
use app\models\Vendor;
use app\models\Activities;
use Yii;
use app\models\BikeEvents;
use app\models\BikeeventsSearch;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use app\models\StoreBikeEvents;
use yii\data\SqlDataProvider;
//use app\models\Userinfo;

/**
 * BikeeventsController implements the CRUD actions for BikeEvents model.
 */
class BikeeventsController extends Controller
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

    /**
     * Lists all BikeEvents models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new BikeeventsSearch();
        $queryParams = array_merge(array(),Yii::$app->request->queryParams);
        $queryParams["BikeeventsSearch"]["is_archive"] = 0;

        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BikeEvents model.
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
     * Creates a new BikeEvents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BikeEvents();


        if ($model->load(Yii::$app->request->post())) {
            if (Store::storeCustomValidate($model)) {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            $model->is_changed = $this->setEventStatus($model);

            if ($model->save()) {
                if (Yii::$app->request->post("Vendor")) {
                    $vendors = Yii::$app->request->post("Vendor");
                    BikeEventVendorsMapping::saveEventsVendorsMapping($vendors, $model);
                    Vendor::updateVendorData($vendors);
                }

                if (Yii::$app->request->post("Activity")) {
                    $activities = Yii::$app->request->post("Activity");
                    BikeEventActivitiesMapping::saveEventsActivitiesMapping($activities, $model);
                    Activities::updateActivityData($activities);
                }

                $this->saveStoreBikeEvents($model->StoreIds, $model);
            }

            if (isset($_POST['back_manage']) && ($_POST['back_manage'] == 1)) {
                return $this->redirect(['index']);
            } else {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BikeEvents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $vendors = $model->vendors;
        $activities = $model->activities;

        $arr_StoreIds = StoreBikeEvents::find()->select(['store_id'])->where(['bike_events_id' => $id])->asArray()->all();

        $b_arral = [];
        foreach ($arr_StoreIds as $StoreId => $value) {
            $b_arral[] = ($value['store_id']);
        }

        if ($model->load(Yii::$app->request->post())) {

            if (Store::storeCustomValidate($model)) {
                return $this->render('update', [
                    'model' => $model,
                    'vendors' => $vendors,
                    'activities' => $activities,
                ]);
            }
            $model->is_changed = $this->setEventStatus($model);

            if ($model->save()) {

                if (Yii::$app->request->post("Vendor")) {
                    $vendors = Yii::$app->request->post("Vendor");
                    BikeEventVendorsMapping::deleteAll(['bike_event_id' => $model->id]);
                    BikeEventVendorsMapping::saveEventsVendorsMapping($vendors, $model);
                    Vendor::updateVendorData($vendors);
                }

                if (Yii::$app->request->post("Activity")) {
                    $activities = Yii::$app->request->post("Activity");
                    BikeEventActivitiesMapping::deleteAll(['bike_event_id' => $model->id]);
                    BikeEventActivitiesMapping::saveEventsActivitiesMapping($activities, $model);
                    Activities::updateActivityData($activities);
                }

                StoreBikeEvents::deleteAll(['bike_events_id' => $id]);

                $this->saveStoreBikeEvents($model->StoreIds, $model);
            }
            if (isset($_POST['back_manage']) && ($_POST['back_manage'] == 1)) {
                return $this->redirect(['index']);
            } else {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->StoreIds = $b_arral;
            return $this->render('update', [
                'model' => $model,
                'vendors' => $vendors,
                'activities' => $activities,
            ]);
        }
    }
    private function setEventStatus($model) {

        /*$user_role = Yii::$app->user->identity->userTypeId;
        if ($user_role == Userinfo::ADMIN_USER_TYPE_ID) {
            if ($model->approved == 1 || ($model->approved == 0 && $model->is_changed == 0)) {
                return 0;
            } else {
                return 1; //Isn't has been reviewed
            }
        } else {
            return 1; //If Manager has edited some data
        }*/
        if ($model->approved != 0) {
            return 0;
        }
        return 1;
    }

    private function saveStoreBikeEvents($StoreIds, $model) {
        foreach ($StoreIds as $StoreId) {
            $mdl_StoreBikeEvents = new StoreBikeEvents;
            $mdl_StoreBikeEvents->store_id = $StoreId;
            $mdl_StoreBikeEvents->bike_events_id = $model->id;
            $mdl_StoreBikeEvents->save();
        }

    }

    /**
     * Deletes an existing BikeEvents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        StoreBikeEvents::deleteAll(['bike_events_id' => $id]);
        BikeEventActivitiesMapping::deleteAll(['bike_event_id' => $id]);
        BikeEventVendorsMapping::deleteAll(['bike_event_id' => $id]);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionArchive($id) {
        $model = $this->findModel($id);
        $model->is_archive = true;
        if ($model->save()) {
            return $this->redirect(['archive-list']);
        } else {
            return $this->redirect(['index']);
        }
    }

    public function actionArchiveList() {
        $searchModel = new BikeeventsSearch();

        $queryParams = array_merge(array(),Yii::$app->request->queryParams);
        $queryParams["BikeeventsSearch"]["is_archive"] = 1;

        $dataProvider = $searchModel->search($queryParams);

        return $this->render('archive_list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Finds the BikeEvents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BikeEvents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BikeEvents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
