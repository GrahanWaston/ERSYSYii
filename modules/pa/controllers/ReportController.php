<?php

namespace app\modules\pa\controllers;

use yii\web\Controller;
use jeemce\models\MimikSearchV2;
use yii\web\NotFoundHttpException;
use app\controllers\BaseController;
use app\models\PA;
use jeemce\controllers\AppCrudTrait;

/**
 * Report controller for the `PA` module
 */
class ReportController extends BaseController
{
    use AppCrudTrait;
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $query = PA::summary()->with('user');
        $searchModel = new MimikSearchV2(PA::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('index', get_defined_vars());
    }

    public function actionForm($id)
    {
        if ($id) {
            $model = $this->findModel($id);
        } else {
            $model = new PA;
        }

        if ($result = $this->save($model)) return $result;

        return $this->renderAjax('form', get_defined_vars());
    }

    public function actionPrint(int $user_id, int $month)
    {
        $data = PA::find()->where(['user_id' => $user_id, 'month' => $month])->all();
        return $this->render('print', get_defined_vars());
    }

    protected function findModel($id)
    {
        if (($model = PA::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
