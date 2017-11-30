<?php

namespace app\controllers;

use Yii;
use app\models\Db2Riders;
use app\models\Db2RidersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\data\SqlDataProvider;
/**
 * Db2ridersController implements the CRUD actions for Db2Riders model.
 */
class Db2ridersController extends Controller
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
                    ], 
                ],
            ],
			
        ];
    }

    /**
     * Lists all Db2Riders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Db2RidersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Db2Riders model.
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
     * Creates a new Db2Riders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Db2Riders();

        if ($model->load(Yii::$app->request->post()) && $model->save())
		{
			if(isset($_POST['back_manage']) && ($_POST['back_manage']==1))
			{
					  return $this->redirect(['index']);
			}
			else
			{
				return $this->redirect(['view', 'id' => $model->Riders_ID]);
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
     * Updates an existing Db2Riders model.
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
				return $this->redirect(['view', 'id' => $model->Riders_ID]);
			}
        }
		else
		{
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Db2Riders model.
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
     * Finds the Db2Riders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Db2Riders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Db2Riders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionMissingemail()
    {
       
        $count = Yii::$app->db->createCommand('SELECT count(*) FROM db_2_riders JOIN db_2_coupon_issued_date
          ON db_2_riders.`Riders_ID`=db_2_coupon_issued_date.`Riders_ID`
        WHERE  
           Email_Address IS NULL AND Last_Update > DATE_ADD(NOW(),INTERVAL -15 DAY)', [':status' => 1])->queryScalar();


        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT * FROM db_2_riders JOIN db_2_coupon_issued_date
          ON db_2_riders.`Riders_ID`=db_2_coupon_issued_date.`Riders_ID`
        WHERE  
           Email_Address IS NULL AND Last_Update > DATE_ADD(NOW(),INTERVAL -15 DAY)',
           
        'totalCount'=>intval($count),

         'pagination' => [
                'pageSize' => 100,
            ],
        ]
            );


        return $this->render('missingEmail', [
                'dataProvider' => $dataProvider,
            ]);
    }

    public function actionImportresultsdoublecheck()
    {
                   // Import_Results_Double_Check

                    $count = Yii::$app->db->createCommand('SELECT * FROM db_2_results_enter_date
            JOIN db_2_riders
            ON db_2_results_enter_date.`Riders_ID`=db_2_riders.`Riders_ID`
            WHERE db_2_results_enter_date.`Rider_Name`!=db_2_riders.`Rider_Name`
            AND Results_Added=0', [':status' => 1])->queryScalar();


                    $dataProvider = new SqlDataProvider([
                        'sql' => 'SELECT * FROM db_2_results_enter_date
            JOIN db_2_riders
            ON db_2_results_enter_date.`Riders_ID`=db_2_riders.`Riders_ID`
            WHERE db_2_results_enter_date.`Rider_Name`!=db_2_riders.`Rider_Name`
            AND Results_Added=0',
                       
                    'totalCount'=>intval($count),

                     'pagination' => [
                            'pageSize' => 100,
                        ],
                    ]
                        );


                    return $this->render('Import_Results_Double_Check', [
                            'dataProvider' => $dataProvider,
                        ]);
    }

    public function actionRidersupportsignupform()
    {
        $model = new Db2Riders;

        $model->MSF_Expiration = Yii::$app->mycomponent->myDate($model->MSF_Expiration);
        
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            \Yii::$app->session->setFlash('success','Complete successfully.');
            $model = new Db2Riders;           
        }

          return $this->render('riderSupportSignupForm', [
                            'model' => $model,
                        ]);

    }

    public function actionCoachsignupform()
    {
        $model = new Db2Riders;

        $model->MSF_Expiration = Yii::$app->mycomponent->myDate($model->MSF_Expiration);

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            \Yii::$app->session->setFlash('success','Complete successfully.');
            $model = new Db2Riders;
        }

        return $this->render('coachSignupForm', [
            'model' => $model,
        ]);

    }
}
