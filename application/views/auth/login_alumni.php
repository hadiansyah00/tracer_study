<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">        
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img class="mt-10 pt-5" style="width:115%;height:85%" src="<?= base_url(); ?>assets/img/<?= $web['img_login'] ?>" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Alumni</h1><p>
                                         <!-- <br> <Strong>STIKes Bogor Husada</Strong>  -->
                                    </p>
                                </div>
                                <?= $this->session->flashdata('message') ?>
                                <form class="user" action="<?= base_url('alumni'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" class="form-control form-control-user" value="<?= set_value('nim') ?>" name="nim" id="nim" placeholder="NIM Mahasiswa">
                                        <?= form_error('nim', '<small class="text-danger pl-3">', ' </small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', ' </small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        <b>Login</b>
                                    </button>
                                    <hr>
                                </form>

                                <div class="text-center">
                                    <a class="small" href="<?= base_url('home'); ?>"><b>⇤ Kembali Home</b></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>