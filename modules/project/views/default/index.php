<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Project;
use yii\grid\ActionColumn;
use jeemce\grid\BadgeColumn;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Project';
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
                <a href="<?= Url::toRoute(['form']); ?>" class="btn btn-primary" onclick="modalFormAjax(this, event)" data-pjax="0">
                    <i class="fa-solid fa-briefcase"></i>
                    <span class="text-light">Add Project</span>
                </a>
                <a href="<?= Url::toRoute(['status', 'value' => 1]); ?>" type="submit" class="btn btn-success" onclick="deleteAllConfirm(this, event)">
                    <i class="fa-regular fa-circle-check"></i>
                    <span class="text-light">Activate</span>
                </a>
                <a href="<?= Url::toRoute(['status', 'value' => 0]); ?>" type="submit" class="btn btn-danger" onclick="deleteAllConfirm(this, event)">
                    <i class="fa-regular fa-circle-xmark"></i>
                    <span class="text-light">Deactive</span>
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
                    'class' => 'table-responsive'
                ],
                'tableOptions' => ['class' => 'table table-hover'],
                'columns' => [
                    ['class' => yii\grid\CheckboxColumn::class],
                    ['class' => yii\grid\SerialColumn::class],
                    [
                        'header' => 'Action',
                        'headerOptions' => ['style' => 'width:100px;', 'class' => 'text-center'],
                        'contentOptions' => ['style' => 'vertical-align:center', 'class' => 'text-center'],
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, Project $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'template' => '{form}{delete}',
                        'buttons' => [
                            'form' => function ($url, $model) {
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
                        'attribute' => 'code',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'attribute' => 'name',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'attribute' => 'value',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                        'format' =>  [
                            'currency',
                            'Rupiah',
                            [
                                \NumberFormatter::MIN_FRACTION_DIGITS => 0,
                                \NumberFormatter::MAX_FRACTION_DIGITS => 0,
                            ],
                        ],
                    ],
                    [
                        'attribute' => 'year',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'attribute' => 'client',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;'
                        ],
                    ],
                    [
                        'attribute' => 'status',
                        'contentOptions' => [
                            'style' => 'min-width:150px; vertical-align:top;',
                            'class' => 'text-center'
                        ],
                        'enableSorting' => false,
                        'class' => BadgeColumn::class,
                        'badgeOptions' => [
                            0 => ['class' => 'badge bg-danger'],
                            1 => ['class' => 'badge bg-success']
                        ],
                        'badgeValues' => Project::status_options()
                    ],
                ],
            ]);
            ?>
        </div>

        <?= $this->render('//parts/index_footer', get_defined_vars()); ?>
        <?php yii\widgets\Pjax::end() ?>
    </div>
</div>