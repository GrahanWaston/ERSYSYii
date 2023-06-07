<?php

use app\models\Reference;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\searchReference $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'References';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid p-0">
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-auto">
            <h1 class="h3 mb-3"><strong>Add Reference</strong> Performance Appraisal</h1>
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
            <div class="card flex-fill">
                <div class="row justify-content-between align-items-center mb-3">
                    <div class="col-auto mb-3 mb-md-0">
                        <div class="row gx-1">
                            <div class="container mt-2 col">
                                <button type="submit" class="btn btn-warning"><i class="align-middle" data-feather="check"></i>
                                    <span class="text-light">Activated</span></button>
                                <button type="submit" class="btn btn-danger"><i class="align-middle" data-feather="x"></i>
                                    <span class="text-light">Disable</span></button>
                                <a href="add-kpi.html"><button class="btn btn-primary"><i class="align-middle" data-feather="edit"></i> Create
                                        Reference KPI</button></a>
                                <div class="container mt-3">
                                    <div class="row justify-content-between mb-3 ">
                                        <div class="col mb-md-0">
                                            <select name="" id="" class="form-control">
                                                <option selected disabled>Status Filter</option>
                                                <option>Active</option>
                                                <option>Disable</option>
                                            </select>
                                        </div>

                                        <div class="col mb-3 mb-md-0">
                                            <button type="submit" class="btn btn-primary">Apply</button>
                                        </div>

                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" class="checkall"></th>
                                    <th class="d-xl-table-cell">No</th>
                                    <th class="d-md-table-cell">KPI</th>
                                    <th class="d-md-table-cell">Value</th>
                                    <th class="d-md-table-cell">Status</th>
                                    <th class="d-md-table-cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>1</td>
                                    <td class="d-xl-table-cell ">Kualitas media promosi</td>
                                    <td class="d-xl-table-cell">50</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td class="table-action">
                                        <a href="add-kpi.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                </path>
                                            </svg></a>
                                        <a href="#"><i class="align-middle" data-feather="x"></i></a>

                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>2</td>
                                    <td class="d-xl-table-cell ">Kualitas riset dan inovasi pemasaran</td>
                                    <td class="d-xl-table-cell">20</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td class="table-action">
                                        <a href="add-kpi.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                </path>
                                            </svg></a>
                                        <a href="#"><i class="align-middle" data-feather="x"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="row justify-content-between align-items-center mb-3">
                        <div class="col-auto mb-3 mb-md-0">
                            <div class="row gx-2">
                                <div class="col" style="margin-left: 2vh;">
                                    Showing 1 to 2 of 2 entries
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="row gx-2 align-items-center">
                                <div class="col-auto">
                                    <button class="btn btn-icon btn-white">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="15 6 9 12 15 18" />
                                        </svg>
                                    </button>
                                    <button class="btn btn-white">1</button>
                                    <button class="btn btn-icon btn-white">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="9 6 15 12 9 18" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>