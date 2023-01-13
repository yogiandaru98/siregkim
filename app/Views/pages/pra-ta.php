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
                        <li class="sidebar-item ">
                            <a href="profile" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Profil</span>
                            </a>
                        </li>

                        <li class="sidebar-item  active has-sub">
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
                <h3>Registrasi Pra-Tugas Akhir 1</h3>
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
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="month" class="form-control ms-1" id="month" name="month"
                                        value="">
                                    <label for="periode">Periode Seminar</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="text" class="form-control ms-1" id="judul" name="judul"
                                        value="">
                                    <label for="name">Judul Tugas Akhir</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="text" class="form-control ms-1" id="pbb1" name="pbb1" value="">
                                    <label for="pbb1">Dosen Pembimbing Akademik</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="number" class="form-control ms-1" id="nimpa" name="nimpa"
                                        value="">
                                    <label for="nimpa">NIM Dosen Pembimbing Akademik</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="text" class="form-control ms-1" id="pbb1" name="pbb1" value="">
                                    <label for="pbb1">Dosen Pembimbing 1</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="number" class="form-control ms-1" id="nimpbb1" name="nimpbb1"
                                        value="">
                                    <label for="nimpbb1">NIM Dosen Pembimbing 1</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="text" class="form-control ms-1" id="pbb2" name="pbb2" value="">
                                    <label for="pbb2">Dosen Pembimbing 2</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="number" class="form-control ms-1" id="nimpbb2" name="nimpbb2"
                                        value="">
                                    <label for="nimpbb2">NIM Dosen Pembimbing 2</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="text" class="form-control ms-1" id="penguji" name="penguji"
                                        value="">
                                    <label for="penguji">Dosen Penguji</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="number" class="form-control ms-1" id="nimpbhs" name="nimpbhs"
                                        value="">
                                    <label for="nimpbhs">NIM Dosen Pembahas</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="number" class="form-control ms-1" id="sks" name="sks" value="">
                                    <label for="sks">SKS</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input require type="number" class="form-control ms-1" id="ipk" name="ipk" value="">
                                    <label for="ipk">IPK</label>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Berkas Kelengkapan</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                                </div>
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