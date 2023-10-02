<?php

/** @var yii\web\View $this */
/** @var string $content */

use yii\helpers\Json;
use app\assets\AppAsset;
use yii\bootstrap5\Html;

$assets = AppAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="<?= $assets->baseUrl ?>/img/icons/jeemce.ico" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>JMC Employee Report System</title>

    <style>
        .main {
            background: #dc3545;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .card{
            width: 36rem;
            background: rgba(0, 0, 0, 0.75);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.5px);
            -webkit-backdrop-filter: blur(6.5px);
        }
    </style>

</head>

<body>
    <?php $this->beginBody() ?>
    <div id="wait" class="wait">
        <div class="spin" style="margin-top: 15px;"></div>
    </div>

    <div class="wrapper">
        <div class="main" style="">
            <main class="content container mx-auto d-flex align-items-center">
                <?= $content ?>
            </main>
        </div>
    </div>

    <?= Html::script(
        Json::encode((object) Yii::$app->session->getAllFlashes(true)),
        ['id' => 'sessionFlashes', 'type' => 'application/json']
    ) ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>