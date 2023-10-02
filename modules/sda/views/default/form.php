<?php

use app\models\EMA;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Activity;
use app\models\Subactivity;
use yii\grid\ActionColumn;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use jeemce\grid\BadgeColumn;
use yii\bootstrap5\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sales Daily Activity (SDA)';
$this->params['breadcrumbs'][] = $this->title;
$fieldOptions = [
    'horizontalCssClasses' => ['wrapper' => '', 'offset' => ''],
    'options' => ['class' => 'col-md-3 input-sm mb-3'],
    'enableLabel' => false,
];
?>
<?php $form = ActiveForm::begin([
    'id' => 'myform',
    'method' => 'POST',
    'layout' => 'horizontal',
    'options' => [
        'enctype' => 'multipart/form-data',
        'data-pjax' => '0',
    ],
    'enableClientValidation' => true, #
    'enableAjaxValidation' => true, #
    'validateOnChange' => false,
    'validateOnBlur' => false,
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label'     => 'col-sm-2 control-label',
            'wrapper'   => 'col-sm-9',
            'hint'      => 'col-sm',
            'error'     => 'col-sm',
        ],
    ],
]); ?>

<div class="card border rounded-lg" role="form">
    <div class="card-header border-bottom">
        <div class="fw-bold text-muted fs-4">
            Sales Daily Activity Form
        </div>
    </div>
    <div class="card-body">
        <div class="form-group mb-3">
            <?= Html::label('Date', 'date', ['class' => 'col-sm-2 control-label mb-2']) ?>
            <div class="col-sm-12">
                <?= Html::input('date', 'date', null, ['class' => 'form-control input-sm', 'required' => true])
                ?>
            </div>
        </div>

        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.sda_form', // required: css class selector
            'widgetItem' => '.form-clone', // required: css class
            'limit' => 20, // the maximum times, an element can be cloned (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.btn-clone', // css class
            'deleteButton' => '.btn-remove', // css class
            'model' => $model,
            'formId' => 'myform',
            'formFields' => [
                'activity_id',
                'subactivity_id',
                'task',
                'quantity',
            ],
        ]); ?>
        <div class="sda_form">
            <?php foreach ($details as $key => $detail) { ?>
                <div class="form-clone">
                    <div class="form-group row mb-3">
                        <?= $form->field($detail, "[{$key}]activity_id", array_merge($fieldOptions, [
                            'options' => [
                                'class'   => 'col-md-3 input-sm mb-3',
                                'oninput' => 'getSubactivity(this, event)'
                            ]
                        ]))->dropDownList(Activity::Options(), ['prompt' => "Select Activity"])->label(false); ?>
                        <?= $form->field($detail, "[{$key}]subactivity_id", array_merge($fieldOptions, [
                            'options' => [
                                'class'   => 'col-md-3 input-sm mb-3 subactivity-select',
                            ]
                        ]))->dropDownList([], ['prompt' => "Select Subactivity"])->label(false); ?>
                        <?= $form->field($detail, "[{$key}]task", $fieldOptions)->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Task']); ?>
                        <?= $form->field($detail, "[{$key}]quantity", $fieldOptions)->textInput(['maxlength' => true, 'class' => 'form-control', 'placeHolder' => 'Quantity']); ?>
                        <div class="d-flex gap-2 justify-content-end">
                            <button class="btn btn-remove btn-danger" type="button"><i class="fa fa-trash"></i></button>
                            <button class="btn btn-clone btn-primary" type="button"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php DynamicFormWidget::end(); ?>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <?= Html::a('Cancel', ["#!"], ['class' => 'btn btn-secondary']) ?>
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-prompt', "data-title" => "Submit Data", "data-message" => "Apakah Anda yakin akan menyimpan data ini ? "]) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<script>
    function getSubactivity(activity, e) {
        let activity_id = $(activity).children().find('select').val();
        let subactivity_select = $(activity).siblings().prev('.subactivity-select').find('select');
        $.ajax({
            type: "POST",
            url: `<?= Url::to(['/json/subactivities/'], true) ?>`,
            data: {
                'depdrop_parents': activity_id
            },
            dataType: "json",
            success: function(response) {
                let data = response.output;
                let formoption = "<option value=''>Select Subactivity</option>";
                $.each(data, function(v, value) {
                    formoption += "<option value='" + value.id + "'>" + value.name + "</option>";
                });
                subactivity_select.html(formoption);
            },
            error: function(request, status, error) {
                console.log(request.responseText);
            }
        });
    }
</script>