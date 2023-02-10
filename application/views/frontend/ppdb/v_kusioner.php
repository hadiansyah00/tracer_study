<!-- Custom styles for this template-->
<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">


<main id="main" style="padding-top: 30px;">

    <section class="inner-page">
        <div class="container">

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list-alt fa-fw"></i> <b>Form Kusioner</b></h6>
                            </div>
                            <div class="card-body">
                        
                                <?= $this->session->flashdata('message') ?>
                                    <div class="row">
                                            <div class="col-md-12">
                                        <h5 class="header font-weight-bold"> Bagiamana kamu bisa tahu STIKes Bogor Husada </h5>
                                        <hr>
                                        <div class="container-fluid">
                                            <?= form_open('pmb/kusioner'); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                   
                                                         <div class="form-group">
                                                            <label>Data Kusioner</label>
                                                          <input type=text class="form-control" id="id" value="<?= $user['id']?>" name="id">
                                                          <input type = text class="form-control" name="medsos"> 
                                                             <select name="id_kusioner" id="id_kusioner" class="custom-select">
                                                                            <option value="" selected disabled>Pilih Jenis </option>
                                                                            <?php foreach ($kusioner as $j) : ?>
                                                                                <option <?= $user['id_kusioner'] == $j['id'] ? 'selected' : ''; ?>
                                                                                 <?= set_select('id_kusioner', $j['id']) ?> value="<?= $j['id'] ?>"><?= $j['nama'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                            <?= form_error('kus', '<small class="text-danger pl-3">', ' </small>') ?>
                                                        </div>
                                                  
                                                </div>
                                            </div>
                                                <div class="pt-3 form-group row mx-auto">
                                                    <div class="col-md-2 mx-auto">
                                                        <button type="submit" class="btn btn-block btn-success"><i class="bi bi-arrow-clockwise"></i> Simpan Data</button>
                                                    </div>
                                                </div>
                                          <?php form_close(); ?>
                                        </div>
                                       
                                      
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="header font-weight-bold"> Bagiamana kamu bisa tahu STIKes Bogor Husada </h5>
                                        <hr>
                                        <div class="container-fluid">
                                            <?= form_open('pmb/kusioner'); ?>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <form>
                                                        <div class="form-check form-check p-2 ">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Kerabat / Alumni / Mahasiswa</label>
                                                        </div>
                                
                                                        <div class="form-check form-check p-2 ">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Radio</label>
                                                        </div>

                                                        <div class="form-check form-check p-2 ">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" name="broadcast" for="broadcast">Broadcast WA / SMS</label>
                                                        </div>
                                                        <div class="form-check form-check p-2 ">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Persentasi</label>
                                                        </div>

                                                        <div class="form-check form-check p-2 ">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Teman</label>
                                                        </div>
                                                        <div class="form-check form-check p-2 ">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Brosur</label>
                                                        </div>

                                                </div>
                                                </form>
                                                <div class="col-md-5">
                                                    <form>
                                                        <div class="form-check form-check p-2 ">
                                                            <input <?= $user['medsos'] == '1' ? 'checked' : ''; ?> value="1" type="checkbox" class="form-check-input" id="medsos">
                                                            <label class="form-check-label" for="exampleCheck1">Medsos (Instagram / Facebook)</label>
                                                        </div>

                                                        <div class="form-check form-check p-2 ">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Spanduk / Bilboard</label>
                                                        </div>

                                                        <div class="form-check form-check p-2 ">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Internet (Website / Google Ads</label>
                                                        </div>

                                                        <div class="form-check form-check p-2 ">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Koran</label>
                                                        </div>


                                                        <div class="form-check form-check p-2 ">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Guru SMA / SMK</label>
                                                        </div>

                                                        <div class="form-check form-check p-2 ">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Lain lain</label>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="pt-3 form-group row mx-auto">
                                            <div class="col-md-2 mx-auto">
                                                <button type="submit" class="btn btn-block btn-success"><i class="bi bi-arrow-clockwise"></i> Simpan Data</button>
                                            </div>
                                        </div>

                                        <?php form_close(); ?>
                                    </div>
                                </div> -->
                            </div>

                        </div>
                    </div>
                    <!-- /.container-fluid -->


                </div>
    </section>

</main><!-- End #main -->