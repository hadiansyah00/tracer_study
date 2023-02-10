                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                             <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list-alt fa-fw"></i> <b>Informasi Tes PMB</b></h6>
                            </div>
                            <div class="card-body">
                                  <table class="table" style="font-size: 16;" cellpadding="3">
                                            
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
                            </div>
                            <div class="card-footer">
                                <?php if ($user['sts_pmb']  == '2') : ?>
                                    <a target="_blank" href="<?= base_url('laporan/cetak_invoice?id=' . $this->secure->encrypt($user['id'])) ?>" class="btn btn-info"><i class="bi bi-printer"></i> Cetak Invoice</a>
                                <?php elseif ($user['sts_pmb']  == '1') : ?>
                                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#" disabled> Menungggu Verfikasi</a>
                                <?php elseif ($user['sts_pmb']  == '0') : ?>

                                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#payModal">Klik Untuk Pembayaran</a>
                                <?php endif ?>
                            </div>
                    </div>
                    