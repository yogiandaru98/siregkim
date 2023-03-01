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
                    
                    <div class="table-responsive">
                        <form action="/lokasi/create/action" method="POST">
                        <?= csrf_field(); ?>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style=" width: 20% !important;">Nama Gedung
                                    </td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_gedung')) ? 'is-invalid' : ''; ?>" id="nama_gedung" name="nama_gedung" value="<?= set_value('nama_gedung'); ?>" autocomplete="off"">
                                        <div class="invalid-feedback">
                                    <?= $validation->getError('nama_gedung') ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" width: 20% !important;">Nama Ruangan 
                                    </td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_ruangan')) ? 'is-invalid' : ''; ?>" id="nama_ruangan" name="nama_ruangan" value="<?= set_value('nama_ruangan'); ?>" autocomplete="off"">
                                        <div class="invalid-feedback">
                                    <?= $validation->getError('nama_ruangan') ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <button style="width: 75% !important;" type="submit" class="btn btn-primary mr-0">Simpan</button>
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

<?= $this->endSection() ?>