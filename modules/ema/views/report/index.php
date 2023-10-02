<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\EMA;
use yii\grid\ActionColumn;
use jeemce\grid\BadgeColumn;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Employee Monthly Activity (EMA)';
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
                        'urlCreator' => function ($action, EMA $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'template' => '{show}{print}',
                        'urlCreator' => function ($name, $model) {
                            return [
                                $name, 'user_id' => $model->user_id, 'month' => $model->month
                            ];
                        },
                        'buttons' => [
                            'show' => function ($url, $model) {
                                return Html::a('<span class="text-primary"><i class="fa-solid fa-eye"></i></span>', $url, $options = [
                                    'data-pjax' => "0",
                                ]);
                            },
                            'print' => function ($url, $model) {
                                return Html::a('<span class="text-info ms-2"><i class="fa-solid fa-print"></i></span>', $url, []);
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
                            if ($model->total >= 2000) {
                                return 1;
                            } else {
                                return 0;
                            }
                        },
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;',
                            'class' => 'text-center'
                        ],
                        'class' => BadgeColumn::class,
                        'badgeOptions' => [
                            0 => ['class' => 'badge bg-danger'],
                            1 => ['class' => 'badge bg-success']
                        ],
                        'badgeValues' => EMA::achievement()
                    ],
                ],
            ]);
            ?>
        </div>

        <?= $this->render('//parts/index_footer', get_defined_vars()); ?>
        <?php yii\widgets\Pjax::end() ?>
    </div>
</div>