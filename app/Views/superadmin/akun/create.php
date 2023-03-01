<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <h3><?= $title ?></h3>
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
                    <!-- pesan error -->
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <!-- pesan sukses -->
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <form action="/superadmin/akun/create/action" method="POST">
                            <?= csrf_field(); ?>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style=" width: 20% !important;">Nama User
                                        </td>
                                        <td style="width: 5% !important;">:</td>
                                        <td style="width: 75% !important;">
                                            <input required type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autocomplete="off">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama') ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style=" width: 20% !important;">Username
                                        </td>
                                        <td style="width: 5% !important;">:</td>
                                        <td style="width: 75% !important;">
                                            <input required type="number" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" autocomplete="off">
                                            <i class="d-flex justify-content-end">username akan menjadi password default user</i>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('username') ?>
                                            </div>
                                        </td>
                                    <tr>
                                    <tr>
                                        <td>
                                            <label for="formc" class="text-align-center">Role</label>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <div class="form-check flex-column" id="formc">
                                            <td class="">

                                                <div class="d-flex justify-content-evenly">
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="form-check-input" id="checkbox1" value="1" name="is_mahasiswa">
                                                        <label for="checkbox1">Mahasiswa</label>
                                                    </div>

                                                    <div class="checkbox">
                                                        <input type="checkbox" class="form-check-input" id="checkbox2" value="1" name="is_dosen">
                                                        <label for="checkbox2">Dosen</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="form-check-input" id="checkbox3" value="1" name="is_koor">
                                                        <label for="checkbox3">Koor</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="form-check-input" id="checkbox4" value="1" name="is_admin">
                                                        <label for="checkbox4">Admin</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="form-check-input" id="checkbox5" value="1" name="is_superadmin">
                                                        <label for="checkbox5">Superadmin</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </div>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <button style="width: 75% !important;" name="submit" id="submit" type="submit" class="btn btn-primary mr-0">Simpan</button><br>
                                            <div id="result"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
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
<script>
    const checkboxes = document.querySelectorAll('input[type=checkbox]');
    const myButton = document.getElementById('submit');

    function updateButton() {
        const checked = Array.from(checkboxes).some((checkbox) => checkbox.checked);
        myButton.disabled = !checked;
    }

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', updateButton);
    });

    updateButton();
</script>

<?= $this->endSection() ?>