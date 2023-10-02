<?php

use app\models\EMA;
use yii\helpers\Html;
use app\models\Project;
use app\models\Activity;
use app\models\Subactivity;
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

<?= $form->field($model, 'score_validation', ['options' => ['value' => 0]])->textInput() ?>
<?= $form->field($model, 'note')->textInput() ?>
<?= $form->field($model, 'status')->dropDownList([0 => "Invalid", 1 => "Valid"]) ?>

<?php ActiveForm::end() ?>

<div class="modal-footer bg-white d-flex justify-content-between">
    <?= Html::resetButton('Cancel', ['form' => $form->id, 'class' => 'btn btn-secondary', 'data-bs-dismiss' => "modal"]) ?>
    <?= Html::submitButton('Submit', ['form' => $form->id, 'class' => 'btn btn-primary']) ?>
</div>