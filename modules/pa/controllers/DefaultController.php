<?php

namespace app\modules\pa\controllers;

use Yii;
use jeemce\models\MimikSearchV2;
use yii\web\NotFoundHttpException;
use app\controllers\BaseController;
use app\models\Pa;
use app\models\Kpi;
use jeemce\controllers\AppCrudTrait;

/**
 * Default controller for the `pa` module
 */
class DefaultController extends BaseController
{
    use AppCrudTrait;

    public function actionIndex()
    {
        $query = Pa::find();
        $searchModel = new MimikSearchV2(Pa::class, $this->request->queryParams, []);
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
            $model = new Pa;
        }

        if ($result = $this->save($model)) return $result;

        return $this->renderAjax('form', get_defined_vars());
    }

    protected function findModel($id)
    {
        if (($model = Pa::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
