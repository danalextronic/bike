<?php

namespace app\controllers;

use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use Yii;
use app\models\Userinfo;
use app\models\UserinfoSearch;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UserinfoController implements the CRUD actions for Userinfo model.
 */
class UserinfoController extends Controller
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
     * Lists all Userinfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserinfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Userinfo model.
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
     * Creates a new Userinfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userinfo();

        $model->scenario = 'insert';

        if ($model->load(Yii::$app->request->post()))
        {
            $model->auth_key = Yii::$app->getSecurity()->generateRandomString();
            $model->password_reset_token = Yii::$app->getSecurity()->generateRandomString().'_'.time();

            $model->createdBy = Yii::$app->user->identity->id;
            $model->createdOn = new \yii\db\Expression('UTC_TIMESTAMP()');
            $model->createdIP = trim($_SERVER['REMOTE_ADDR']);

            $model->password = sha1($model->password);
            $model->confirm_password = sha1($model->confirm_password);

            if($model->save())
            {
                if(isset($_POST['back_manage']) && ($_POST['back_manage']==1))
                {
                          return $this->redirect(['index']);
                }
                else
                {
                    return $this->redirect(['view', 'id' => $model->userId]);
                }
            }
            else {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
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
     * Updates an existing Userinfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()))
        {
            $model->password = sha1($model->password);
            $model->confirm_password = sha1($model->confirm_password);

            $model->lastEditedBy = Yii::$app->user->identity->id;
            $model->lastEditedOn = new \yii\db\Expression('UTC_TIMESTAMP()');
            $model->lastEditedIP = trim($_SERVER['REMOTE_ADDR']);

            if($model->save())
            {
                if(isset($_POST['back_manage']) && ($_POST['back_manage']==1))
                {
                          return $this->redirect(['index']);
                }
                else
                {
                    return $this->redirect(['view', 'id' => $model->userId]);
                }
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
     * Deletes an existing Userinfo model.
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
     * Finds the Userinfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Userinfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userinfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionChangepassword()
    {
        $id = Yii::$app->user->identity->id;
        $model = $this->findModel($id);
        $model->scenario = 'changePassword';       

        if ($model->load(Yii::$app->request->post())) 
        {           
            if($model->validate())
            {
                if($model->password == sha1(trim($model->old_password)))
                {                   
                   
                        $model->new_password = sha1($model->new_password);
                        $model->confirm_new_password = sha1($model->confirm_new_password);
                        
                        if($model->new_password == $model->confirm_new_password)
                        {
                            $model->password = $model->confirm_new_password;

                            $model->lastEditedBy = Yii::$app->user->identity->id;
                            $model->lastEditedOn = new \yii\db\Expression('UTC_TIMESTAMP()');
                            $model->lastEditedIP = trim($_SERVER['REMOTE_ADDR']);                                       

                            if($model->save())
                            {
                                \Yii::$app->session->setFlash('success','Password changed successfully.');
                            }
                        }
                }
                else
                {
                    \Yii::$app->session->setFlash('danger','Old password does not matched!');
                }               
            }
            
        }
        
        return $this->render('changePassword', ['model'=>$model               
            ]);  
    }

    public function actionRegistration()
    {
        $model = new Userinfo;
        if (Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID) {
            $model->scenario = 'registration';

            if ($model->load(Yii::$app->request->post())) {
                $model->userTypeId = Userinfo::MANAGER_USER_TYPE_ID;

                $model->auth_key = Yii::$app->getSecurity()->generateRandomString();
                $model->password_reset_token = Yii::$app->getSecurity()->generateRandomString() . '_' . time();

                $model->createdBy = Userinfo::ADMIN_USER_ID;
                $model->createdOn = new \yii\db\Expression('UTC_TIMESTAMP()');
                $model->createdIP = trim($_SERVER['REMOTE_ADDR']);

                if ($model->validate()) {
                    $model->password = sha1($model->password);
                    $model->confirm_password = sha1($model->confirm_password);
                    if ($model->save()) {
                        \Yii::$app->session->setFlash('success', 'Registration complete successfully. You can login to the system now.');
                        $model = new Userinfo;
                    }
                }
            }

            return $this->render('registration', [
                'model' => $model,
            ]);
        } else {
            $this->redirect(['index']);
        }
    }

    public function actionForgetpassword()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }
        
        return $this->render('forgetpassword', [
                'model' => $model,
            ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

}
