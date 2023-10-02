<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use app\assets\AppAsset;
use yii\bootstrap5\ActiveForm;

$assets = AppAsset::register($this);

$this->title = 'Login - JMC Employee Report System';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['enableClientValidation' => true, 'action' => ['site/login']]); ?>
<div class="card">
    <div class="card-header d-flex justify-content-center align-items-center bg-transparent">
        <div class="mx-auto d-grid">
            <img src="<?= $assets->baseUrl ?>/img/photos/logoersys.png" height="85" alt="">
        </div>
    </div>
    <div class="card-body">
        <form method="POST" class="d-grid">
            <div class="form-group mb-4">
                <?= $form->field($model, 'username', ['template' => '{input}{error}', 'options' => ['class' => '']])->textInput(['class' => 'form-control', 'placeholder' => 'Username']); ?>
            </div>
            <div class="form-group mb-4">
                <?= $form->field($model, 'password', ['template' => '{input}{error}'])->passwordInput(['class' => 'form-control', 'placeholder' => 'Password'])->label(false); ?>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-warning btn-block">Masuk</button>
            </div>
        </form>
    </div>
    <div class="card-footer d-flex justify-content-center align-items-center bg-white py-4">
        <img src="<?= $assets->baseUrl ?>/img/icons/jmc.svg" height="15" class="mr" alt="">
        <span class="d-none ms-2 d-md-inline-block">Employee Report System &copy; <?= Date('Y') ?></span>
    </div>
</div>
<?php ActiveForm::end(); ?>