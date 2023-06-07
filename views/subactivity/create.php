<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subactivity $model */

$this->title = 'Create Subactivity';
$this->params['breadcrumbs'][] = ['label' => 'Subactivities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subactivity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
