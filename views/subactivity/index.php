<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Activity;
use yii\grid\ActionColumn;
use app\models\Subactivity;
use jeemce\grid\BadgeColumn;

/** @var yii\web\View $this */
/** @var app\models\activitySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Subactivites';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid p-0">
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-auto">
            <h1 class="h3 mb-3"><strong><?= Html::encode($this->title) ?></strong> Management</h1>
        </div>
        <div class="col-auto">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                    <button class="btn btn-primary btn-icon">Search</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <?php
            yii\widgets\Pjax::begin([
                'options' => ['class' => 'card flex-fill']
            ])
            ?>

            <div class="row justify-content-between align-items-center mb-3">
                <div class="col-auto mb-3 mb-md-0">
                    <div class="row gx-1">
                        <div class="card-header col">
                            <a href="<?= Url::toRoute(['form']); ?>" class="btn btn-primary" onclick="modalFormAjax(this, event)" data-pjax="0"><i class="align-middle" data-feather="book"></i>
                                <span class="text-light">Add Subactivity</span></a>

                            <a href="<?= Url::toRoute(['status', 'value' => 0]); ?>" type="submit" class="btn btn-danger" onclick="deleteAllConfirm(this, event)">
                                <i class="align-middle" data-feather="x-circle"></i>
                                <span class="text-light">Deactive</span>
                            </a>
                            <a href="<?= Url::toRoute(['status', 'value' => 1]); ?>" type="submit" class="btn btn-success" onclick="deleteAllConfirm(this, event)">
                                <i class="align-middle" data-feather="check-circle"></i>
                                <span class="text-light">Activate</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="row gx-2 align-items-center">
                        <div class="card-header col">
                            <select name="" id="" class="form-control">
                                <option selected disabled>Status Filter</option>
                                <option>Active</option>
                                <option>Deactive</option>
                            </select>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>

            <?= $this->render('index_header', get_defined_vars()); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items}',
                'options' => [
                    'class' => 'table-responsive'
                ],
                'columns' => [
                    ['class' => yii\grid\CheckboxColumn::class],
                    ['class' => yii\grid\SerialColumn::class],
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'template' => '{form}{delete}',
                        'buttons' => [
                            'form' => function ($url, $model) {
                                return Html::a('Edit', $url, $options = [
                                    'onclick' => "modalFormAjax(this, event)",
                                    'data-pjax' => "0"
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('Delete', $url, $options = [
                                    'onclick' => "deleteConfirm(this, event)",
                                    'data-pjax' => "0"
                                ]);
                            }
                        ]
                    ],
                    'id',
                    'name',
                    'activity.name',
                    [
                        'attribute' => 'status',
                        'class' => BadgeColumn::class,
                        'badgeOptions' => [
                            0 => ['class' => 'badge bg-danger'],
                            1 => ['class' => 'badge bg-success']
                        ],
                        'badgeValues' => Subactivity::status_options()
                    ],
                ],
            ]); ?>

            <?= $this->render('/parts/index_footer', get_defined_vars()); ?>
            <?php yii\widgets\Pjax::end() ?>
        </div>
    </div>
</div>