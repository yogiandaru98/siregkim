<?php $autoload['helper'] = array('url', 'html'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIREGKIM</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/main/app.css')?> ">
    <link rel="stylesheet" href="<?= base_url('assets/css/main/app-dark.css')?> ">
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.svg')?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.png')?>" type="image/png">

    <link rel="stylesheet" href="<?= base_url('assets/css/shared/iconly.css')?> ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="dashboard"><img src="<?= base_url('assets/images/logo/logo.svg')?>" alt="Logo"
                                    srcset=""></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="profile" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Profil</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Registrasi Seminar</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="pkl">Praktik Kerja Lapangan</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="pra-ta">Pra-Tugas Akhir 1</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ta-1">Tugas Akhir 1</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ta-2">Tugas Akhir 2</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="kompre">Ujian Komprehensif</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item ">
                            <a href="profile" class='sidebar-link'>
                                <i class="bi bi-mortarboard-fill"></i>
                                <span>Registrasi Alumni</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Profil</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-3">
                                <div class="col-12 d-flex justify-content-end">
                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-user-edit text-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Profil" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"></i>Edit Profil</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td style="width: 20% !important;">Nama Lengkap</td>
                                            <td style="width: 5% !important;">:</td>
                                            <td style="width: 75% !important;">Azka Yogi Karina</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20% !important;">NPM</td>
                                            <td style="width: 5% !important;">:</td>
                                            <td style="width: 75% !important;">20170510</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20% !important;">Tanggal Lahir</td>
                                            <td style="width: 5% !important;">:</td>
                                            <td style="width: 75% !important;">12 Januari 2023</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20% !important;">Tahun Masuk</td>
                                            <td style="width: 5% !important;">:</td>
                                            <td style="width: 75% !important;">12 Januari 2023</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20% !important;">Jenis Kelamin</td>
                                            <td style="width: 5% !important;">:</td>
                                            <td style="width: 75% !important;">Perempuan</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20% !important;">Alamat</td>
                                            <td style="width: 5% !important;">:</td>
                                            <td style="width: 75% !important;">Bandar Lampung</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20% !important;">E-mail</td>
                                            <td style="width: 5% !important;">:</td>
                                            <td style="width: 75% !important;">lalalala@gmail.com</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20% !important;">Nomor Telepon</td>
                                            <td style="width: 5% !important;">:</td>
                                            <td style="width: 75% !important;">082332889475</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-sm-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action='updateProfile' method="POST">
                                <div class="form-floating">
                                    <input type="hidden" class="form-control ms-1">
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="text" class="form-control ms-1" id="name" name="name" value="">
                                    <label for="name">Nama Lengkap</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="text" class="form-control ms-1" id="npm" name="npm" value="">
                                    <label for="npm">NPM</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="date" class="form-control ms-1" id="date" name="date" value="">
                                    <label for="date">Tanggal Lahir</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="date" class="form-control ms-1" id="date" name="date" value="">
                                    <label for="tahun">Tahun Masuk</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select ms-1" aria-label=".form-select-sm" name="kelamin">
                                        <option value="Laki-laki" selected>Jenis kelamin</option>
                                        <option value="Perempuan">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <label for="gender">Jenis Kelamin</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control ms-1" id="address" name="address"></textarea>
                                    <label for="address">Alamat</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control ms-1" id="email" name="email" value="">
                                    <label for="email">E-mail</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control ms-1" id="phone" name="phone" value="">
                                    <label for="phone">Nomor Telepon</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Jurusan Kimia Fakultas Matematika dan Ilmu Pengetahuan Alam</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url('assets/js/bootstrap.js')?> "></script>
    <script src="<?= base_url('assets/js/app.js')?> "></script>

    <!-- Need: Apexcharts -->
    <script src="<?= base_url('assets/extensions/apexcharts/apexcharts.min.js')?> "></script>
    <script src="<?= base_url('assets/js/pages/dashboard.js')?> "></script>

</body>

</html>