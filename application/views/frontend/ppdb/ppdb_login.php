<!-- Custom styles for this template-->

<main id="main" style="padding-top: 30px;">
    <!-- ======= Breadcrumbs ======= -->

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5 pt-lg-5">

        <div class="col-xl-10 col-lg-12 col-md-8">

            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-lg-4 p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-sbh"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center mb-4">
                                    <h3 class="h2 text-gray-900">
                                        <strong>Login</strong>
                                    </h3>
                                    <p>Pendaftaran Mahasiswa Baru
                                    </p>
                                    <!-- <span class="text-muted">Silahkan Login </span> -->
                                </div>
                                <?= $this->session->flashdata('message') ?>
                                <form class="user" action="<?= base_url('pmb/login'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control form-control-user" value="<?= set_value('email') ?>" name="email" id="email" placeholder="Email">
                                        <?= form_error('email', '<small class="text-danger pl-3">', ' </small>') ?>
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
                                            <div class="float-right">
                                                <label><a href="<?= base_url('kontak'); ?>">Lupa Password?</a></label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        <b>Login</b>
                                    </button>
                                    <hr>
                                </form>

                                <div class="text-center">
                                    <a class="small" href="<?= base_url('pmb'); ?>"><b>⇤ Klik Disini Untuk Mendaftar</b></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>
    </div>
    </section>
    <style>
        .bg-login-sbh {
            background-image: url("<?= base_url('assets/img/bg-login.png'); ?>");
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</main>