<?php

namespace app\controllers;

use Yii;
use app\models\InStoreDeal;
use app\models\InStoreDealSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

//use app\models\Userinfo;

/**
 * InstoredealController implements the CRUD actions for InStoreDeal model.
 */
class InstoredealController extends Controller
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
     * Lists all InStoreDeal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InStoreDealSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InStoreDeal model.
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
     * Creates a new InStoreDeal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InStoreDeal();

        if ($model->load(Yii::$app->request->post()) && $model->save())
		{
			if(isset($_POST['back_manage']) && ($_POST['back_manage']==1))
			{
					  return $this->redirect(['index']);
			}
			else
			{
				return $this->redirect(['view', 'id' => $model->In_Store_Deal_ID]);
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
     * Updates an existing InStoreDeal model.
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
				return $this->redirect(['view', 'id' => $model->In_Store_Deal_ID]);
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
     * Deletes an existing InStoreDeal model.
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
     * Finds the InStoreDeal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InStoreDeal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InStoreDeal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
