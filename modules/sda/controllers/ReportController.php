<?php

namespace app\modules\sda\controllers;

use Yii;
use app\models\SDA;
use app\models\Users;
use yii\web\Controller;
use jeemce\models\MimikSearchV2;
use yii\web\NotFoundHttpException;
use app\controllers\BaseController;
use jeemce\controllers\AppCrudTrait;

/**
 * Report controller for the `sda` module
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
        $query = SDA::summary()->with('user')->orderBy(['date' => SORT_DESC]);
        $searchModel = new MimikSearchV2(SDA::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('index', get_defined_vars());
    }

    public function actionMonthly()
    {
        $query = SDA::monthly()->with('user');
        $searchModel = new MimikSearchV2(SDA::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('monthly/index', get_defined_vars());
    }

    public function actionPrint(int $user_id, string $date)
    {
        $query = SDA::summary()->with('user')->orderBy(['date' => SORT_DESC]);
        // $main_summary = Yii::$app->db->createCommand('
        //     SELECT *
        //     FROM (SELECT id, date, user_id,
        //         CASE WHEN SUM(point + score_validation) > 99 THEN 1 ELSE 0 END as achievement,
        //         COUNT(id) as activities,
        //         SUM(point + score_validation) as total
        //         FROM sda
        //         GROUP BY date, user_id) as summary
        // ')->queryAll();
        #activities ON summary.activity_id = activities.id
        $activity_summary = Yii::$app->db->createCommand('
            SELECT activity_id, SUM(summary.total) as total, summary.activity
            FROM (SELECT date, activity_id, SUM(point + score_validation) as total, activities.name as activity
                FROM sda
                JOIN activities ON activity_id = activities.id
                GROUP BY date, activity_id) as summary
            GROUP BY activity_id
        ')->queryAll();

        $subactivity_summary = Yii::$app->db->createCommand('
            SELECT subactivity_id, SUM(summary.total) as total, summary.subactivity
            FROM (SELECT date, COUNT(subactivity_id), SUM(sda.point + score_validation) as total, subactivities.name as subactivity
                FROM sda
                JOIN subactivities ON subactivity_id = subactivities.id
                GROUP BY date, subactivity_id) as summary
            GROUP BY subactivity_id
        ')->queryAll();
        return $this->render('monthly/print', get_defined_vars());
    }

    public function actionShow($user_id, $date)
    {
        $user = Users::findOne($user_id);
        $page_title = "Show '" . $user['name'] . "' Activities on $date";
        $query = SDA::find()->where(['user_id' => $user_id, 'date' => $date]);
        $searchModel = new MimikSearchV2(SDA::class, $this->request->queryParams, []);
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
            $model = new Sda;
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

    protected function findModel($id)
    {
        if (($model = SDA::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
