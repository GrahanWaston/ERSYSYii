<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Activity;
use kartik\form\ActiveForm;

/**
 * type(berita-category,artikel-category)
 * 
 * @var \jeemce\AppView $this
 * @var \jeemce\models\Page $searchModel
 */

$type = null;

$bulkActions ??= [];
if (Yii::$app->user->can('status,status-all') && isset($modelClass)) {
    foreach ($modelClass::statusOptions() as $k => $v) {
        $bulkActions[Url::toRoute(['status-all', 'status' => $k])] = Yii::t('app', "Status {$v}");
    }
}
if (Yii::$app->user->can('delete,delete-all')) {
    $bulkActions[Url::toRoute(['delete-all'])] = Yii::t('app', 'Hapus');
}
?>

<?php
$form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'GET',
    'type' => ActiveForm::TYPE_INLINE,
    'options' => [
        'class' => 'card-header d-flex flex-wrap align-items-center',
        'data-pjax' => 1
    ]
]);
?>

<?php if (Yii::$app->user->can('status-all,delete-all')) : ?>
    <?= Html::dropDownList(null, null, $bulkActions, [
        'form' => 'bulk-action',
        'prompt' => 'Bulk Action ...',
        'class' => 'form-select w-auto me-2 mb-2 mb-md-0 flex-grow-1 flex-md-grow-0',
    ]) ?>

    <?= Html::a(Yii::t('app', 'Apply'), '#', [
        'data-pjax' => 0,
        'onclick' => 'bulkActionConfirm(this,event)',
        'class' => 'btn btn-default btn-outline-dark me-2 mb-2 mb-md-0',
    ]) ?>
<?php endif ?>

<?php if (Yii::$app->user->can('create')) { ?>
    <?= Html::a(
        Yii::t('app', 'Tambah'),
        ['form'],
        ['data-pjax' => 0, 'onclick' => 'modalFormAjax(this,event)', 'class' => 'btn btn-primary me-md-2 mb-2 mb-md-0 d-block'],
    ) ?>
<?php } ?>

<div class="me-md-auto mr-md-auto"></div>

<?= $form->field($searchModel, 'status')->dropDownList(Activity::status_options(), [
    'prompt' => 'STATUS',
    'onchange' => "$(this.form).trigger('submit')"
])->label(false); ?>

<div class="input-group w-auto flex-grow-1 flex-md-grow-0">
    <?= Html::input('search', 'search', $searchModel->search ?? '', [
        'class' => 'form-control',
        'placeholder' => Yii::t('app', 'Pencarian ...'),
    ]) ?>
    <button class="btn btn-default btn-outline-dark" type="submit">
        <i class="bi bi-search"></i>
    </button>
</div>

<?php
ActiveForm::end();
?>