<?php

use app\models\Pa;
use app\models\Kpi;
use app\models\Users;
use yii\helpers\Html;
use kartik\form\ActiveForm;
?>

<div class="modal-header bg-white">
    <h5 class="modal-title"><?= $this->params['pageName'] ?? 'Form' ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<?php $form = ActiveForm::begin([
    'id' => "form",
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'options' => ['autocomplete' => 'off', 'class' => 'modal-body bg-white'],
]); ?>

<?= $form->field($model, 'user_id')->dropDownList(Users::Options())->label("Employee") ?>
<?= $form->field($model, 'month')->dropDownList(PA::month_options('id', 'name')) ?>
<?= $form->field($model, 'year')->dropDownList(PA::year_options('id', 'name')) ?>
<?= $form->field($model, 'kpi_id')->dropDownList(KPI::Options()) ?>
<?= $form->field($model, 'task')->textarea() ?>
<?= $form->field($model, 'jobdesc')->textarea() ?>
<?= $form->field($model, 'point')->textInput(['type' => 'number', 'value' => 0]) ?>

<?php ActiveForm::end() ?>

<div class="modal-footer bg-white d-flex justify-content-between">
    <?= Html::resetButton('Batal', ['form' => $form->id, 'class' => 'btn btn-secondary', 'data-bs-dismiss' => "modal"]) ?>
    <?= Html::submitButton('Simpan', ['form' => $form->id, 'class' => 'btn btn-primary']) ?>
</div>