<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('DataTables/datatables.min.css') ?> ">
<link rel="stylesheet" href="<?= base_url('DataTables/datatables.css') ?> ">
<link rel="stylesheet" href="<?= base_url('DataTables/jquery.dataTables.min.css') ?> ">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<title>Berkas template</title>
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
    td.status-false {
  background-color: red;
  color: white;
}

td.status-true {
  background-color: green;
  color: white;
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
                        <h4>Template Seminar</h4>
                    </div>
                    <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                        <a href="/superadmin/akun/create" class="btn btn-primary mb-3">Tambah Akun</a>
                        <table id="tabel1" class="display tabel1" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Mahasiswa</th>
                                    <th>Dosen</th>
                                    <th>Koor</th>
                                    <th>Admin</th>
                                    <th>Superadmin</th>

                                    <th class="text-center">Aksi</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <?php $index = 1;
                                foreach ($akun as $item) : ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $index; ?></td>
                                        <td><?= $item['nama']; ?></td>
                                        <td><?= $item['username']; ?></td>
                                        <td> <span class=""><?= $item['is_mahasiswa']!=1? 'FALSE' : 'TRUE'; ?></span></td>
                                        <td> <span class=""><?= $item['is_dosen']!=1? 'FALSE' : 'TRUE'; ?></span></td>
                                        <td> <span class=""><?= $item['is_koor']!=1? 'FALSE' : 'TRUE'; ?></span></td>
                                        <td> <span class=""><?= $item['is_admin']!=1? 'FALSE' : 'TRUE'; ?></span></td>
                                        <td> <span class=""><?= $item['is_superadmin']!=1? 'FALSE' : 'TRUE'; ?></span></td>
                                        <td class="align-middle d-flex justify-content-evenly">
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" href="/superadmin/akun/edit/<?= $item['id_user'] ?>" class="btn btn-icon btn-warning mr-2 ml-2"><i class="fas fa-edit"></i></a>
                                            <form action="/superadmin/akun/delete/<?= $item['id_user'] ?>" method="post">
                                            <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="btn btn-icon btn-danger mr-2 ml-2" ><i class="fas fa-trash"></i></button>    
                                        </form>

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
<script>
    const tds = document.getElementsByTagName('span');
for (let i = 0; i < tds.length; i++) {
  const span = tds[i];
  const text = span.textContent.trim().toLowerCase();
  if (text === 'false') {
      span.classList.add('badge');
      span.classList.add('bg-secondary');
    } else if (text === 'true') {
        span.classList.add('badge');
        span.classList.add('bg-primary');
  }
}

</script>
<?= $this->endSection() ?>