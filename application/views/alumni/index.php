<?php
$notif_izin      = $this->db->get_where('perizinan', ['status' => 'Proses', 'id_siswa' => $user['id']])->num_rows();
$notif_konseling = $this->db->get_where('konseling', ['status' => 'Respon', 'id_siswa' => $user['id']])->num_rows();
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Selamat Datang di Website<?= $web['nama'] ?></h1>

    </div> -->

    <!-- Content Row -->


    <!-- Content Row -->

    <div class="row">

        <div class="col-xl-12 col-lg-8 mx-auto">
              <section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>Career Studi STIKes Bogor Husada</p>
      </header>

      <div class="row">

        <?php foreach ($acara as $d) : ?>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img style="height: 350px;width: 450px;" src="<?= base_url('assets/'); ?>img/blog/<?= $d['img'] ?>" class="img-fluid" alt=""></div>
              <span class="post-date"><?= mediumdate_indo(date($d['tgl'])) ?></span>
              <h3 class="post-title"><?= $d['judul'] ?></h3>
              <a href="<?= base_url('detail_acara?id=' . $d['id']); ?>" class="readmore stretched-link mt-auto"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

        <?php endforeach ?>

      </div>

    </div>

  </section>
        </div>

    </div>

</div>


<script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Perempuan", "Laki - Laki"],
            datasets: [{
                data: [<?= $sum_wanita ?>, <?= $sum_pria ?>],
                backgroundColor: ['#4e73df', '#1cc88a'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>
<!-- /.container-fluid -->
<script type="text/javascript">
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Perempuan", "Laki-laki"],
            datasets: [{
                data: [<?= $siswa_pr ?>, <?= $siswa_lk ?>],
                backgroundColor: ['#36b9cc', '#1cc88a'],
                hoverBackgroundColor: ['#2c9faf', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>