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
                        <form action="/template/edit/<?= $template['id_berkas_template_seminar']?>/action" method="POST" enctype="multipart/form-data" >
                        <?= csrf_field(); ?>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style=" width: 20% !important;">Nama Seminar
                                    </td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                        <input readonly type="text" class="form-control <?= ($validation->hasError('nama_seminar')) ? 'is-invalid' : ''; ?>" id="nama_seminar" name="nama_seminar" value="<?= $template['nama_seminar']; ?>" autocomplete="off">
                                        <div class="invalid-feedback">
                                    <?= $validation->getError('nama_seminar') ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" width: 20% !important;">File template
                                    </td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                        <input required accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" type="file" class="form-control <?= ($validation->hasError('file_template')) ? 'is-invalid' : ''; ?>" id="file_template" name="file_template" value="<?= $template['file_template']; ?>" autocomplete="off" >
                                    <div class="invalid-feedback">
                                    <?= $validation->getError('file_template') ?>
                                        </div>
                                    </td>
                                <tr>
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