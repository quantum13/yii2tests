<?php

namespace app\modules\books\controllers;

use app\modules\books\models\Book;
use app\modules\books\models\BookSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * BooksController implements the CRUD actions for Book model.
 */
class BooksController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->user->returnUrl = Yii::$app->request->url;

        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('view', [
                'model' => $model,
            ]);
        } else {
            return $this->render('view', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();

        if ($this->processSaving($model)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->processSaving($model)) {
            return $this->goBack();
        }

        return $this->render('update', [
            'model' => $model,
        ]);

    }

    /**
     * @param Book $model
     * @return \yii\web\Response
     * @throws \yii\base\Exception
     */
    protected function processSaving($model)
    {
        if (!$model->load(Yii::$app->request->post())) {
            return false;
        }

        $file = UploadedFile::getInstance($model, 'preview');

        if ($file && $file->tempName) {
            $model->preview = $file;
            $model->setScenario('upload');
            $validated = $model->validate(['preview']);
            $model->preview = '';
            $model->setScenario('default');
            if ($validated) {
                $dir = Book::getPreviewDir();
                $dirThumbs = Book::getPreviewThumpDir();
                if (!file_exists($dir)) {
                    FileHelper::createDirectory($dir);
                }
                if (!file_exists($dirThumbs)) {
                    FileHelper::createDirectory($dirThumbs);
                }
                if (!$model->id && !$model->save()) {
                    return false;
                }
                $fileName = $model->id . '.' . $file->extension;
                $file->saveAs($dir . $fileName);
                Image::thumbnail($dir . $fileName, 150, 150)->save($dirThumbs . $fileName);
                $model->preview = $fileName;
            } else {
                return false;
            }
        }
        if (!$model->save()) {
            return false;
        }
        return true;
    }

    /**
     * Deletes an existing Book model.
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
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
