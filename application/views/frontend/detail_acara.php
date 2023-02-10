<main id="main">

    <!-- ======= Breadcrumbs ======= -->
</br>
</br>
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url('home'); ?>">Home</a></li>
                <li><a href="<?= base_url('acara'); ?>">Acara</a></li>
            </ol>
            <h2>Detail Acara</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog p-2">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12 entries mx-auto">
                    <article class="entry entry-single">
                        <?php foreach ($detail as $d) : ?>
                                <div class="row">
                                    <div class="col-lg-5 mx-auto">
                            <div class="entry-img w-1000 h-1000">                             
                                <img src="<?= base_url('assets/'); ?>img/blog/<?= $d['img'] ?>" alt="" class="img-fluid" >
                            </div>                         
                                    </div>
                                <div class="col-lg-6">
                                           <h2 class="entry-title">
                                <a href="<?= base_url('acara/detail?id=' . $d['id']); ?>"><?= $d['judul'] ?></a>
                            </h2>

                            <div class="entry-meta">
                                <?php $peng = $this->db->get_where('karyawan', ['id' => $d['id_peng']])->row_array(); ?>
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><?= $d['jam'] ?></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i> <a href="#"><?= $d['tempat'] ?></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-calendar-check"></i> <a href="#">  <?= mediumdate_indo(date($d['tgl'])) ?></a></li>                             
                                </ul>
                            </div>
                         <div class="entry-content">
                                <?= $d['deskripsi'] ?>
                            </div>

                            <div class="entry-footer">
                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    <?php $kat_ = $this->db->get_where('kategori_acara', ['id' => $d['id_kat']])->row_array(); ?>
                                    <li><a href="#"><?= $kat_['nama'] ?></a></li>
                                    <li><i class="bi bi-person"></i> <a href="#"><?= $peng['nama'] ?></a></li>
                                </ul>
                            </div>
                                    </div>
                                </div>
                    </article><!-- End blog entry -->

                <?php endforeach ?>

                </div><!-- End blog entries list -->

                <!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->

</main><!-- End #main -->