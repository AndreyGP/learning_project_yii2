<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()
                    ->with(['categoriesproducts', 'brandsproducts']),
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'category_id' => SORTTO
                ]
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post())) {

            $model->vendor_code = $this->vendorCodeCreate($model->category_id);

            if ($model->save()){

                $model->image = UploadedFile::getInstance($model, 'image');

                if( $model->image ){
                    $model->upload();
                }
                unset($model->image);

                $model->gallery = UploadedFile::getInstances($model, 'gallery');
                if( $model->gallery ){
                    $model->uploadGallery();
                }
                unset($model->gallery);

                Yii::$app->cache->delete('brand_menu');
                Yii::$app->cache->delete('product_plus');
                Yii::$app->cache->delete('recommended');
                Yii::$app->cache->delete('sale');

                Yii::$app->session->setFlash('success', 'Товар <strong>"' . $model->title . '"</strong> добавлен.');

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                debug($model->vendor_code);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img = $model->getImage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->image = UploadedFile::getInstance($model, 'image');
            if( $model->image ){
                if ($img){
                    $model->removeImage($img);
                }
                $model->upload();
            }
            unset($model->image);
            $model->gallery = UploadedFile::getInstances($model, 'gallery');
            if( $model->gallery ){
                $model->removeImages();
                $model->uploadGallery();
            }
            unset($model->gallery);
            Yii::$app->cache->delete('brand_menu');
            Yii::$app->cache->delete('product_plus');
            Yii::$app->cache->delete('recommended');
            Yii::$app->cache->delete('sale');
            Yii::$app->session->setFlash('success', 'Товар <strong>"' . $model->title . '"</strong> удачно обновлён.');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->removeImages();
        $model->delete();
        Yii::$app->cache->delete('brand_menu');
        Yii::$app->cache->delete('product_plus');
        Yii::$app->cache->delete('recommended');
        Yii::$app->cache->delete('sale');
        Yii::$app->session->setFlash('success', 'Товар  удалён.');

        return $this->redirect(['index']);
    }

    public function actionImgdelete($id)
    {
        $model = $this->findModel($id);
        $img = $model->getImage();
        $model->removeImage($img);
        unset($model);
        $model = $this->findModel($id);
        $img = $model->getImage();
        $src = $img->getUrl();
        return $src;
    }

    public function actionImagesdelete($id)
    {
        $model = $this->findModel($id);
        $model->removeImages();
        unset($model);
        $model = $this->findModel($id);
        $img = $model->getImage();
        $src = $img->getUrl();

        return $src;
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function vendorCodeCreate($cat_id)
    {
        $max_vendor_code = Products::find()
            ->asArray()
            ->select(['MAX(vendor_code) as vendor_code'])
            ->where(['category_id' => $cat_id])
            ->one();

        $max_vendor_code = $max_vendor_code['vendor_code'];
        if ( empty($max_vendor_code) ){
            $new_vendor_code = $cat_id * 1000;
        } else {
            $new_vendor_code = ++$max_vendor_code;
        }

        return $new_vendor_code;
    }
}
