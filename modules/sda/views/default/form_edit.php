<?php

use app\models\EMA;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Project;
use app\models\Activity;
use app\models\Subactivity;
use kartik\depdrop\DepDrop;
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
<?= Html::activeHiddenInput($model, 'status', ['value' => 'publish']) ?>

<?= $form->field($model, 'activity_id')->widget(Select2::class, [
    'hideSearch' => false,
    'data' => Activity::Options(),
    'size' => Select2::SMALL,
    'options' => [
        'prompt' => "Select Activity",
        'id' => 'activity_id',
        'multiple' => false
    ],
    'pluginOptions' => ['allowClear' => true],
])->label($model->getAttributeLabel('activity_id')); ?>

<?= $form->field($model, 'subactivity_id')->widget(DepDrop::class, [
    'type' => DepDrop::TYPE_SELECT2,
    'options' => [
        'prompt' => 'Select Subactivity',
        'multiple' => false
    ],
    'select2Options' => [
        'size' => Select2::SMALL,
        'pluginOptions' => [
            'tags' => true,
            'allowClear' => true,
        ]
    ],
    'pluginOptions' => [
        'depends' => ['activity_id'],
        'url' => Url::to(['/json/subactivities'], true),
        'initialize' => true,
    ],
])->label($model->getAttributeLabel('subactivity_id')); ?>

<?= $form->field($model, 'task')->textInput() ?>
<?= $form->field($model, 'quantity')->textInput(['type' => 'number']) ?>
<?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>

<?php ActiveForm::end() ?>

<div class="modal-footer bg-white d-flex justify-content-between">
    <?= Html::resetButton('Cancel', ['form' => $form->id, 'class' => 'btn btn-secondary', 'data-bs-dismiss' => "modal"]) ?>
    <?= Html::submitButton('Submit', ['form' => $form->id, 'class' => 'btn btn-primary']) ?>
</div>