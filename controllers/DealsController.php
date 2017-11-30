<?php

namespace app\controllers;

use app\models\BikeEvents;
use Yii;
use app\models\Deals;
use app\models\DealsSearch;
use app\models\DealBrand;
use app\models\DealImage;
use app\models\DealImagesMapping;
use app\models\DealBrandsMapping;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

//use app\models\Userinfo;

/**
 * DealsController implements the CRUD actions for Deals model.
 */
class DealsController extends Controller
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
     * Lists all Deals models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DealsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Deals model.
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
     * Creates a new Deals model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Deals();

        if ($model->load(Yii::$app->request->post()))
		{
            //get instance of the uploaded image
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');

            if ($model->save()) {
                if(Yii::$app->request->post("Brand")) {
                    $brands = $_POST['Brand'] ? $_POST['Brand'] : [];

                    if (!self::saveBrands($model->Deals_ID, $brands)) {
                        return $this->render('update', [
                            'model' => $model,
                        ]);
                    }
                    \Yii::$app->session->removeFlash('error');
                }
                if ($model->validate()) {
                    foreach ($model->imageFiles as $file) {
                        $file->saveAs('images/' . $file->baseName . '.' . $file->extension);
                        $image = DealImage::saveImage('images/' . $file->baseName . '.' . $file->extension);
                        if ($image) {
                            DealImagesMapping::saveImageMapping($image, $model);
                        }
                    }
                }

                if(isset($_POST['back_manage']) && ($_POST['back_manage']==1))
                {
                    return $this->redirect(['index']);
                }
                else
                {
                    return $this->redirect(['view', 'id' => $model->Deals_ID]);
                }
            } else {
                print_r($model->getErrors());
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
     * Updates an existing Deals model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $brands_with_percents = DealBrandsMapping::find()->where(['deal_id' => $model->Deals_ID])->joinWith('dealsBrand')->all();
        $images = DealImagesMapping::find()->where(['deal_id' => $model->Deals_ID])->joinWith('dealsImage')->all();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->save()) {
                if (Yii::$app->request->post("Brand")) {
                    $brands = $_POST['Brand'] ? $_POST['Brand'] : [];
                    DealBrandsMapping::deleteAll(['deal_id' => $model->Deals_ID]);

                    if (!self::saveBrands($model->Deals_ID, $brands)) {
                        return $this->render('update', [
                            'model' => $model,
                            'brands_with_percents' => $brands_with_percents,
                            'images' => $images
                        ]);
                    }
                    \Yii::$app->session->removeFlash('error');

                } else {
                    DealBrandsMapping::deleteAll(['deal_id' => $model->Deals_ID]);
                }

                if ($model->validate()) {
                    foreach ($model->imageFiles as $file) {
                        $file->saveAs('images/' . $file->baseName . '.' . $file->extension);
                        $image = DealImage::saveImage('images/' . $file->baseName . '.' . $file->extension);
                        if ($image) {
                            DealImagesMapping::saveImageMapping($image, $model);
                        }
                    }
                }
            }
            if (isset($_POST['back_manage']) && ($_POST['back_manage'] == 1)) {
                return $this->redirect(['index']);
            } else {
                return $this->redirect(['view', 'id' => $model->Deals_ID]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'brands_with_percents' => $brands_with_percents,
                'images' => $images,
            ]);
        }
    }

    /**
     * Deletes an existing Deals model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        BikeEvents::updateAll(['deals_id' => null], 'deals_id = '.$id.'');
        DealBrandsMapping::deleteAll(['deal_id' => $id]);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionDynamicDeleting() {
        if (Yii::$app->request->isAjax && !empty($_POST['brand_id'])) {
            $brand_id = $_POST['brand_id'];
            DealBrandsMapping::deleteAll(['deals_brand_id' => $brand_id]);
        }
    }

    /**
     * Finds the Deals model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Deals the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Deals::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    private function saveBrands($deal_id, $brands) {
        foreach ($brands as $brand) {
            if ($brand['brand_id']) { // update Brand
                $brandModel = DealBrand::findOne($brand['brand_id']);
                $brandModel->Deal_Brand = $brand['brand_name'];
                $brandModel->Deal_Brand_Value = $brand['brand_value'];
                $brandModel->Deal_Brand_Image = $brand['brand_image'];
		$brandModel->Deal_Brand_Incentive = $brand['brand_incentive'];
                $brandModel->save();
                $brand_id = $brandModel->Deal_Brand_ID;
            } else {
                $brandModel = new DealBrand();
                $brandModel->Deal_Brand = $brand['brand_name'];
                $brandModel->Deal_Brand_Value = $brand['brand_value'];
                $brandModel->Deal_Brand_Image = $brand['brand_image'];
		$brandModel->Deal_Brand_Incentive = $brand['brand_incentive'];
                if ($brandModel->save()) {
                    $brand_id = $brandModel->Deal_Brand_ID;
                } else {
                    $brandError = $brandModel->getErrors();
                    \Yii::$app->session->setFlash('error',$brandError['Deal_Brand'][0]);
                    return false;
                }
            }
            $dealBrandsMapping = new DealBrandsMapping();
            $dealBrandsMapping->deal_id = $deal_id;
            $dealBrandsMapping->deals_brand_id = $brand_id;
            $dealBrandsMapping->save();
        }
        return true;
    }
}
