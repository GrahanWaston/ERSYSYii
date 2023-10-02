<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Project;
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
        'class' => 'justify-content-start justify-content-md-end',
        'data-pjax' => 1
    ]
]);
?>

<?php if (Yii::$app->user->can('status-all,delete-all')) : ?>
    <?= Html::dropDownList(null, null, $bulkActions, [
        'form' => 'bulk-action',
        'prompt' => 'Bulk Action ...',
        'class' => ''
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

<div class="d-grid d-md-flex gap-2">
    <div class="col-md-auto">
        <div class="input-group">
            <?= $form->field($searchModel, 'year')->dropDownList(Project::year_options(), [
                'prompt' => 'Year Filter',
                'onchange' => "$(this.form).trigger('submit')"
            ])->label(false); ?>
        </div>
    </div>

    <div class="col-md-auto">
        <div class="input-group">
            <?= $form->field($searchModel, 'status')->dropDownList(Project::status_options(), [
                'prompt' => 'Status Filter',
                'onchange' => "$(this.form).trigger('submit')"
            ])->label(false); ?>
        </div>
    </div>

    <div class="col-md-auto">
        <div class="input-group">
            <?= Html::input('search', 'search', $searchModel->search ?? '', [
                'class' => 'form-control',
                'placeholder' => Yii::t('app', 'Keywords...'),
            ]) ?>

            <div class="input-group-append">
                <button class="btn btn-primary btn-icon" type="submit">Search</button>
            </div>
        </div>
    </div>
</div>

<?php
ActiveForm::end();
?>