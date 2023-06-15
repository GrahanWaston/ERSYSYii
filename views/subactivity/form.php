<?php

use yii\helpers\Html;
use app\models\Activity;
use app\models\Position;
use app\models\Department;
use common\models\Category;
use kartik\form\ActiveForm;

/**
 * untuk type(berita-category,artikel-category)
 * 
 * @var \jeemce\AppView $this
 * @var Category $model
 */
?>

<div class="modal-header">
    <h5 class="modal-title"><?= $this->params['pageName'] ?? 'Form' ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<?php $form = ActiveForm::begin([
    'id' => "form",
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'options' => ['autocomplete' => 'off', 'class' => 'modal-body'],
]); ?>
<?= Html::activeHiddenInput($model, 'status', ['value' => 'publish']) ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'point')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'activity_id')->dropDownList(Activity::options('id', 'name', ['status' => 1])); ?>
<?= $form->field($model, 'department_id')->dropDownList(Department::options('id', 'name')) ?>
<?= $form->field($model, 'position_id')->checkboxList(Position::options('id', 'name')); ?>
<?= $form->field($model, 'status')->dropDownList(Activity::status_options()); ?>

<?php ActiveForm::end() ?>

<div class="modal-footer">
    <?= Html::resetButton('Batal', ['form' => $form->id, 'class' => 'btn btn-secondary', 'data-bs-dismiss' => "modal"]) ?>
    <?= Html::submitButton('Simpan', ['form' => $form->id, 'class' => 'btn btn-primary']) ?>
</div>