<?php

use app\models\SDA;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Activity;
use yii\grid\ActionColumn;
use jeemce\grid\BadgeColumn;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sales Daily Activity (SDA)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid p-0">
    <div class="row justify-content-between align-items-center">
        <div class="col-auto">
            <h1 class="h3"><strong><?= Html::encode($this->title) ?></strong> Management</h1>
        </div>
    </div>

    <div class="row justify-content-between align-items-center border">
        <?php
        yii\widgets\Pjax::begin([
            'options' => ['class' => 'card flex-fill mb-0']
        ])
        ?>

        <div class="mt-3">
            <div class="d-flex flex-wrap gap-2">
                <a href="<?= Url::toRoute(['form']); ?>" class="btn btn-primary" data-pjax="0">
                    <span class="text-light"><i class="fa-solid fa-clipboard"></i> Create Task</span>
                </a>
            </div>
        </div>

        <div class="mt-3">
            <div class="col-auto">
                <?= $this->render('index_header', get_defined_vars()); ?>
            </div>
        </div>

        <div class="mt-3">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items}',
                'options' => [
                    'class' => 'table-responsive',
                    'style' => 'overflow-x:auto;'
                ],
                'tableOptions' => ['class' => 'table table-hover'],
                'columns' => [
                    ['class' => yii\grid\SerialColumn::class],
                    [
                        'header' => 'Action',
                        'headerOptions' => ['style' => 'width:100px;', 'class' => 'text-center'],
                        'contentOptions' => ['style' => 'vertical-align:center', 'class' => 'text-center'],
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, SDA $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'template' => '{form_edit}{delete}',
                        'buttons' => [
                            'form_edit' => function ($url, $model) {
                                return Html::a('<span class="text-primary"><i class="fa-solid fa-pen-to-square"></i></span>', $url, $options = [
                                    'onclick' => "modalFormAjax(this, event)",
                                    'data-pjax' => "0",
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<span class="text-danger ms-2"><i class="fa-solid fa-trash"></i></span>', $url, $options = [
                                    'onclick' => "deleteConfirm(this, event)",
                                    'data-pjax' => "0"
                                ]);
                            }
                        ]
                    ],
                    [
                        'attribute' => 'status',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;',
                            'class' => 'text-center'
                        ],
                        'class' => BadgeColumn::class,
                        'badgeOptions' => [
                            0 => ['class' => 'badge bg-danger'],
                            1 => ['class' => 'badge bg-success']
                        ],
                        'badgeValues' => SDA::status_options()
                    ],
                    [
                        'label' => 'Date',
                        'attribute' => 'date',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'label' => 'Activity',
                        'attribute' => 'activity.name',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'label' => 'Subactivity',
                        'attribute' => 'subactivity.name',
                        'contentOptions' => [
                            'style' => 'min-width:250px; vertical-align:top;'
                        ],
                    ],
                    [
                        'attribute' => 'task',
                        'contentOptions' => [
                            'style' => 'min-width:400px; vertical-align:top;'
                        ],
                    ],
                    [
                        'attribute' => 'quantity',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'attribute' => 'point',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'attribute' => 'score_validation',
                        'contentOptions' => [
                            'style' => 'min-width:140px; vertical-align:top;'
                        ],
                    ],
                    [
                        'attribute' => 'note',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                ],
            ]);
            ?>
        </div>

        <?= $this->render('//parts/index_footer', get_defined_vars()); ?>
        <?php yii\widgets\Pjax::end() ?>
    </div>
</div>