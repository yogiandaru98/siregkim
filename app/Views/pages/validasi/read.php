<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <h3><?= $title ?></h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <!-- <div class="col-6 col-lg-3 col-md-6">
                </div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data PKL</h4>
                    </div>
                    <div class="card-body">
                    <table id="tabel1" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    No
                                </th>
                                <th>Nama</th>
                                <th>NPM</th>

                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1;
                            foreach ($regPkl as $item) : ?>
                                <tr>
                                    <td><?= $index; ?></td>
                                    <td><?= $item['nama']; ?></td>
                                    <td><?= $item['npm'] ?></td>
                                    <td><?= $item['status'] ?></td>
                                    <td class="align-middle text-center">
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" href="/data_pendaftar/view/<?= $item['npm'] ?> ?>" class="btn btn-icon btn-primary mr-5"><i class="fas fa-eye"></i></a>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" href="/data_pendaftar/edit/<?= $item['npm'] ?> ?>" class="btn btn-icon btn-warning mr-5 ml-3"><i class="fas fa-edit"></i></a>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="/data_pendaftar/delete/<?= $item['npm'] ?> ?>" class="btn btn-icon btn-danger mr-5 ml-3"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php $index++;
                            endforeach; ?>

                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<?= $this->endSection() ?>