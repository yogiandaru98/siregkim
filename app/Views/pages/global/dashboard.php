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
                    <div class="card-header bg-info">
                        <h3 class="text-light">Selamat Datang</h3>
                    </div>
                    <div class="card-body mt-3">
                    <h4 class="card-title"><?= session()->get('nama') ?></h4>
    <p class="card-text"><?= session()->get('username') ?></p>
                    </div>
                </div>
            </div>
        </div>
</div>
<script src="<?= base_url('assets/extensions/apexcharts/apexcharts.min.js')?> "></script>
    <script src="<?= base_url('assets/js/pages/dashboard.js')?> "></script>
<script>
            var options = {
          series: [{
          name: 'Praktik Kerja Lapangan',
          data: [ 555, 999, 666]
        }, {
          name: 'Tugas Akhir 1',
          data: [ 333, 444, 555]
        }, {
          name: 'Tugas Akhir 2',
          data: [ 222, 333, 433]
        }, {
          name: 'Lulus',
          data: [ 111, 222, 333]
        }],
          chart: {
          type: 'bar',
          height: 450
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['2020', '2021', '2022'],

        },
        yaxis: {
          title: {
            text: 'Mahasiswa'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " Mahasiswa"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>
<?= $this->endSection() ?>