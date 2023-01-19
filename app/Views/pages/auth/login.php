<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIREGKIM</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="dashboard"><img src="assets/images/logo/Unila.png" alt="Logo"></a>
            </div>
            <h1 class="auth-title">SIREGKIM</h1>
            <form action="dashboard">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
            <div class="text-center mt-3">
                <p><a class="font-bold" href="forgotpass">Forgot password?</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>
<script src="<?= base_url('assets/js/bootstrap.js')?> "></script>
    <script src="<?= base_url('assets/js/app.js')?> "></script>

    <!-- Need: Apexcharts -->
    <script src="<?= base_url('assets/extensions/apexcharts/apexcharts.min.js')?> "></script>
    <script src="<?= base_url('assets/js/pages/dashboard.js')?> "></script>
</html>
