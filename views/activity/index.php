<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Activity;
use yii\grid\ActionColumn;
use jeemce\grid\BadgeColumn;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Activity';
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
                    <i class="fa-regular fa-clipboard"></i>
                    <span class="text-light">Add Activity</span>
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
                            'headerOptions' => ['style' => 'width:75px', 'class' => 'text-center'],
                            'contentOptions' => ['class' => 'd-flex gap-2 justify-content-between h-100'], 
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Activity $model, $key, $index, $column) {
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
                                    return Html::a('<span class="text-danger"><i class="fa-solid fa-trash"></i></span>', $url, $options = [
                                        'onclick' => "deleteConfirm(this, event)",
                                        'data-pjax' => "0"
                                    ]);
                                }
                            ]
                        ],
                        [
                            'attribute' => 'name',
                            'contentOptions' => [
                                'style' => 'min-width:150px; vertical-align:top;'
                            ],
                        ],
                        [
                            'attribute' => 'subactivities',
                            'contentOptions' => [
                                'style' => 'min-width:auto; vertical-align:top;'
                            ],
                            'value' => function ($model) {
                                return $model->getSubactivityCount();
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'contentOptions' => [
                                'style' => 'min-width:auto; vertical-align:top;'
                            ],
                            'class' => BadgeColumn::class,
                            'badgeOptions' => [
                                0 => ['class' => 'badge bg-danger'],
                                1 => ['class' => 'badge bg-success']
                            ],
                            'badgeValues' => Activity::status_options()
                        ],
                    ],
                ]);
            ?>
        </div>

        <?= $this->render('/parts/index_footer', get_defined_vars()); ?>
        <?php yii\widgets\Pjax::end() ?>
    </div>
</div>