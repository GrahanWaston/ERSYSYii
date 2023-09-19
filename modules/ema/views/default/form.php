<?php

use app\models\EMA;
use yii\helpers\Html;
use app\models\Project;
use app\models\Activity;
use app\models\Subactivity;
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

<?= $form->field($model, 'project_id')->dropDownList(Project::options('id', 'name')) ?>
<?= $form->field($model, 'activity_id')->dropDownList(Activity::options('id', 'name')) ?>
<?= $form->field($model, 'subactivity_id')->dropDownList(Subactivity::options('id', 'name')) ?>
<?= $form->field($model, 'month')->dropDownList(EMA::month_options('id', 'name')) ?>
<?= $form->field($model, 'year')->dropDownList(EMA::year_options('id', 'name')) ?>
<?= $form->field($model, 'task')->textInput() ?>
<?= $form->field($model, 'progress')->textInput() ?>

<?php ActiveForm::end() ?>

<div class="modal-footer">
    <?= Html::resetButton('Batal', ['form' => $form->id, 'class' => 'btn btn-secondary', 'data-bs-dismiss' => "modal"]) ?>
    <?= Html::submitButton('Simpan', ['form' => $form->id, 'class' => 'btn btn-primary']) ?>
</div>