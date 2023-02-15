<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Pendaftaran Alumni</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form Pendaftaran
                        <div class="float-right">
                            <a href="<?= base_url('admin/daftar_alumni') ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Data Alumni</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="<?= base_url('admin/tambah_alumni') ?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" value="<?= set_value('nik') ?>" require>
                                    <?= form_error('nik', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Nomor Induk siswa" value="<?= set_value('nim') ?>" require>
                                    <small class="text-info">* Password otomatis sama dengan NIM</small><br />
                                    <?= form_error('nim', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>" require>
                                    <?= form_error('nama', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="jk" class="col-form-label">Jenim Kelamin :</label>
                                    <select class="form-control" id="jk" name="jk">
                                        <option value="">- Jenim Kelamin -</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label for="nama_prodi" class="col-form-label">Program Studi</label>
                                    <select class="form-control" id="nama_prodi" name="nama_prodi">
                                        <option value="">- Pilih Program Studi -</option>
                                        <option value="D3-KEBIDANAN">D3-KEBIDANAN</option>
                                        <option value="S1-FARMASI">S1-FARMASI</option>
                                        <option value="S1-GIZI">S1-GIZI</option>
                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label for="thn_masuk" class="col-form-label">Tahun Masuk</label>
                                    <input type="number" class="form-control" id="thn_masuk" name="thn_masuk" placeholder="Tahun Masuk Mahsiswa" value="<?= set_value('thn_masuk') ?>" require>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label for="thn_lulus" class="col-form-label">Tahun Lulus</label>
                                    <input type="thn_lulus" class="form-control" id="thn_lulus" name="thn_lulus" placeholder="Tahun Lulus Mahsiswa" value="<?= set_value('thn_lulus') ?>" require>
                                  </div>

                                <!-- <div class="form-group">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-university fa-fw"></i> Penempatan</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Program Study</label>
                                                        <select class="form-control" id="id_prodi" name="id_prodi">
                                                            <option>- Pilih Prodi -</option>
                                                            <?php foreach ($prodi as $row) : ?>
                                                                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?= form_error('id_prodi', '<small class="text-danger pl-3">', ' </small>') ?>
                                                    </div>
                                                </div>
                                              
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                
                            </div>

                        </div>
                        <div class="pt-3 form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn-block btn btn-primary" >Simpan Pendaftaran</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#jurus").hide();
        $('#prov').change(function() {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('get/get_kota'); ?>',
                data: {
                    prov: this.value
                },
                cache: false,
                success: function(response) {
                    $('#kab').html(response);
                }
            });
        });
        $('#prodi').change(function() {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('get/get_prodi'); ?>',
                data: {
                    prodi: this.value
                },
                cache: false,
                success: function(response) {
                    $('#kelas').html(response);
                }
            });
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
                    if(response == 1){
                        $("#jurus").show();
                    }else if(response == 0){
                        $("#jurus").hide();
                    }
                }
            });
        });
    });
</script>