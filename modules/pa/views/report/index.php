<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Pa;
use yii\grid\ActionColumn;
use jeemce\grid\BadgeColumn;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Performance Apraisal (PA)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid p-0">
    <div class="row justify-content-between align-items-center">
        <div class="col-auto">
            <h1 class="h3"><strong><?= Html::encode($this->title) ?></strong> Report</h1>
        </div>
    </div>

    <div class="row justify-content-between align-items-center border">
        <?php
        yii\widgets\Pjax::begin([
            'options' => ['class' => 'card flex-fill mb-0']
        ])
        ?>

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
                        'urlCreator' => function ($action, PA $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'template' => '{print}',
                        'urlCreator' => function ($name, $model) {
                            return [
                                $name, 'user_id' => $model->user_id, 'month' => $model->month
                            ];
                        },
                        'buttons' => [
                            'print' => function ($url, $model) {
                                return Html::a('<span class="text-info"><i class="fa-solid fa-print"></i></span>', $url, []);
                            },
                        ]
                    ],
                    [
                        'label' => 'Employee',
                        'attribute' => 'user.name',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'label' => 'Department',
                        'attribute' => 'user.department.name',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'label' => 'Position',
                        'attribute' => 'user.position.name',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'attribute' => 'month',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                        'value' => function ($model, $key, $index, $grid) {
                            return date("F", mktime(0, 0, 0, $model->month, 10));
                        },
                    ],
                    [
                        'attribute' => 'year',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'label' => 'Total Score',
                        'attribute' => 'total',
                        'value' => function ($model) {
                            return $model->total;
                        },
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'label' => 'Achievement',
                        'attribute' => 'total',
                        'value' => function ($model) {
                            if ($model->total < 20) {
                                return 0;
                            }elseif ($model->total >= 21 && $model->total <= 40) {
                                return 1;
                            }elseif ($model->total >= 41 && $model->total <= 60) {
                                return 2;
                            }elseif ($model->total >= 61 && $model->total <= 80) {
                                return 3;
                            }elseif ($model->total >= 81) {
                                return 4;
                            }else{
                                return null;
                            }
                        },
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;',
                            'class' => 'text-center'
                        ],
                        'class' => BadgeColumn::class,
                        'badgeOptions' => [
                            0 => ['class' => 'badge bg-danger'],
                            1 => ['class' => 'badge bg-warning'],
                            2 => ['class' => 'badge bg-success'],
                            3 => ['class' => 'badge bg-info'],
                            4 => ['class' => 'badge bg-primary'],
                        ],
                        'badgeValues' => PA::achievement()
                    ],
                ],
            ]);
            ?>
        </div>

        <?= $this->render('//parts/index_footer', get_defined_vars()); ?>
        <?php yii\widgets\Pjax::end() ?>
    </div>
</div>