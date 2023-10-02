<?php

namespace app\modules\dashboard\controllers;

use Yii;
use app\models\EMA;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use jeemce\models\MimikSearchV2;
use yii\web\NotFoundHttpException;
use app\controllers\BaseController;
use jeemce\controllers\AppCrudTrait;

/**
 * Default controller for the `dashboard` module
 */
class DefaultController extends BaseController
{
    use AppCrudTrait;

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    protected function findModel($id)
    {
        if (($model = EMA::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
