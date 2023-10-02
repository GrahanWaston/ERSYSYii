<?php

namespace app\modules\subactivity\controllers;

use yii\web\Controller;
use app\models\Activity;
use app\models\Subactivity;
use yii\filters\VerbFilter;
use jeemce\models\MimikSearchV2;
use app\models\subactivitySearch;
use yii\web\NotFoundHttpException;
use app\controllers\BaseController;
use jeemce\controllers\AppCrudTrait;

/**
 * Default controller for the `subactivity` module
 */
class DefaultController extends BaseController
{
    use AppCrudTrait;

    public function actionIndex()
    {
        $query = Subactivity::find();
        $searchModel = new MimikSearchV2(Subactivity::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('index', get_defined_vars());
    }

    public function actionForm($id = null)
    {
        if ($id) {
            $model = $this->findModel($id);
        } else {
            $model = new Subactivity;
        }
        if($this->request->post()) dd($this->request->post());
        if ($result = $this->save($model)) {
            return $result;
        }

        return $this->renderAjax('form', get_defined_vars());
    }

    public function actionStatus(array $selection, $value = null)
    {
        $errors = [];
        foreach ($selection as $id) {
            $model = $this->findModel($id);
            $model->status = $value;
            $model->save();
        }
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Subactivity::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
