<?php

namespace app\modules\ema\controllers;

use Yii;
use app\models\Ema;
use yii\web\Controller;
use yii\filters\VerbFilter;
use jeemce\models\MimikSearchV2;
use yii\web\NotFoundHttpException;
use app\controllers\BaseController;
use jeemce\controllers\AppCrudTrait;

/**
 * Default controller for the `ema` module
 */
class DefaultController extends BaseController
{
    use AppCrudTrait;

    public function actionIndex()
    {
        $query = EMA::find();
        $searchModel = new MimikSearchV2(EMA::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('index', get_defined_vars());
    }

    public function actionForm($id = null)
    {
        /**
         * point = (progress % * subactivity)
         * score_adjusment = point - (score_validation)
         */
        if ($id) {
            $model = $this->findModel($id);
        } else {
            $model = new Ema;
        }

        $model->status = 0;
        $model->user_id = Yii::$app->user->identity ?? 1; # edit soon
        $model->score_validation = 0;

        if ($result = $this->save($model)) return $result;

        return $this->renderAjax('form', get_defined_vars());
    }

    protected function findModel($id)
    {
        if (($model = EMA::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
