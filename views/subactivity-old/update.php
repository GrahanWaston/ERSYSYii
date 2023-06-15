<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subactivity $model */

$this->title = 'Update Subactivity: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subactivities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subactivity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
