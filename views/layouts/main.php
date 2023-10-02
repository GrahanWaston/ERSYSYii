<?php

/** @var yii\web\View $this */
/** @var string $content */

use yii\helpers\Json;
use app\assets\AppAsset;
use yii\bootstrap5\Html;


$assets = AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>

<?php $this->registerJs(<<<'JAVASCRIPT'
	$('#sidebar').find('li.sidebar-item a.sidebar-link:not(.dropdown-toggle)').each(function() { 
        if (window.location.pathname.includes(this.pathname)) {
			$(this).parent().addClass('active');
		}
	});

	$('#sidebar').find('li.sidebar-subitem a.sidebar-link:not(.dropdown-toggle)').each(function() { 
        if (window.location.pathname.includes(this.pathname)) {
            $(this).addClass('text-light').parent().parent().toggleClass('active show');
            $(this).parent().parent().parent().toggleClass('active');
		}
	});
JAVASCRIPT) ?>


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

    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js" integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>JMC Employee Report System</title>

    <style>

    </style>

</head>

<body>
    <?php $this->beginBody() ?>
    <div id="wait" class="wait">
        <div class="spin" style="margin-top: 15px;"></div>
    </div>

    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand text-center" href="<?= \yii\helpers\Url::to(['/site/index']) ?>">
                    <img src="<?= $assets->baseUrl ?>/img/photos/logoersys.png" height="85" alt="">
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        General Dashboard
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/dashboard']) ?>">
                            <i class="fa-solid fa-gauge align-middle fs-4"></i>
                            <span class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Menu Management
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/project']) ?>">
                            <i class="fa-solid fa-briefcase align-middle fs-4"></i>
                            <span class="align-middle">Project Management</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#activity" data-bs-toggle="collapse" class="sidebar-link collapsed dropdown-toggle">
                            <i class="fa-solid fa-clipboard-check align-middle fs-4"></i>
                            <span class="align-middle">Activity Management</span>
                        </a>
                        <ul id="activity" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-subitem"><a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/activity']) ?>"><i class="align-middle" data-feather="chevron-right"></i>Activity</a></li>
                            <li class="sidebar-subitem"><a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/subactivity']) ?>"><i class="align-middle" data-feather="chevron-right"></i>Subactivity</a></li>
                            <li class="sidebar-subitem"><a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/kpi']) ?>"><i class="align-middle" data-feather="chevron-right"></i>Key Performance Index</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-header">
                        Employee Section
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/ema']) ?>">
                            <i class="fa-solid fa-clipboard-list align-middle fs-4"></i>
                            <span class="align-middle">Employee Monthly Activity</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/sda']) ?>">
                            <i class="fa-solid fa-clipboard-list align-middle fs-4"></i>
                            <span class="align-middle">Sales Daily Activity</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/pa']) ?>">
                            <i class="fa-solid fa-clipboard-list align-middle fs-4"></i>
                            <span class="align-middle">Performance Apraisal</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Report
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="report.html">
                            <i class="fa-solid fa-receipt align-middle fs-4"></i>
                            <span class="align-middle">Production Cost Report</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/ema/report/index']) ?>">
                            <i class="fa-solid fa-receipt align-middle fs-4"></i>
                            <span class="align-middle">Employee Monthly Activity</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#sda" data-bs-toggle="collapse" class="sidebar-link collapsed dropdown-toggle">
                            <i class="fa-solid fa-receipt align-middle fs-4"></i>
                            <span class="align-middle">Sales Daily Activity</span>
                        </a>
                        <ul id="sda" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-subitem"><a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/sda/report/index']) ?>"><i class="align-middle" data-feather="chevron-right"></i>Daily Report</a></li>
                            <li class="sidebar-subitem"><a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/sda/report/monthly']) ?>"><i class="align-middle" data-feather="chevron-right"></i>Monthly Report</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/pa/report/index']) ?>">
                            <i class="fa-solid fa-receipt align-middle fs-4"></i>
                            <span class="align-middle">Performance Apraisal</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Sessions & Users
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="management-user.html">
                            <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">User Management</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="management-session.html">
                            <i class=" align-middle" data-feather="clock"></i> <span class="align-middle">Session Management</span>
                        </a>
                    </li>
                </ul>

                <div class="mt-3 text-center py-1 border-top bg-light">
                    <img class="mb-2" src="<?= $assets->baseUrl ?>/img/icons/jmc.svg" height="25" alt="JMC Indonesia">
                    <div class="text-muted">Powered by JMC Indonesia</div>
                </div>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle text-decoration-none">
                    <i class="fa-solid fa-bars align-self-center fs-3 text-dark"></i>
                    <!-- <i class="hamburger align-self-center"></i> -->
                </a>
                <div>
                    <img src="<?= $assets->baseUrl ?>/img/icons/jmc.svg" height="15" class="me-1" alt="">
                    <span class="d-none d-md-inline-block">Employee Report System</span>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="user"></i>
                                <span class="text-dark">JMC Developer</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#!"><i class="align-middle me-1" data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <?= $content ?>
            </main>
        </div>
    </div>

    <div id="modal-form-ajax" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"></div>
        </div>
    </div>

    <div id="modal-delete-confirm" class="modal fade modal-blur" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content bg-white">
                <div class="modal-status bg-success"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 9v2m0 4v.01"></path>
                        <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"></path>
                    </svg>
                    <h3><?= Yii::t('app', 'Delete') ?></h3>
                    <div class="text-muted">
                        Are you sure you want to continue this?
                    </div>
                </div>
                <div class="modal-footer bg-white d-flex justify-content-between">
                    <div class="w-100">
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn w-100" data-bs-dismiss="modal">Cancel</a>
                            </div>
                            <div class="col">
                                <a href="#" class="action-delete-confirm btn btn-danger w-100">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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