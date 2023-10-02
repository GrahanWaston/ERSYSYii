<?php

namespace app\modules\ema\controllers;

use app\models\EMA;
use app\models\Users;
use yii\web\Controller;
use jeemce\models\MimikSearchV2;
use yii\web\NotFoundHttpException;
use app\controllers\BaseController;
use jeemce\controllers\AppCrudTrait;

/**
 * Report controller for the `ema` module
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
        $query = EMA::summary()->with('user');
        $searchModel = new MimikSearchV2(EMA::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('index', get_defined_vars());
    }

    public function actionShow(int $user_id, string $month)
    {
        $user = Users::findOne($user_id);
        $page_title = "Show '" . $user['name'] . "' Activities on " . date("F", mktime(0, 0, 0, $month, 10));
        $query = EMA::find()->where(['user_id' => $user_id, 'month' => $month]);
        $searchModel = new MimikSearchV2(EMA::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('show', get_defined_vars());
    }

    public function actionForm($id)
    {
        if ($id) {
            $model = $this->findModel($id);
        } else {
            $model = new Ema;
        }

        if ($result = $this->save($model)) return $result;

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
        return $this->redirect($this->request->referrer);
    }

    public function actionPrint(int $user_id, string $month)
    {
        $page_title = "Show $user_id Activities on $month";
        $query = EMA::find()->with('activity')->where(['user_id' => $user_id, 'month' => $month]);
        $searchModel = new MimikSearchV2(EMA::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('print', get_defined_vars());
    }

    protected function findModel($id)
    {
        if (($model = EMA::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
