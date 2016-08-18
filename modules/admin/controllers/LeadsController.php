<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Leads;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LeadsController implements the CRUD actions for Leads model.
 */
class LeadsController extends Controller
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
     * Lists all Leads models.
     * @return mixed
     */
    public function actionIndex()
    {
        $count = Leads::find()->count();

        $dataProvider = new ActiveDataProvider([
            'query' => Leads::find()
                ->orderBy('id DESC'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'count' => $count,
        ]);
    }

    /**
     * Displays a single Leads model.
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
     * Creates a new Leads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Leads();

        if ($model->load(Yii::$app->request->post())) {
            $list = Leads::find()
                ->select('email')
                ->all();
            foreach ($list as $item){
                Yii::$app->mailer->compose()
                    ->setFrom(['no-reply@tatyana-fashion.ru' => 'Tatyana Fashion - клиентская служба'])
                    ->setTo($item->email)
                    ->setSubject('Tatyana Fashion - ' . $model->created)
                    ->setHtmlBody($model->modified)
                    ->send();
            }

            Yii::$app->session->setFlash('success', '<strong>Рассылка от лица клиентской службы осуществлена успешно!</strong> ');

            return $this->redirect('/admin/leads');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Leads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->mailer->compose()
                ->setFrom(['administrator@tatyana-fashion.ru' => 'Tatyana Fashion - клиентская служба'])
                ->setTo($model->email)
                ->setSubject('Tatyana Fashion - ' . $model->created)
                ->setHtmlBody($model->modified)
                ->send();
            Yii::$app->session->setFlash('success', 'Письмо для <strong>'. $model->email .'</strong> отправлено!');
            return $this->redirect('/admin/leads');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionMail()
    {
        $model = new Leads();

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->mailer->compose()
                ->setFrom(['administrator@tatyana-fashion.ru' => 'Tatyana Fashion - клиентская служба'])
                ->setTo($model->email)
                ->setSubject('Tatyana Fashion - ' . $model->created)
                ->setHtmlBody($model->modified)
                ->send();
            Yii::$app->session->setFlash('success', 'Письмо для <strong>'. $model->email .'</strong> отправлено!');
            return $this->redirect('/admin/leads');
        } else {
            return $this->render('mail', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Leads model.
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
     * Finds the Leads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Leads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Leads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
