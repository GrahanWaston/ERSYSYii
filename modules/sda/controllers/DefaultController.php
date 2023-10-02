<?php

namespace app\modules\sda\controllers;

use Yii;
use app\models\Sda;
use app\models\Users;
use yii\web\Controller;
use yii\filters\VerbFilter;
use jeemce\models\MimikSearchV2;
use yii\web\NotFoundHttpException;
use app\controllers\BaseController;
use jeemce\controllers\AppCrudTrait;

/**
 * Default controller for the `sda` module
 */
class DefaultController extends BaseController
{
    use AppCrudTrait;

    public function actionIndex()
    {
        $query = SDA::find()->orderBy(['date' => SORT_DESC]);
        $searchModel = new MimikSearchV2(SDA::class, $this->request->queryParams, []);
        $dataProvider = $searchModel->searchProvider($query);
        $dataProvider->pagination->defaultPageSize = 10;
        $dataProvider->sort = false;
        return $this->render('index', get_defined_vars());
    }

    public function actionForm()
    {
        $model = new SDA;
        $details = [new SDA];
        $data = $this->request->post('SDA', []);

        foreach ($data as $i => $task) {
            $details[$i] = new SDA();
            $details[$i]->load($task, "");
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && SDA::loadMultiple($details, $this->request->post())) {
                if ($this->request->isAjax) {
                    $this->response->format = $this->response::FORMAT_JSON;
                    return \yii\widgets\ActiveForm::validateMultiple($details);
                }
                foreach ($details as $detail) {
                    $detail->date = $this->request->post('date');
                    $detail->status = 0;
                    $detail->score_validation = 0;
                    $detail->user_id = Yii::$app->user->identity ?? 1; # edit soon
                    if ($detail->save(false)) {
                    } else $modelErrors[] = $detail;
                }
                Yii::$app->session->setFlash('noticeSuccess', 'Data berhasil disimpan.');
            }
            return $this->redirect(['/sda']);
        }

        if ($result = $this->save($model)) return $result;

        return $this->render('form', get_defined_vars());
    }

    public function actionForm_edit($id = null)
    {
        $model = $this->findModel($id);

        if (($result = $this->save($model))) {
            return $result;
        }

        $data['model'] = $model;
        return $this->renderAjax('form_edit', $data);
    }

    protected function findModel($id)
    {
        if (($model = SDA::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
