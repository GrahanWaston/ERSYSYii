<?php

namespace app\controllers;

use Yii;
use app\models\Ema;
use yii\web\Controller;
use yii\filters\VerbFilter;
use jeemce\models\MimikSearchV2;
use yii\web\NotFoundHttpException;
use app\controllers\BaseController;
use jeemce\controllers\AppCrudTrait;

/**
 * ReportController implements the CRUD actions for Ema model.
 */
class ReportController extends BaseController
{
    use AppCrudTrait;

    public function actionEma()
    {
        $query = EMA::find()->select(['*', 'SUM(point - score_adjustment) as total'])->groupBy(['user_id', 'month']);
        $searchModel = new MimikSearchV2(EMA::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('ema/summary', get_defined_vars());
    }

    public function actionShow_ema($user_id, $month){
        $page_title = "Show $user_id Activities on $month";
        $query = EMA::find()->where(['user_id' => $user_id, 'month' => $month]);
        $searchModel = new MimikSearchV2(EMA::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('ema/show/index', get_defined_vars());
    }

    public function actionValidate_ema($id){
        if ($id) {
            $model = $this->findModel($id);
        } else {
            $model = new Ema;
        }

        if ($result = $this->save($model)) return $result;

        return $this->renderAjax('ema/show/form', get_defined_vars());
    }

    public function actionSda()
    {
        dd('sda');
        $query = EMA::find();
        $searchModel = new MimikSearchV2(EMA::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('sda/index', get_defined_vars());
    }

    public function actionShow_sda($id){
        dd('show sda', $id);
    }

    public function actionPa()
    {
        dd('pa');
        $query = EMA::find();
        $searchModel = new MimikSearchV2(EMA::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('pa/index', get_defined_vars());
    }

    public function actionShow_pa($id){
        dd('show pa', $id);
    }

    protected function findModel($id)
    {
        if (($model = EMA::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
