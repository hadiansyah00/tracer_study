<!-- Custom styles for this template-->
<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
<style>
    /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

    /* Timeline holder */
    ul.timeline {
        list-style-type: none;
        position: relative;
        padding-left: 1.5rem;
    }

    /* Timeline vertical line */
    ul.timeline:before {
        content: ' ';
        background: #fff;
        display: inline-block;
        position: absolute;
        left: 16px;
        width: 4px;
        height: 100%;
        z-index: 400;
        border-radius: 1rem;
    }

    li.timeline-item {
        margin: 20px 0;
    }

    /* Timeline item arrow */
    .timeline-arrow {
        border-top: 0.5rem solid transparent;
        border-right: 0.5rem solid #fff;
        border-bottom: 0.5rem solid transparent;
        display: block;
        position: absolute;
        left: 2rem;
    }

    /* Timeline item circle marker */
    li.timeline-item::before {
        content: ' ';
        background: #ddd;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #fff;
        left: 11px;
        width: 14px;
        height: 14px;
        z-index: 400;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }


    /*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
    body {
        background: #E8CBC0;
        background: -webkit-linear-gradient(to right, #E8CBC0, #636FA4);
        background: linear-gradient(to right, #E8CBC0, #636FA4);
        min-height: 100vh;
    }

    .text-gray {
        color: #999;
    }
</style>

<style type="text/css">
    img[src=""] {
        display: none;
    }

    .pointer {
        cursor: pointer;
    }

    input[type="checkbox"][class^="cb"] {
        display: none;
    }

    label {
        border: 1px solid #fff;
        display: block;
        position: relative;
        cursor: pointer;
    }

    label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    label img {
        height: 35px;
        width: 80px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }

    :checked+label {
        border-color: #ddd;
    }

    :checked+label:before {
        content: "✓";
        background-color: grey;
        transform: scale(1);
    }

    :checked+.bg {
        background-color: darkgray;
        color: white;
    }

    :checked+label img {
        transform: scale(0.9);
        z-index: -1;
    }
</style>
<main id="main" style="padding-top: 15px;">
    <section class="inner-page">
        <div class="container">
            <!-- Begin Page Content -->
            <div class="container">
                <div class="row">
          
                    <div class="col-lg-8 py-4 p0 mx-auto">
                                 <?php if ($user['status'] == 1) :?>   
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 align-right">
                                <a class="m-0 font-font-weight-medium text-primary"><i class="fa fa-list-alt fa-fw"></i> <b>Informasi Penerimaan Mahasiswa Baru</b></a>
                            </div>  
                                     
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-md-4 mb-4 mb-md-0">
                                        <img src="<?php if (!empty($user['img_siswa'])) {
                                                        echo base_url('assets/img/data/' . $user['img_siswa']);
                                                    } ?>" class="img-thumbnail">
                                        <br /><br />
                                    </div> -->
                          
                                    <div class="col-md-12 mb-4 mb-md-0">
                                        <table class="table" style="font-size: 16;" cellpadding="3">
                                            <tbody>
                                                <tr>
                                                    <td>Nomor Daftar</td>
                                                    <td>: <b><?= $user['no_daftar'] ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>: <?= $user['nama'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>: <span class="badge badge-success badge-pill disabled" aria-disabled="true">Selamat <?= $user['nama']?> Pendaftaran  diTerima</span></td>
                                                </tr>
                                               
                                                <tr>
                                                    <td>Tanggal Daftar</td>
                                                    <td>: <?= mediumdate_indo(date($user['date_created'])); ?></td>
                                                </tr>
                                                <!-- <tr>
                                                    <td>Email</td>
                                                    <td>: <?= $user['email'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>NISN</td>
                                                    <td>: <?= $user['nis'] ?></td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                          
                                        <a target="_blank" href="<?= base_url('laporan/cetak_formulir?id=' . $this->secure->encrypt($user['id'])) ?>" class="btn btn-info"><i class="bi bi-printer"></i> Cetak Formulir</a>
                             

                                </div>
                            </div>

                        </div>    
                  <?php else : ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 align-right">
                                <a href="<?= base_url('pmb/biodata') ?>" class="m-0 font-font-weight-medium text-primary"><i class="fa fa-list-alt fa-fw"></i> <b>Edit Biodata</b></a>
                            </div>                           
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                
                                    <table class="table" style="font-size: 14px;" cellpadding="3">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3"><b>A. IDENTITAS CALON SISWA</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="" width="5%">1. </td>
                                                    <td width="20%">Nama</td>
                                                    <td width="50%"><?= strtoupper($user['nama']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">2. </td>
                                                    <td>NIK</td>
                                                    <td><?= $user['nik'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">3. </td>
                                                    <td>NISN</td>
                                                    <td><?= $user['nis'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">4. </td>
                                                    <td>Jenis Kelamin</td>
                                                    <td><?= ($user['jk'] == 'L') ? 'Laki-Laki' : 'Perempuan' ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">5. </td>
                                                    <td>Tempat Lahir</td>
                                                    <td><?= $user['kab'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">6. </td>
                                                    <td>Tanggal Lahir</td>
                                                    <td><?= mediumdate_indo(date($user['ttl'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">7. </td>
                                                    <td>Alamat</td>
                                                    <td><?= $user['alamat'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">8. </td>
                                                    <td>Asal Sekolah</td>
                                                    <td><?= $user['sekolah_asal'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">9. </td>
                                                    <td>Email</td>
                                                    <td><?= $user['email'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">10. </td>
                                                    <td>No HP</td>
                                                    <td><?= $user['no_hp'] ?></td>
                                                </tr>


                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <table class="table" style="font-size: 14px;" cellpadding="3">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3"><b>B. IDENTITAS ORANG TUA</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="">1. </td>
                                                    <td>Nama Ayah</td>
                                                    <td><?= $user['nama_ayah'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">2. </td>
                                                    <td>Pekerjaan Ayah</td>
                                                    <td><?= $user['pek_ayah'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">3. </td>
                                                    <td>Nama Ibu</td>
                                                    <td><?= $user['nama_ibu'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">4. </td>
                                                    <td>Pekerjaan Ibu</td>
                                                    <td><?= $user['pek_ibu'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="">5. </td>
                                                    <td>No Telepon Ortu</td>
                                                    <td><?= $user['no_telp'] ?></td>
                                                </tr>
                                                <?php if (!empty($user['nama_wali'])) : ?>

                                                    <tr>
                                                        <td colspan="3"><b>C. IDENTITAS WALI</b></td>
                                                    </tr>

                                                    <tr>
                                                        <td align="">1. </td>
                                                        <td>Nama Wali</td>
                                                        <td><?= $user['nama_wali'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="">2. </td>
                                                        <td>Pekerjaan Wali</td>
                                                        <td><?= $user['pek_wali'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="">3. </td>
                                                        <td>No Telepon</td>
                                                        <td><?= $user['no_telp'] ?></td>
                                                    </tr>
                                                  
                                                <?php endif ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 mb-4 mb-md-0">
                                    <table style="font-size: 14px;" cellpadding="3">
                                        <tbody>
                                            <table class="table" width="100%" cellspacing="2">

                                                <tr>
                                                    <td colspan="3"><b>*) PERYARATAN PENDAFTARAN</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="" width="5%">1. </td>
                                                    <td width="20%">KTP / Akta Lahir</td>
                                                    <td width="50%"><?= (!empty($user['img_ktp'])) ? 'Ada' : 'Tidak Ada' ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="" width="5%">2. </td>
                                                    <td width="20%">Kartu Keluarga (KK)</td>
                                                    <td width="50%"><?= (!empty($user['img_kk'])) ? 'Ada' : 'Tidak Ada' ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="" width="5%">3. </td>
                                                    <td width="20%">SKHUN / Ijazah</td>
                                                    <td width="50%"><?= (!empty($user['img_ijazah'])) ? 'Ada' : 'Tidak Ada' ?></td>
                                                </tr>
                                            </table>

                                        </tbody>
                                    </table>

                                </div>
                            
                            </div>
         
                        </div>
                           <?php endif ?>    
                    </div>    
                 
                <div class="col-lg-4 py-4 p0 mx-auto">
                    <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list-alt fa-fw"></i> <b>Informasi Daftar Ulang</b></h6>
                            </div>
                            <div class="card-body">
                                <table style="font-size: 14px;" cellpadding="3">
                                     <table class="table" style="font-size: 10;" cellpadding="2">
                            <?php if ($user['sts_pmb']  == '2') : ?>
                                  <tbody>
                                                <tr>
                                                    <td>Tahun Ajaran</td>
                                                
                                                    <td>: <b><?= $verfikasi['tahun'] ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Tes</td>
                                                    <td>: <?= $verfikasi['tgl_tes'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jadwal Tes</td>
                                              
                                                    <td>: <?= $verfikasi['tempat_tes'] ?> </td>
                                                  
                                                </tr>
                                                <tr>
                                              
                                       
                                                <!-- <tr>
                                                    <td>Email</td>
                                                    <td>: <?= $user['email'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>NISN</td>
                                                    <td>: <?= $user['nis'] ?></td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                <?php else : ?>
                                <tbody>
                                        <?php $sum = 0;
                                        foreach ($pembayaran as $d) : ?>
                                            <?php $sum += $d['jumlah']; ?>
                                            <tr>
                                                <td><?= $d['nama'] ?></td>
                                                <td>: <?= 'Rp. ' . number_format($d['jumlah'], 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <br>
                                Total pembayaran : <b><?= 'Rp. ' . number_format($sum, 0, ',', '.') ?>,-</b>
                            </div>
                          <?php endif ?>
                            <div class="col-sm-12">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Foto Bukti Bayar</div>
                                                <span><?= $user['img_bukti'] ?></span>
                                            </div>
                                            <div class="col-auto">
                                                <img src="<?php if (!empty($user['img_bukti'])) {
                                                                echo base_url('assets/img/data/' . $user['img_bukti']);
                                                            } ?>" width="100" height="85" id="preview1" class="img-thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <?php if ($user['sts_pmb']  == '2') : ?>
                                    <a target="_blank" href="<?= base_url('laporan/cetak_invoice?id=' . $this->secure->encrypt($user['id'])) ?>" class="btn btn-info"><i class="bi bi-printer"></i> Cetak Invoice</a>
                                <?php elseif ($user['sts_pmb']  == '1') : ?>
                                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#" disabled> Menungggu Verfikasi</a>
                                <?php elseif ($user['sts_pmb']  == '0') : ?>

                                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#payModal">Klik Untuk Pembayaran</a>
                          

                            </div>
                    </div>

                        <!-- Payment Modal-->
                        <div class="modal fade" id="payModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg col-8" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-primary text-center" id="exampleModalLabel">Informasi Pembayaran Daftar Ulang</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table style="font-size: 14px;" cellpadding="6">
                                            <tbody>
                                                <tr>
                                                    <td>  
                                                        <h5>Nama Bank</h5>
                                                        <h5>Nomor Rekening</h5>
                                                    </td>
                                                    <td>
                                                  
                                                        <h5>: BANK BRI (BANK RAKYAT INDONESIA)</h5>
                                                        <h5>: 0387-01-001235-30-9</h5>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>
                                                        <h5>Atas Nama</h5>
                                                    </td>
                                                    <td>
                                                        <h5>: Yayasan Husada Bogor</h5>
                                                    </td>
                                                </tr>
                                                <?php $sum = 0;
                                                foreach ($pembayaran as $d) : ?>
                                                    <?php $sum += $d['jumlah']; ?>
                                                    <tr>
                                                        <td>
                                                            <h5> Jumlah Yang Harus dibayar</h5>
                                                        </td>
                                                        <td>
                                                            <h5>: <?= 'Rp.' . number_format($d['jumlah'], 0, ',', '.') ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>

                                        </table>
                                        <?= form_open_multipart('pmb/pmb'); ?>
                                        <div class="form-group row">
                                            <div class="col-lg-auto text-center">
                                                <img src="<?php if (!empty($user['img_bukti'])) {
                                                                echo base_url('assets/img/data/' . $user['img_bukti']);
                                                            } ?>" width="100" height="85" id="preview5" class="img-thumbnail mt-3">
                                            </div>
                                            <div class="col-lg-auto">
                                                <input type="hidden" name="id" value="<?= $user['id'] ?>">

                                                <input hidden type="file" name="img_bukti" class="file5" accept="image/*" id="imgInp5">
                                                <div class="input-group my-3">
                                                    <input type="text" class="form-control" disabled placeholder="Foto Bukti" id="file5">
                                                    <div class="input-group-append">
                                                        <button type="button" class="browse5 btn btn-primary">Browse</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div id="jenis_pay"></div> -->
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <button class="btn btn-success" type="submit"><i class=" bi bi-credit-card"></i> Upload Bukti Bayar</button>
                                        </div>

                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
     
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-image fa-fw"></i> <b>Data Foto</b></h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Foto siswa</div>
                                                        <span><?= $user['img_siswa'] ?></span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <img src="<?php if (!empty($user['img_siswa'])) {
                                                                        echo base_url('assets/img/data/' . $user['img_siswa']);
                                                                    } ?>" width="100" height="85" id="preview1" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="card border-left-info shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Foto KK</div>
                                                        <span><?= $user['img_kk'] ?></span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <img src="<?php if (!empty($user['img_kk'])) {
                                                                        echo base_url('assets/img/data/' . $user['img_kk']);
                                                                    } ?>" width="100" height="85" id="preview1" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Foto Ijazah</div>
                                                        <span><?= $user['img_ijazah'] ?></span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <img src="<?php if (!empty($user['img_ijazah'])) {
                                                                        echo base_url('assets/img/data/' . $user['img_ijazah']);
                                                                    } ?>" width="100" height="85" id="preview1" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="card border-left-warning shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Foto Akte / KTP</div>
                                                        <span><?= $user['img_ktp'] ?></span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <img src="<?php if (!empty($user['img_ktp'])) {
                                                                        echo base_url('assets/img/data/' . $user['img_ktp']);
                                                                    } ?>" width="100" height="85" id="preview1" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                  <?php endif ?>
                </div>
                    <!-- <div class="col-lg-4 py-10 p0 mx-auto">
                        <div class="card-body bg-white rounded ml-3 p-4 shadow">
                            <div class="timeline-arrow"></div>
                            <h2 class="h5 mb-0 text-primary font-weight-bold">Informasi Akademik</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i></span>
                            <p class="text-small mt-1 font-weight-bold ">Tanggal Tes Akademik :</p>
                            <p class="text-small mt-1 font-weight-bold ">Lokasi Tes Akademik : </p>
                            <p class="text-small mt-1 font-weight-normal text-danger"> <strong>Syarat dan Ketentuan Mengikuti Tes Akademik</strong></p>
                            <hr>
                            <p>Dokumen Persyaratan Pendaftaran
                                <br>
                                1. Membawa Berkas berkas
                                <br>
                                2. Pakain Hitam Putih
                                <br>
                                3. Membawa Kartu PMB

                            </p>
                            <br>
                            <?php if ($user['status']  == '1') : ?>
                                <a target="_blank" href="<?= base_url('laporan/cetak_formulir?id=' . $this->secure->encrypt($user['id'])) ?>" class="btn btn-primary"><i class="bi bi-printer"></i> Cetak Formulir</a>
                            <?php endif ?>
                        </div>

                    </div> -->

                </div>
</main><!-- End #main -->


<script type="text/javascript">
    var input = document.getElementById('password'),
        icon = document.getElementById('icon');

    icon.onclick = function() {

        if (input.className == 'active form-control') {
            input.setAttribute('type', 'text');
            icon.className = 'bi bi-eye';
            input.className = 'form-control';

        } else {
            input.setAttribute('type', 'password');
            icon.className = 'bi bi-eye-slash';
            input.className = 'active form-control';
        }

    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        <?php if ($user['id_majors'] == 0) : ?>
            $("#jurus").hide();
        <?php endif ?>
        $('#prov').change(function() {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('get/get_kota_ppdb'); ?>',
                data: {
                    prov: this.value
                },
                cache: false,
                success: function(response) {
                    $('#kab').html(response);
                }
            });
        });
        $('#kab').change(function() {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('get/get_kec'); ?>',
                data: {
                    kab: this.value
                },
                cache: false,
                success: function(response) {
                    $('#kec').html(response);
                }
            });
        });
        $('#kec').change(function() {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('get/get_kel'); ?>',
                data: {
                    kec: this.value
                },
                cache: false,
                success: function(response) {
                    $('#kel').html(response);
                }
            });
        });
        $('#pendidikan').change(function() {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('get/get_majors'); ?>',
                data: {
                    pendidikan: this.value
                },
                cache: false,
                success: function(response) {
                    $('#jurusan').html(response);
                }
            });
            $.ajax({
                type: 'POST',
                url: '<?= site_url('get/get_id_majors'); ?>',
                data: {
                    pendidikan: this.value
                },
                cache: false,
                success: function(response) {
                    if (response == 1) {
                        $("#jurus").show();
                    } else if (response == 0) {
                        $("#jurus").hide();
                    }
                }
            });
        });

        $.ajax({
            type: 'POST',
            url: '<?= site_url('get/get_jenis_pay'); ?>',
            cache: false,
            success: function(response) {
                $('#jenis_pay').html();
                $('#jenis_pay').html(response);
            }
        });

        $(document).on('change', ".cb", function() {
            $(".cb").not(this).prop('checked', false);
        });

    });
</script>


<script type="text/javascript">
    $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });

    $(document).on("click", ".browse1", function() {
        var file = $(this).parents().find(".file1");
        file.trigger("click");
    });

    $(document).on("click", ".browse2", function() {
        var file = $(this).parents().find(".file2");
        file.trigger("click");
    });

    $(document).on("click", ".browse3", function() {
        var file = $(this).parents().find(".file3");
        file.trigger("click");
    });
    $(document).on("click", ".browse5", function() {
        var file = $(this).parents().find(".file5");
        file.trigger("click");
    });

    $('#imgInp').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $('#imgInp1').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file1").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview1").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $('#imgInp2').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file2").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview2").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $('#imgInp3').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file3").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview3").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    $('#imgInp5').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file5").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview5").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>