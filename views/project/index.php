<?php

/** @var yii\web\View $this */

$this->title = 'JMC Employee Report System';
?>

<div class="container-fluid p-0">
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-auto">
            <h1 class="h3 mb-3"><strong>Management</strong> Projects</h1>
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
                            <div class="card-header col">
                                <a href="add-projects.html" class="btn btn-primary"><i class="align-middle" data-feather="user-plus"></i>
                                    <span class="text-light">Add Project</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="row gx-2 align-items-center">
                            <div class="card-header col">
                                <select name="" id="" class="form-select">
                                    <option selected disabled>Filter Status</option>
                                    <option>Active</option>
                                    <option>Deactive</option>
                                </select>
                            </div>
                            <div class="card-header col">
                                <select name="" id="" class="form-select">
                                    <option selected disabled>Select Year</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" class="checkall"></th>
                                <th>Name</th>
                                <th class="d-xl-table-cell">Project ID</th>
                                <th class="d-xl-table-cell">Value</th>
                                <th class="d-md-table-cell">Client</th>
                                <th class="d-md-table-cell">Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>Project Apollo</td>
                                <td class="d-xl-table-cell">01/01/2021</td>
                                <td class="d-xl-table-cell">Rp 100.000.000,00,-</td>
                                <td class="d-md-table-cell">Vanessa Tucker</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td class="table-action">
                                    <a href="add-projects.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                            </path>
                                        </svg></a>
                                    <a href="#"><i class="align-middle" data-feather="x-square"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>Project Fireball</td>
                                <td class="d-xl-table-cell">01/01/2021</td>
                                <td class="d-xl-table-cell">Rp 102.000.000,00,-</td>
                                <td class="d-md-table-cell">William Harris</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td class="table-action">
                                    <a href="add-projects.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                            </path>
                                        </svg></a>
                                    <a href="#"><i class="align-middle" data-feather="x-square"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>Project Hades</td>
                                <td class="d-xl-table-cell">01/01/2021</td>
                                <td class="d-xl-table-cell">Rp 123.000.000,00,-</td>
                                <td class="d-md-table-cell">Sharon Lessman</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td class="table-action">
                                    <a href="add-projects.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                            </path>
                                        </svg></a>
                                    <a href="#"><i class="align-middle" data-feather="x-square"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>Project Nitro</td>
                                <td class="d-xl-table-cell">01/01/2021</td>
                                <td class="d-xl-table-cell">Rp 151.000.000,00,-</td>
                                <td class="d-md-table-cell">Vanessa Tucker</td>
                                <td><span class="badge bg-secondary">Deactive</span></td>
                                <td class="table-action">
                                    <a href="add-projects.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                            </path>
                                        </svg></a>
                                    <a href="#"><i class="align-middle" data-feather="x-square"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>Project Phoenix</td>
                                <td class="d-xl-table-cell">01/01/2021</td>
                                <td class="d-xl-table-cell">Rp 98.000.000,00,-</td>
                                <td class="d-md-table-cell">William Harris</td>
                                <td><span class="badge bg-secondary">Deactive</span></td>
                                <td class="table-action">
                                    <a href="add-projects.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                            </path>
                                        </svg></a>
                                    <a href="#"><i class="align-middle" data-feather="x-square"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>Project X</td>
                                <td class="d-xl-table-cell">01/01/2021</td>
                                <td class="d-xl-table-cell">Rp 180.000.000,00,-</td>
                                <td class="d-md-table-cell">Sharon Lessman</td>
                                <td><span class="badge bg-secondary">Deactive</span></td>
                                <td class="table-action">
                                    <a href="add-projects.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                            </path>
                                        </svg></a>
                                    <a href="#"><i class="align-middle" data-feather="x-square"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>Project Romeo</td>
                                <td class="d-xl-table-cell">01/01/2021</td>
                                <td class="d-xl-table-cell">Rp 132.000.000,00,-</td>
                                <td class="d-md-table-cell">Christina Mason</td>
                                <td><span class="badge bg-secondary">Deactive</span></td>
                                <td class="table-action">
                                    <a href="add-projects.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                            </path>
                                        </svg></a>
                                    <a href="#"><i class="align-middle" data-feather="x-square"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>Project Wombat</td>
                                <td class="d-xl-table-cell">01/01/2021</td>
                                <td class="d-xl-table-cell">Rp 153.000.000,00,-</td>
                                <td class="d-md-table-cell">William Harris</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td class="table-action">
                                    <a href="add-projects.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                            </path>
                                        </svg></a>
                                    <a href="#"><i class="align-middle" data-feather="x-square"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row justify-content-between align-items-center mb-3">
                    <div class="col-auto mb-3 mb-md-0">
                        <div class="row gx-2">
                            <div class="col" style="margin-left: 2vh;">
                                Showing 1 to 8 of 8 entries
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