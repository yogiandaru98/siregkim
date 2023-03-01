<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>
<h1 class="page-title d-flex justify-content-center">PKL</h1>
<div class="page-heading">
    <h3>Data Registrasi</h3>
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
                        <a class="btn btn-primary" href="<?= site_url('/mahasiswa/pkl/edit') ?>">Edit
                            Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless">

                            <tr>
                                <td style="width: 20% !important;">Judul/Topik PKL</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['judul_pkl'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Tahun Akademik</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['tahun_akademik'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Semester</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['semester'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Prodi</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['prodi'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Periode Seminar Pkl</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= date_indo2($pkl['periode_seminar_pkl']); ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Mitra Pkl</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['nama_mitra_pkl'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Domisili Pkl</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['domisili_pkl'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Dosen Pembimbing Akademik</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['nama_dosen_akademik'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">NIP Pembimbing Akademik</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['nip_dosen_akademik'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Dosen Pembimbing PKL</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['nama_dosen_pkl'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">NIP Pembimbing pkl</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['nip_dosen_pkl'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Pembimbing Lapangan</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['pembimbing_lapangan'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">NIP/NO Pembimbing Lapangan</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['no_pembimbing_lapangan'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">SKS</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['sks'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">TOEFL</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= ($pkl['sks']) ? $pkl['sks'] : 'Belum ada' ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">IPK</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['ipk'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Status Registrasi</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['status_pkl'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Pesan Admin</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;" class="linkify">
                                    <?= ($pkl['pesan_admin']) ? $pkl['pesan_admin'] : 'Tidak Ada'  ?>

                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Berkas Kelengkapan</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><a href="/berkas/pkl/kelengkapan/<?= $pkl['berkas_kelengkapan'] ?>" target="_blank">Unduh Berkas</a></td>

                            </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php if($pkl['status_pkl']== "Valid") :
?>
<div class="page-heading">
    <h3>Jadwal Seminar</h3>
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
                    <div class="table-responsive">
                        <table class="table table-borderless">

                            <tr>
                                <td style="width: 20% !important;">Tanggal Seminar</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($jadwal[0]['tanggal'])) : ?>
                                        <?= date_indo($jadwal[0]['tanggal']); ?>
                                    <?php else : ?>
                                        Belum Ditentukan
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Jam Mulai</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($jadwal[0]['jam_mulai'])) : ?>
                                        <?= $jadwal[0]['jam_mulai'] ?>
                                    <?php else : ?>
                                        Belum Ditentukan
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Jam Selesai</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($jadwal[0]['jam_selesai'])) : ?>
                                        <?= $jadwal[0]['jam_selesai'] ?>
                                    <?php else : ?>
                                        Belum Ditentukan
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Lokasi Seminar</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($jadwal[0]['nama_gedung'])) : ?>
                                        <?= $jadwal[0]['nama_gedung'] ?> / 
                                        <?= $jadwal[0]['nama_ruangan'] ?>
                                    <?php else : ?>
                                        Belum Ditentukan
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Berkas Seminar</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($jadwal[0]['berkas_seminar'])) : ?>
                                        <a href="/berkas/pkl/seminar/<?= $jadwal[0]['berkas_seminar'] ?>" target="_blank">Unduh</a>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Pesan Koordinator</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;" class="linkify">
                                    <?php if (!empty($jadwal[0]['pesan_koor'])) : ?>
                                        <?= $jadwal[0]['pesan_koor'] ?>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php endif; 
?>

<?php  if(!empty($jadwal[0]['nama_ruangan'])) : 
?>
<div class="page-heading">
    <h3>Bukti Seminar</h3>
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
                        <?php if (!empty($bukti['bukti_seminar'])) : ?>
                            <a class="btn btn-primary" href="/mahasiswa/pkl/buktiSeminar/edit" >Edit Bukti</a>
                            <?php else : ?>
                                <a class="btn btn-primary" href="/mahasiswa/pkl/buktiSeminar/create" >Unggah Bukti</a>
                        <?php endif; ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 20% !important;">Bukti Seminar</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($bukti['bukti_seminar'])) : ?>
                                        <a href="/berkas/pkl/bukti/seminar/<?= $bukti['bukti_seminar'] ?>" target="_blank">Unduh</a>
                                    <?php else : ?>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#inlineForm">Unggah Berkas</a>
                                    <?php endif; ?>

                                </td>
                            <tr>
                                <td style="width: 20% !important;">Laporan Final PKL</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($bukti['laporan_pkl'])) : ?>
                                        <a href="/berkas/pkl/bukti/laporan/<?= $bukti['laporan_pkl'] ?>" target="_blank">Unduh</a>
                                    <?php else : ?>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#inlineForm">Unggah Berkas</a>
                                    <?php endif; ?>

                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Tanggal Seminar</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($bukti['tanggal_seminar'])) : ?>
                                        <?= date_indo($bukti['tanggal_seminar']) ?>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Nilai Seminar Angka</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($bukti['nilai_seminar_angka'])) : ?>
                                        <?= $bukti['nilai_seminar_angka'] ?>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Nilai Seminar Huruf</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($bukti['nilai_seminar_huruf'])) : ?>
                                        <?= $bukti['nilai_seminar_huruf'] ?>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Nilai PKL Angka</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($bukti['nilai_pkl_angka'])) : ?>
                                        <?= $bukti['nilai_pkl_angka'] ?>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Nilai PKL Huruf</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($bukti['nilai_pkl_huruf'])) : ?>
                                        <?= $bukti['nilai_pkl_huruf'] ?>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Status Bukti</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($bukti['bukti_seminar'])) : ?>
                                        <?= $bukti['status_bukti_seminar'] ?>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Pesan Admin</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;" class="linkify">
                                    <?php if (!empty($bukti['pesan_admin'])) : ?>
                                        <?= $bukti['pesan_admin'] ?>
                                    <?php else : ?>
                                        Tidak Ada Pesan
                                    <?php endif; ?>
                                </td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php endif; 
?>

<script>
    function isLink(str) {
  // Regular expression to match URLs
  var urlRegex = /(https?:\/\/[^\s]+)/g;
  
  // Return true if the string matches the URL regex
  return str.match(urlRegex);
}

function createLink(text) {
  var urlRegex = /((http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?)/gi;
  return text.replace(urlRegex, function(url) {
    return '<a href="' + url + '">' + url + '</a>';
  })
}
// mengambil semua elemen dengan kelas 'linkify'
var linkifyElements = document.querySelectorAll('.linkify');

// memproses setiap elemen
linkifyElements.forEach(function(linkifyElement) {
  // mendapatkan teks dari elemen
  var text = linkifyElement.textContent;

  // memeriksa apakah teks mengandung link
  if (isLink(text)) {
    // membuat link yang baru dengan fungsi createLink()
    var link = createLink(text);

    // mengganti teks asli dengan link baru
    linkifyElement.innerHTML = link;
  }
});

</script>
<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2023 &copy; Jurusan Kimia Fakultas Matematika dan Ilmu Pengetahuan Alam</p>
        </div>
    </div>
</footer>

<?= $this->endSection() ?>