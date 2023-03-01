<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('DataTables/datatables.min.css') ?> ">
<link rel="stylesheet" href="<?= base_url('DataTables/datatables.css') ?> ">
<link rel="stylesheet" href="<?= base_url('DataTables/jquery.dataTables.min.css') ?> ">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<title>Data PKL</title>
<div class="page-heading">
    <h3><?= $title ?></h3>
</div>
<style>
    .dataTables_length select {
        background-color: lightblue;
        color: black;
        padding: 5px;
        font-size: 14px;
        border-radius: 5px;
        display: inline-block;
    }
    .dataTables_length {
        display: inline-block;
    }
</style>
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
                        <table id="tabel1" class="display tabel1" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>Judul</th>
                                    <th>Nama Mitra</th>
                                    <th>Status PKL</th>

                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1;
                                foreach ($regPkl as $item) : ?>
                                    <tr>
                                        <td><?= $index; ?></td>
                                        <td><?= $item['nama']; ?></td>
                                        <td><?= $item['username'] ?></td>
                                        <td><?= $item['judul_pkl'] ?></td>
                                        <td><?= $item['nama_mitra_pkl'] ?></td>
                                        
                                        <td><?php if ($item['status_pkl'] == "Diproses") : ?>
                                                <span class="badge bg-warning">Belum Divalidasi</span>
                                            <?php elseif ($item['status_pkl'] == "Valid") : ?>
                                                <span class="badge bg-success">Valid</span>
                                            <?php elseif ($item['status_pkl'] == "Invalid") : ?>
                                                <span class="badge bg-danger">Tidak Valid</span>
                                            <?php endif; ?></td>
                                        <td class="align-middle text-center">
                                            <!-- <a data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" href="/validasi/pkl/<?= $item['id_pkl'] ?> ?>" class="btn btn-icon btn-primary mr-5"><i class="fas fa-eye"></i></a> -->
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" href="/validasi/pkl/<?= $item['id_pkl'] ?>" class="btn btn-icon btn-warning mr-5 ml-3"><i class="fas fa-edit"></i></a>

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
<script src="<?= base_url('DataTables/datatables.js') ?> "></script>
<script src="<?= base_url('jquery/jquery.js') ?> "></script>
<!-- <script src="<?= base_url('jquery/jquery.min.js') ?> "></script> -->
<!-- <script src="<?= base_url('jquery/jquery.min.js') ?> "></script> -->


<script src="<?= base_url('DataTables/jquery.dataTables.min.js') ?> "></script>
<script src="<?= base_url('DataTables/datatables.min.js') ?> "></script>

<script>
    $(document).ready(function() {
        $('#tabel1').DataTable({
            lengthChange: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            
            // dom: '<"top"lf>rt<"bottom"pi>',
            dom: 'Bfrtip',
            buttons: [

                {
                    extend: 'copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis',
                // 'copy', 'csv', 'excel', 'print', 'colvis', ,
            ]
        });
    });
</script>
<?= $this->endSection() ?>