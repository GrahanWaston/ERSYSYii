<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Activity;
use app\models\Position;
use app\models\Department;
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

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'point')->textInput(['maxlength' => true]) ?>
<?= null //$form->field($model, 'activity_id')->dropDownList(Activity::options('id', 'name', ['status' => 1])); 
?>
<?= null //$form->field($model, 'department_id')->dropDownList(Department::options('id', 'name')) 
?>
<?= null //$form->field($model, 'position_id')->checkboxList(Position::options('id', 'name')); 
?>

<!-- Select Activity based on Department -->
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

<?= $form->field($model, 'department_id')->widget(DepDrop::class, [
    // 'type' => DepDrop::TYPE_SELECT2,
    // 'data' => Department::Options(),
    'options' => [
        'prompt' => "Select Department",
        'id' => 'department_id',
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
        'url' => Url::to(['/json/department_activity'], true),
        'allowClear' => true
    ],
])->label($model->getAttributeLabel('department_id')); ?>

<?= $form->field($model, 'position_id')->widget(DepDrop::class, [
    'type' => DepDrop::TYPE_SELECT2,
    'options' => [
        'prompt' => 'Select Position',
        'multiple' => true
    ],
    'select2Options' => [
        'size' => Select2::SMALL,
        'pluginOptions' => [
            'tags' => true,
            'allowClear' => true,
        ]
    ],
    'pluginOptions' => [
        'depends' => ['department_id'],
        'url' => Url::to(['/json/positions'], true),
        'initialize' => true,
    ],
])->label($model->getAttributeLabel('position_id')); ?>

<?= $form->field($model, 'status')->dropDownList(Activity::status_options()); ?>

<?php ActiveForm::end() ?>

<div class="modal-footer bg-white d-flex justify-content-between">
    <?= Html::resetButton('Cancel', ['form' => $form->id, 'class' => 'btn btn-secondary', 'data-bs-dismiss' => "modal"]) ?>
    <?= Html::submitButton('Submit', ['form' => $form->id, 'class' => 'btn btn-primary']) ?>
</div>