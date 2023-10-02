<?php

use yii\helpers\Html;
use app\models\Project;
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
<?= Html::activeHiddenInput($model, 'status', ['value' => 'publish']) ?>

<?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'client')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'year')->dropDownList(Project::year_options()) ?>
<?= $form->field($model, 'status')->dropDownList(Project::status_options()); ?>

<?php ActiveForm::end() ?>

<div class="modal-footer bg-white d-flex justify-content-between">
    <?= Html::resetButton('Cancel', ['form' => $form->id, 'class' => 'btn btn-secondary', 'data-bs-dismiss' => "modal"]) ?>
    <?= Html::submitButton('Submit', ['form' => $form->id, 'class' => 'btn btn-primary']) ?>
</div>