<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>

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
                            <i class="fas fa-user-edit text-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Edit Profil" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>Edit
                            Profil</a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

<?= $this->endSection() ?>