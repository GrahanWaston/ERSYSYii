<?php

/** @var yii\web\View $this */

$this->title = 'JMC Employee Report System';
?>
<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
    <div class="row">
        <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Production</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-bg-light">
                                            <i class="text-warning" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">2.382</h1>
                                <div class="mb-0">
                                    <span class="text-muted">Point Average</span>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">BD</h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="stat text-bg-light">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">103</h1>
                                <div class="mb-0">
                                    <span class="text-muted">Point Average</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Operation</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-bg-light">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">100</h1>
                                <div class="mb-0">
                                    <span class="text-muted">Point Average</span>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">XT</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-bg-light">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">100</h1>
                                <div class="mb-0">
                                    <span class="text-muted">Point Average</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">History Average EMA</h5>
                </div>
                <div class="card-body py-3">
                    <div class="chart chart-sm">
                        <canvas id="chartjs-dashboard-line"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-xxl-4 d-flex order-2 order-xxl-3">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Validation EMA</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="py-3">
                            <div class="chart chart-xs">
                                <canvas id="chartjs-dashboard-pie"></canvas>
                            </div>
                        </div>

                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>Invalid</td>
                                    <td class="text-end">47</td>
                                </tr>
                                <tr>
                                    <td>Validated</td>
                                    <td class="text-end">53</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xxl-4 d-flex order-2 order-xxl-3">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">History Average Weekly SDA</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="card-body d-flex w-100">
                            <div class="align-self-center chart chart-lg">
                                <canvas id="chartjs-dashboard-bar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xxl-4 d-flex order-2 order-xxl-3">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Validation SDA</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="py-3">
                            <div class="chart chart-xs">
                                <canvas id="chartjs-dashboard-pie-sda"></canvas>
                            </div>
                        </div>

                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>Invalid</td>
                                    <td class="text-end">47</td>
                                </tr>
                                <tr>
                                    <td>Validated</td>
                                    <td class="text-end">53</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Latest Projects</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-xl-table-cell">Project ID</th>
                            <th class="d-none d-xl-table-cell">Value</th>
                            <th>Status</th>
                            <th class="d-none d-md-table-cell">Client</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2021</td>
                            <td class="d-none d-xl-table-cell">Rp 100.000.000,00,-</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                        </tr>
                        <tr>
                            <td>Project Fireball</td>
                            <td class="d-none d-xl-table-cell">01/01/2021</td>
                            <td class="d-none d-xl-table-cell">Rp 102.000.000,00,-</td>
                            <td><span class="badge bg-danger">Cancelled</span></td>
                            <td class="d-none d-md-table-cell">William Harris</td>
                        </tr>
                        <tr>
                            <td>Project Hades</td>
                            <td class="d-none d-xl-table-cell">01/01/2021</td>
                            <td class="d-none d-xl-table-cell">Rp 123.000.000,00,-</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Sharon Lessman</td>
                        </tr>
                        <tr>
                            <td>Project Nitro</td>
                            <td class="d-none d-xl-table-cell">01/01/2021</td>
                            <td class="d-none d-xl-table-cell">Rp 151.000.000,00,-</td>
                            <td><span class="badge bg-warning">In progress</span></td>
                            <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                        </tr>
                        <tr>
                            <td>Project Phoenix</td>
                            <td class="d-none d-xl-table-cell">01/01/2021</td>
                            <td class="d-none d-xl-table-cell">Rp 98.000.000,00,-</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">William Harris</td>
                        </tr>
                        <tr>
                            <td>Project X</td>
                            <td class="d-none d-xl-table-cell">01/01/2021</td>
                            <td class="d-none d-xl-table-cell">Rp 180.000.000,00,-</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Sharon Lessman</td>
                        </tr>
                        <tr>
                            <td>Project Romeo</td>
                            <td class="d-none d-xl-table-cell">01/01/2021</td>
                            <td class="d-none d-xl-table-cell">Rp 132.000.000,00,-</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Christina Mason</td>
                        </tr>
                        <tr>
                            <td>Project Wombat</td>
                            <td class="d-none d-xl-table-cell">01/01/2021</td>
                            <td class="d-none d-xl-table-cell">Rp 153.000.000,00,-</td>
                            <td><span class="badge bg-warning">In progress</span></td>
                            <td class="d-none d-md-table-cell">William Harris</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>