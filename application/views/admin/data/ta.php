<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-list"></i> <?= $title ?>
                        <div class="float-right">
                            <a href="" class="btn btn-block btn-sm btn-info" data-toggle="modal" data-target="#addNewData"><i class="fa fa-plus-circle"></i> Tambah Data TA</a>
                        </div>
                    </h1>
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?= $this->session->flashdata('message') ?>
                    <div style="width:100%; overflow-x:scroll">
                        <table class="table table-hover" id="mytable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Periode</th>
                                    <th scope="col">Tanggal Tes</th>
                                    <th scope="col">Tempat Tes</th>
                                    <th scope="col">Status</th>

                                    <th style="width: 10px; ;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($ta as $d) : ?>
                                    <tr>
                                        <th width="50"><?= $i ?></th>
                                        <td><?= $d['tahun'] ?></td>
                                        <td><?= $d['periode'] ?></td>
                                        <td><?= $d['tgl_tes'] ?></td>
                                        <td><?= $d['tempat_tes'] ?></td>
                                        <td>
                                            <?php if ($d['status_ta'] == 0) {
                                                echo "<span class='btn btn-danger'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                            Tidak-Aktif
                                                     </span>";
                                            } else {
                                                echo "<span class='btn btn-success'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Aktif
                                                     </span>";
                                            } ?>
                                        </td>
                                        <td width="150  ">
                                            <?php if ($d['status_ta'] == 0) { ?>

                                                <a href="<?= base_url('admin/setTa?id_ta=') ?><?= $d['id_ta'] ?>" class="badge badge-info">Aktif</a>
                                            <?php  } ?>

                                            <a href="#" class="badge badge-success" data-toggle="modal" data-target="#updateData<?= $d['id_ta'] ?>">Edit</a>
                                            <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteData<?= $d['id_ta'] ?>">Hapus</a>
                                        </td>
                                    </tr>
                                    <!--update Data-->
                                    <div class="modal fade" id="updateData<?= $d['id_ta'] ?>" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDataLabel">Ubah Data TA</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('update/update_data_ta') ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="text" name="id_ta" id="id_ta" class="form-control" value="<?= $d['id_ta']; ?>">
                                                            <label for="periode" class="col-form-label">Periode</label>
                                                            <select class="form-control" id="periode" name="periode">
                                                                <option value="">- Pilih Periode -</option>
                                                                <option <?php if ($d['periode'] == "Gelombang 1") {
                                                                            echo "selected='selected'";
                                                                        } ?> value="Gelombang 1">Gelombang 1</option>

                                                                <option <?php if ($d['periode'] == "Gelombang 2") {
                                                                            echo "selected='selected'";
                                                                        } ?> value="Gelombang 2">Gelombang 2</option>

                                                                <option <?php if ($d['periode'] == "Gelombang 3") {
                                                                            echo "selected='selected'";
                                                                        } ?> value="Gelombang 3">Gelombang 3</option>
                                                            </select>
                                                        </div>
                                                        <div class=" form-group">
                                                            <label for="">Tahun</label>
                                                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="<?= $d['tahun']; ?>">
                                                        </div>
                                                        <div class=" form-group">
                                                            <label for="">Tempat tes</label>
                                                            <input type="tempat_tes" class="form-control" id="tempat_tes" name="tempat_tes" placeholder="Tempat Tes" value="<?= $d['tempat_tes']; ?>">
                                                        </div>
                                                        <div class=" form-group">
                                                            <label for="">Tgl Tes</label>
                                                            <input type="date" class="form-control" id="tgl_tes" name="tgl_tes" value="<?= $d['tgl_tes']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--delete Data-->
                                    <div class="modal fade" id="deleteData<?= $d['id_ta'] ?>" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDataLabel">Hapus Data Tahun Akademik</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda yakin ingin menghapus data <b><?= $d['tahun'] ?></b></p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <a href="<?= base_url('hapus/hapus_data_ta?id_ta=') ?><?= $d['id_ta'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php $i++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!--modal-->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="addNewData" role="dialog" aria-labelledby="addNewDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewDataLabel">Tambah Data Tahun Ajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/add') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="periode" class="col-form-label">Periode</label>
                        <select class="form-control" id="periode" name="periode">
                            <option value disabled>- Pilih Periode -</option>
                            <option value="Gelombang 1">Gelombang 1</option>
                            <option value="Gelombang 2">Gelombang 2</option>
                            <option value="Gelombang 3">Gelombang 3</option>
                        </select>
                    </div>
                    <!-- <div class=" form-group">
                        <label for="">ta</label>
                        <input type="text" class="form-control" id="ta" name="ta" placeholder="ta" value="<?= set_value('ta') ?>">
                    </div> -->
                    <div class=" form-group">
                        <label for="">Tahun</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="2021/2022" value="<?= set_value('tahun') ?>">
                    </div>
                    <div class=" form-group">
                        <label for="">Tempat tes</label>
                        <input type="tempat_tes" class="form-control" id="tempat_tes" name="tempat_tes" placeholder="Offline/Online" value="<?= set_value('tempat_tes') ?>">
                    </div>
                    <div class=" form-group">
                        <label for="">Tgl Tes</label>
                        <input type="date" class="form-control" id="tgl_tes" name="tgl_tes" value="<?= set_value('tgl_tes') ?>">
                    </div>

                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>

            </form>
        </div>
    </div>
</div>