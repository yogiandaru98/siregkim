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

<?php // if(!empty($regBukti['lokasi_seminar_pkl'])) : 
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
                    
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 20% !important;">Bukti Seminar</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    
                                        <a href="/berkas/pkl/bukti/seminar/<?= $regBukti['bukti_seminar'] ?>" target="_blank">Unduh</a>
                                    
                                        
                                    

                                </td>
                            <tr>
                                <td style="width: 20% !important;">Laporan Final PKL</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($regBukti['laporan_pkl'])) : ?>
                                        <a href="/berkas/pkl/bukti/laporan/<?= $regBukti['laporan_pkl'] ?>" target="_blank">Unduh</a>
                                    <?php else : ?>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#inlineForm">Unggah Berkas</a>
                                    <?php endif; ?>

                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Tanggal Seminar</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($regBukti['tanggal_seminar'])) : ?>
                                        <?= date_indo($regBukti['tanggal_seminar']) ?>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Nilai Seminar Angka</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($regBukti['nilai_seminar_angka'])) : ?>
                                        <?= $regBukti['nilai_seminar_angka'] ?>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Nilai Seminar Huruf</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($regBukti['nilai_seminar_huruf'])) : ?>
                                        <?= $regBukti['nilai_seminar_huruf'] ?>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Nilai PKL Angka</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($regBukti['nilai_pkl_angka'])) : ?>
                                        <?= $regBukti['nilai_pkl_angka'] ?>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Nilai PKL Huruf</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if (!empty($regBukti['nilai_pkl_huruf'])) : ?>
                                        <?= $regBukti['nilai_pkl_huruf'] ?>
                                    <?php else : ?>
                                        Belum Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <form action="/validasi/seminar/<?= $regBukti['id_bukti_seminar_pkl'] ?>/action" method="post">
                                <tr>
                                    <td style="width: 20% !important;">Status Bukti Seminar PKL</td>
                                    <td style="width: 5% !important;">:</td>
                                    <td>
                                        <select name="status_bukti_seminar" id="status_bukti_seminar">
                                            <option value="Diproses" <?= ($regBukti['status_bukti_seminar'] == 'Diproses') ? 'selected' : '' ?> >Diproses</option>
                                            <option value="Valid" <?= ($regBukti['status_bukti_seminar'] == 'Valid') ? 'selected' : '' ?> >Valid</option>
                                            <option value="Invalid" <?= ($regBukti['status_bukti_seminar'] == 'Invalid') ? 'selected' : '' ?> >Invalid</option>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20% !important;">Pesan Admin</td>
                                    <td style="width: 5% !important;">:</td>
                                    <td>
                                        <textarea name="pesan_admin" class="form-control textrea" id="pesan_admin" cols="30" rows="10"><?= ($regBukti['pesan_admin']) ? $regBukti['pesan_admin'] : 'Tidak Ada'  ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20% !important;"></td>
                                    <td style="width: 5% !important;"></td>
                                    <td style="width: 75% !important;">
                                    <td>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                    </td>
                                </tr>
                            </form>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php //endif; 
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