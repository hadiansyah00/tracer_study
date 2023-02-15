<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="col-md-12 text-center">
            <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user-plus fa-fw"></i> Edit Data Alumni</h1>
            <hr />
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="pt-2 fa fa-list-alt fa-fw"></i> Form edit data siswa

                        <div class="float-right">
                            <a href="<?= base_url('admin/daftar_alumni') ?>" class="btn btn-block btn-danger btn-sm"><i class="fa fa-angle-double-left"></i> Kembali</a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <form action="<?= base_url('admin/update_alumni?id=') ?><?= $siswa['id'] ?>" method="post">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" value="<?= $siswa['nik'] ?>">
                                    <?= form_error('nik', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Nomor Induk siswa" value="<?= $siswa['nim'] ?>">
                                    <?= form_error('nim', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $siswa['nama'] ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                              

                                <div class="form-group">
                                    <label>Password</label> :
                                    <a href="#" class="badge badge-success" data-toggle="modal" data-target="#ubahPass">Ubah Password</a>
                                </div>             
                                <div class="form-group">
                                    <label for="jk" class="col-form-label">Jenim Kelamin :</label>
                                    <select class="form-control" id="jk" name="jk">
                                        <option value="">- Jenim Kelamin -</option>
                                        <option <?php if ($siswa['jk'] == "L") {
                                                    echo "selected='selected'";
                                                } ?> value="L">Laki-Laki</option>
                                        <option <?php if ($siswa['jk'] == "P") {
                                                    echo "selected='selected'";
                                                } ?> value="P">Perempuan</option>
                                    </select>
                                </div>
                                
                            <div class="form-group">
                                    <label for="nama_prodi" class="col-form-label">Program Studi</label>
                                    <select class="form-control" id="nama_prodi" name="nama_prodi">
                                        <option value="">-Pilih Prodi-</option>
                                        <option <?php if ($siswa['nama_prodi'] == "D3-KEBIDANAN") {
                                                    echo "selected='selected'";
                                                } ?> value="L">D3-KEBIDANAN</option>
                                        <option <?php if ($siswa['nama_prodi'] == "S1-FARMASI") {
                                                    echo "selected='selected'";
                                                } ?> value="P">S1-FARMASI</option>
                                        <option <?php if ($siswa['nama_prodi'] == "S1-GIZI") {
                                                    echo "selected='selected'";
                                                } ?> value="P">S1-GIZI</option>
                                    </select>
                            </div>

                                <div class="form-group">
                                    <label>Tahun Masuk</label>
                                    <input type="text" class="form-control" id="thn_masuk" name="thn_masuk"  value="<?= $siswa['thn_masuk'] ?>">
                                    <?= form_error('thn_masuk', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                               <div class="form-group">
                                    <label>Tahun Lulus</label>
                                    <input type="text" class="form-control" id="thn_lulus" name="thn_lulus"  value="<?= $siswa['thn_lulus'] ?>">
                                    <?= form_error('thn_lulus', '<small class="text-danger pl-3">', ' </small>') ?>
                                </div>
                                                
                                  
                            </div>

                        </div>
                        <div class="pt-3 form-group row ">
                            <div class="col-md-6 mx-auto">
                                <button type="submit" class="btn-block btn btn-primary" onclick="return confirm('Lanjutkan Simpan Data Siswa?');">Simpan Data Alumni</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="ubahPass" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewDataLabel">Ubah Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('update/password_siswa') ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Password Baru</label>
                                <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password baru">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-redo"></i> Ubah Password</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->
