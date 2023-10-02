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

$days        = $query->count();
$total_score = $query->sum('total');
$achieved    = $query->having(['>', 'total', 99])->count();
$unachieved  = $query->having(['<', 'total', 99])->count();
?>
<style>
    @media print {
        body {
            visibility: hidden;
        }

        #printArea {
            visibility: visible;
            width: 100%;
        }
    }
</style>

<div class="container-fluid d-grid w-100">
    <div id="printArea" class="d-grid w-100 min-vh-100 bg-white mx-auto">
        <div class="m-5 text-center border-bottom pb-5">
            <img src="<?= $assets->baseUrl ?>/img/icons/jmc.svg" height="50" class="img-fluid me-3" alt="">
            <h1 class="d-none d-md-inline-block text-muted">Employee Report System</h1>
        </div>

        <!-- Employee Identity -->
        <div class="mx-5 mb-5">
            <table class="table">
                <tbody>
                    <tr style="border-bottom:hidden;">
                        <td class="fw-bold" width="250px">Nama</td>
                        <td width="5px">:</td>
                        <td>JMC Developer</td>
                    </tr>
                    <tr style="border-bottom:hidden;">
                        <td class="fw-bold" width="250px">Department</td>
                        <td width="5px">:</td>
                        <td>Business Development</td>
                    </tr>
                    <tr style="border-bottom:hidden;">
                        <td class="fw-bold" width="250px">Position</td>
                        <td width="5px">:</td>
                        <td>Marketing</td>
                    </tr>
                    <tr style="border-bottom:hidden;">
                        <td class="fw-bold" width="250px">Jumlah Hari Kerja / Cuti / Izin</td>
                        <td width="5px">:</td>
                        <td><?= $days ?> / 0 / 0</td>
                    </tr>
                    <tr style="border-bottom:hidden;">
                        <td class="fw-bold" width="250px">Target Skor Akumulasi <?= $days ?> Hari</td>
                        <td width="5px">:</td>
                        <td><?= $days * 99 ?></td>
                    </tr>
                    <tr style="border-bottom:hidden;">
                        <td class="fw-bold" width="250px">Skor Akumulasi <?= $days ?> Hari</td>
                        <td width="5px">:</td>
                        <td><?= $total_score ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Achievements -->
        <div class="mx-5 row mb-5">
            <div class="col-sm-8 table-responsive">
                <table class="table border">
                    <thead>
                        <tr>
                            <th>Ketercapaian Hari</th>
                            <th>Jumlah</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tercapai</td>
                            <td><?= $achieved ?></td>
                            <td><?= number_format((float)($achieved / $days) * 100) ?>%</td>
                        </tr>
                        <tr>
                            <td>Tidak Tercapai</td>
                            <td><?= $unachieved ?></td>
                            <td><?= number_format((float)($unachieved / $days) * 100) ?>%</td>
                        </tr>
                        <tr>
                            <td>Laporan Kosong</td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <!-- <canvas id="daily_achievement" height="175"></canvas> -->
            </div>
        </div>

        <!-- Activity Summary -->
        <div class="mx-5 row mb-5">
            <div class="col-sm-8 table-responsive">
                <table class="table border">
                    <thead>
                        <tr>
                            <th>Tahapan</th>
                            <th>Nilai</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($activity_summary as $l) { ?>
                            <tr>
                                <td><?= $l['activity'] ?></td>
                                <td><?= $l['total'] ?></td>
                                <td>%</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <!-- <canvas id="activity_achievement" height="175"></canvas> -->
            </div>
        </div>

        <!-- Subctivity Summary -->
        <div class="mx-5 row mb-5">
            <div class="col-sm-8 table-responsive">
                <table class="table border">
                    <thead>
                        <tr>
                            <th>Tahapan</th>
                            <th>Nilai</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subactivity_summary as $l) { ?>
                            <tr>
                                <td><?= $l['subactivity'] ?></td>
                                <td><?= $l['total'] ?></td>
                                <td>%</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <!-- <canvas id="subactivity_achievement" height="175"></canvas> -->
            </div>
        </div>
    </div>

    <div class="p-5 bg-white">
        <div class="d-flex justify-content-between">
            <?= Html::a('Cancel', ["#!"], ['class' => 'btn btn-danger']) ?>
            <button type="button" class="btn btn-dark" onclick="print('printArea')">Print</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

<script>
    const daily_achievement = document.getElementById('daily_achievement');
    new Chart(daily_achievement, {
        type: 'pie',
        data: {
            labels: ['Tercapai', 'Tidak Tercapai', 'Laporan Kosong'],
            datasets: [{
                data: [21, 1, 0],
                borderWidth: .25,
                backgroundColor: [
                    '#1d8fc3',
                    '#fcb906',
                    '#fa4345'
                ],
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                },
            },
            responsive: false,
            maintainAspectRatio: false
        },
        plugins: [
            ChartDataLabels
        ]
    });

    const activity_achievement = document.getElementById('activity_achievement');
    new Chart(activity_achievement, {
        type: 'pie',
        data: {
            labels: ['Promotion', 'Selling', 'After Sales', 'Agenda Pendamping', 'Unknown'],
            datasets: [{
                data: [33, 17, 4, 2, 45],
                borderWidth: .25,
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                },
            },
            responsive: false,
            maintainAspectRatio: false
        },
        plugins: [
            ChartDataLabels
        ]
    });

    function printDiv(element) {
        var printContents = $(element);
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>