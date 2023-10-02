<?php

use app\models\Kpi;
use yii\helpers\Html;
use app\models\Department;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
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
<?= Html::activeHiddenInput($model, 'status', ['value' => 'active']) ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'department_id')->widget(Select2::class, [
    'hideSearch' => false,
    'data' => Department::Options(),
    'size' => Select2::SMALL,
    'options' => [
        'prompt' => "Select Department",
        'id' => 'department_id',
        'multiple' => false
    ],
    'pluginOptions' => ['allowClear' => true],
])->label($model->getAttributeLabel('department_id')); ?>
<?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'status')->dropDownList(KPI::status_options()); ?>

<?php ActiveForm::end() ?>

<div class="modal-footer bg-white d-flex justify-content-between">
    <?= Html::resetButton('Cancel', ['form' => $form->id, 'class' => 'btn btn-secondary', 'data-bs-dismiss' => "modal"]) ?>
    <?= Html::submitButton('Submit', ['form' => $form->id, 'class' => 'btn btn-primary']) ?>
</div>