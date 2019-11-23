<?php

namespace app\controllers;

use Yii;
use app\models\Task;
use app\models\TaskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Task();

        if (Yii::$app->request->post()) {

            if($model->type != Yii::$app->request->post()["Task"]["type"]) {
                if(Yii::$app->request->post()["Task"]["type"] == 1) {
                    $model->start_datetime = date("Y-m-d H:i:s");
                } elseif (Yii::$app->request->post()["Task"]["type"] == 2) {
                    $model->end_datetime = date("Y-m-d H:i:s");
                } else {
                    $model->start_datetime = 0;
                    $model->end_datetime = 0;
                }
            }
            $model->name = Yii::$app->request->post()["Task"]["name"];
            $model->type = Yii::$app->request->post()["Task"]["type"];
            $model->status = Yii::$app->request->post()["Task"]["status"];
            $model->description = Yii::$app->request->post()["Task"]["description"];
            $model->create_datetime = date("Y-m-d H:i:s");
            $model->insert();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->post()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionSubmit($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->post()) {

            if($model->type != Yii::$app->request->post()["type"]) {
                if(Yii::$app->request->post()["type"] == 1) {
                    $model->start_datetime = date("Y-m-d H:i:s");
                } elseif (Yii::$app->request->post()["type"] == 2) {
                    $model->end_datetime = date("Y-m-d H:i:s");
                } else {
                    $model->start_datetime = null;
                    $model->end_datetime = null;
                }
            }

            $model->name = Yii::$app->request->post()["name"];
            $model->type = Yii::$app->request->post()["type"];
            $model->status = Yii::$app->request->post()["status"];
            $model->description = Yii::$app->request->post()["description"];

            $model->save();
        }
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSearch()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
