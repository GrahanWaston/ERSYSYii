<?php

/** @var yii\web\View $this */
/** @var string $content */

use yii\helpers\Json;
use app\widgets\Alert;
use yii\bootstrap5\Nav;
use app\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Breadcrumbs;


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
                        <a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/site/index']) ?>">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Menu Management
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/project/index']) ?>">
                            <i class="align-middle" data-feather="server"></i> <span class="align-middle">Project Management</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#activity" data-bs-toggle="collapse" class="sidebar-link collapsed dropdown-toggle">
                            <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Activity Management</span>
                        </a>
                        <ul id="activity" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-subitem"><a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/activity/index']) ?>"><i class="align-middle" data-feather="chevron-right"></i>Activity</a></li>
                            <li class="sidebar-subitem"><a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/subactivity/index']) ?>"><i class="align-middle" data-feather="chevron-right"></i>Sub Activity</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/ema/index']) ?>">
                            <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">EMA Management</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="management-sda.html">
                            <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">SDA Management</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="management-pa.html">
                            <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">PA Management</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= \yii\helpers\Url::to(['/reference/index']) ?>">
                            <i class="align-middle" data-feather="file-plus"></i> <span class="align-middle">Reference</span>
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

                    <li class="sidebar-header">
                        Report
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="report.html">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Production Cost Report</span>
                        </a>
                    </li>
                </ul>

                <div class="mt-3 text-center py-3 border-top bg-light">
                    <img class="mb-2" src="<?= $assets->baseUrl ?>/img/icons/jmc.svg" height="25" alt="">
                    <div class="text-muted">Powered by JMC Indonesia</div>
                </div>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
                <div>
                    <img src="<?= $assets->baseUrl ?>/img/icons/jmc.svg" height="15" class="mr" alt="">
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
                                <span class="text-dark">Waston</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
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
            <div class="modal-content">
                <div class="modal-status bg-success"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 9v2m0 4v.01"></path>
                        <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"></path>
                    </svg>
                    <h3><?= Yii::t('app', 'Hapus Data') ?></h3>
                    <div class="text-muted">
                        Apakah anda yakin hapus? Data tidak dapat dikembalikan!
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn w-100" data-bs-dismiss="modal">Batal</a>
                            </div>
                            <div class="col">
                                <a href="#" class="action-delete-confirm btn btn-danger w-100">Yakin</a>
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

    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        //     var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        //     gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        //     gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
        //     // Line chart
        //     new Chart(document.getElementById("chartjs-dashboard-line"), {
        //         type: "line",
        //         data: {
        //             labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        //             datasets: [{
        //                 label: "Poin",
        //                 fill: true,
        //                 backgroundColor: gradient,
        //                 borderColor: window.theme.warning,
        //                 data: [
        //                     2115,
        //                     1562,
        //                     1584,
        //                     1892,
        //                     1587,
        //                     1923,
        //                     2566,
        //                     2448,
        //                     2805,
        //                     3438,
        //                     2917,
        //                     3327
        //                 ]
        //             }]
        //         },
        //         options: {
        //             maintainAspectRatio: false,
        //             legend: {
        //                 display: false
        //             },
        //             tooltips: {
        //                 intersect: false
        //             },
        //             hover: {
        //                 intersect: true
        //             },
        //             plugins: {
        //                 filler: {
        //                     propagate: false
        //                 }
        //             },
        //             scales: {
        //                 xAxes: [{
        //                     reverse: true,
        //                     gridLines: {
        //                         color: "rgba(0,0,0,0.0)"
        //                     }
        //                 }],
        //                 yAxes: [{
        //                     ticks: {
        //                         stepSize: 1000
        //                     },
        //                     display: true,
        //                     borderDash: [3, 3],
        //                     gridLines: {
        //                         color: "rgba(0,0,0,0.0)"
        //                     }
        //                 }]
        //             }
        //         }
        //     });
        // });
    </script>
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     // Pie chart
        //     new Chart(document.getElementById("chartjs-dashboard-pie"), {
        //         type: "pie",
        //         data: {
        //             labels: ["Chrome", "Firefox", "IE"],
        //             datasets: [{
        //                 data: [47, 53],
        //                 backgroundColor: [
        //                     window.theme.dark,
        //                     window.theme.warning
        //                 ],
        //                 borderWidth: 5
        //             }]
        //         },
        //         options: {
        //             responsive: !window.MSInputMethodContext,
        //             maintainAspectRatio: false,
        //             legend: {
        //                 display: false
        //             },
        //             cutoutPercentage: 75
        //         }
        //     });
        // });
    </script>
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     // Pie chart
        //     new Chart(document.getElementById("chartjs-dashboard-pie-sda"), {
        //         type: "pie",
        //         data: {
        //             labels: ["Chrome", "Firefox", "IE"],
        //             datasets: [{
        //                 data: [47, 53],
        //                 backgroundColor: [
        //                     window.theme.dark,
        //                     window.theme.warning
        //                 ],
        //                 borderWidth: 5
        //             }]
        //         },
        //         options: {
        //             responsive: !window.MSInputMethodContext,
        //             maintainAspectRatio: false,
        //             legend: {
        //                 display: false
        //             },
        //             cutoutPercentage: 75
        //         }
        //     });
        // });
    </script>
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     // Bar chart
        //     new Chart(document.getElementById("chartjs-dashboard-bar"), {
        //         type: "bar",
        //         data: {
        //             labels: ["1", "2", "3", "4", "5", "6", "7"],
        //             datasets: [{
        //                 label: "This year",
        //                 backgroundColor: window.theme.warning,
        //                 borderColor: window.theme.dark,
        //                 hoverBackgroundColor: window.theme.success,
        //                 hoverBorderColor: window.theme.warning,
        //                 data: [54, 67, 41, 55, 62, 45, 55],
        //                 barPercentage: .75,
        //                 categoryPercentage: .5
        //             }]
        //         },
        //         options: {
        //             maintainAspectRatio: false,
        //             legend: {
        //                 display: false
        //             },
        //             scales: {
        //                 yAxes: [{
        //                     gridLines: {
        //                         display: false
        //                     },
        //                     stacked: false,
        //                     ticks: {
        //                         stepSize: 20
        //                     }
        //                 }],
        //                 xAxes: [{
        //                     stacked: false,
        //                     gridLines: {
        //                         color: "transparent"
        //                     }
        //                 }]
        //             }
        //         }
        //     });
        // });
    </script>
</body>

</html>
<?php $this->endPage() ?>