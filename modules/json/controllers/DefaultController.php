<?php

namespace app\modules\json\controllers;

use Yii;

use yii\web\Controller;
use app\models\Activity;
use app\models\Position;
use app\models\Department;
use app\models\Kpi;
use app\models\Subactivity;

/**
 * Default controller for the `json` module
 */
class DefaultController extends Controller
{
    public function actionSubactivities()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $activity_id = $parents[0];
                $out = Subactivity::find()->where(['activity_id' => $activity_id])->all();
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionDepartment_activity()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $activity_id = $parents[0];
                $activity = Activity::find()->where(['id' => $activity_id])->one();
                $out = Department::find()->where(['id' => $activity['department_id']])->all();
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionPositions()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $department_id = $parents[0];
                $out = Position::find()->where(['department_id' => $department_id])->all();
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionKpi()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $kpi_id = $parents[0];
                $out = Kpi::find()->where(['kpi_id' => $kpi_id])->all();
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }
}
