<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SDA;
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
                        'urlCreator' => function ($action, SDA $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'template' => '{show}',
                        'urlCreator' => function ($name, $model) {
                            return [
                                $name, 'user_id' => $model->user_id, 'date' => $model->date
                            ];
                        },
                        'buttons' => [
                            'show' => function ($url, $model) {
                                return Html::a('<span class="text-primary"><i class="fa-solid fa-eye"></i></span>', $url, $options = [
                                    'data-pjax' => "0",
                                ]);
                            }
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
                        'attribute' => 'date',
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
                            if ($model->total > 99) {
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
                        'badgeValues' => SDA::achievement()
                    ],
                ],
            ]);
            ?>
        </div>

        <?= $this->render('//parts/index_footer', get_defined_vars()); ?>
        <?php yii\widgets\Pjax::end() ?>
    </div>
</div>