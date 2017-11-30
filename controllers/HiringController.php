<?php

namespace app\controllers;


use app\models\BikeEvents;
use app\models\HiringStoresMapping;
use app\models\HiringPositions;
use Yii;
use app\models\Hiring;
use app\models\HiringSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kartik\widgets\DepDrop;

//use app\models\Userinfo;

/**
 * HiringController implements the CRUD actions for Hiring model.
 */
class HiringController extends Controller
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
                'only' => ['index', 'create', 'update', 'delete', 'view'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'delete', 'view'],
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
     * Lists all Hiring models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HiringSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hiring model.
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
     * Creates a new Hiring model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hiring();

        if ($model->load(Yii::$app->request->post())) {
            $bike_event = BikeEvents::find()->select(['start_date'])->where(['id'=>$model['bike_events_id']])->one();
            $model->date = $bike_event['start_date'];
            if ($model->save()) {
                if (isset($_POST['Hiring'])) {
                    $hiring = $_POST['Hiring'];
                    $positions = $_POST['Position'] ? $_POST['Position'] : [];
                    $this->saveHiringStoresMapping($model, $hiring, $positions);
                }


                if (isset($_POST['back_manage']) && ($_POST['back_manage'] == 1)) {
                    return $this->redirect(['index']);
                } else {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Hiring model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->StoreIds = HiringStoresMapping::getHiringStores($model->id);
        $app_store = is_array($model->StoreIds) ? $model->StoreIds[0] : $model->StoreIds;
        $positions = HiringStoresMapping::find()->where(['stores_id'=>$app_store])->joinWith('hiringPositions')->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $hiring = $_POST['Hiring'] ? $_POST['Hiring'] : [];
            $positions = $_POST['Position'] ? $_POST['Position'] : [];
            if(Yii::$app->request->post("Position")) {
                HiringStoresMapping::deleteAll(['hiring_id' => $model->id]);
                $this->saveHiringStoresMapping($model, $hiring, $positions);
            } else {
                HiringStoresMapping::deleteAll(['hiring_id' => $model->id]);
            }

            if (isset($_POST['back_manage']) && ($_POST['back_manage'] == 1)) {
                return $this->redirect(['index']);
            } else {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'positions' => $positions,
            ]);
        }
    }

    public function actionDepStores() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $event_id = $parents[0];
                $model = BikeEvents::findOne($event_id);

                foreach ($model->stores as $store) {
                    $out [] = ['id' => $store->Store_ID, 'name' => $store->Store_Name];
                }

                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    private function saveHiringStoresMapping($model, $hiring, $positions) {
        $StoreIds = $hiring['StoreIds'];
        foreach ($positions as $position) {
            $HiringPosition = new HiringPositions();
            $HiringPosition->name = $position['position_name'];
            $HiringPosition->link = $position['position_link'];
            foreach ($StoreIds as $StoreId)
            {
                $HiringStoresMapping = new HiringStoresMapping();
                $HiringStoresMapping->hiring_id = $model->id;
                $HiringStoresMapping->stores_id = $StoreId;
                if ($HiringPosition->save()) {
                    $HiringStoresMapping->hiring_position_id = $HiringPosition->id;
                }
                $HiringStoresMapping->save();
            }
        }



    }
    /**
     * Deletes an existing Hiring model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        HiringStoresMapping::deleteAll(['hiring_id' => $id]);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hiring model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hiring the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hiring::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
