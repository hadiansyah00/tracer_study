<!-- Custom styles for this template-->


<style type="text/css">
    img[src=""] {
        display: none;
    }

    .pointer {
        cursor: pointer;
    }

    li {
        list-style-type: disc;
        list-style-position: inside;
        text-indent: -1em;
        padding-left: 1em;
        list-style: none;
        padding-bottom: 5px;
    }
</style>
<main id="main" style="padding-top: 30px;">

    <!-- ======= Breadcrumbs ======= -->
    <!-- <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url('home'); ?>">Home</a></li>
                <li>PPDB</li>
            </ol>
            <h2>PPDB</h2>

        </div>
    </section> -->

    <!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container" style="padding-left:3px;padding-right:3px">

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="p-4">
                            <div class="text-center mb-4">
                                <img class="mx-auto mb-2" src="assets/img/logo_sbh.png" width="150px">
                                <h1 class="h4 text-black-50">
                                    <span class="text-muted">Registrasi Akun | PMB SBH</span>
                                </h1>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h5 class="m-0 text-black-50"><i class="fa fa-list-alt fa-fw"></i> <b>Form Pendaftaran</b>
                                        <!-- <div class="float-right">
                                        <a href="<?= base_url('ppdb/login') ?>" class="btn btn-block btn-sm btn-primary"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                                    </div> -->
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                                    <?= $this->session->flashdata('message') ?>
                                    <?= form_open('pmb'); ?>
                                    <input type="hidden" name="reff" value="<?= $this->session->userdata('reff') ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>" require>
                                                <?= form_error('nama', '<small class="text-danger pl-3">', ' </small>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" require>
                                                <?= form_error('email', '<small class="text-danger pl-3">', ' </small>') ?>
                                            </div>
                                            <div class="form-group form-box">
                                                <label>Password </label>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <?= form_error('password', '<small class="text-danger pl-3">', ' </small>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Hp</label>
                                                <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Hp" value="<?= set_value('no_hp') ?>" require>
                                                <?= form_error('no_hp', '<small class="text-danger pl-3">', ' </small>') ?>
                                            </div>

                                            <!-- <div class="form-group">
                                                <label>Tahun Masuk</label>
                                                <select class="form-control" id="thn_msk" name="thn_msk">
                                                    <option value="">- Pilih Periode -</option>
                                                    <?php foreach ($thn_msk as $row) : ?>
                                                        <option value="<?= $row['id'] ?>"><?= $row['period_start'] ?>/<?= $row['period_end'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <?= form_error('thn_msk', '<small class="text-danger pl-3">', ' </small>') ?>
                                            </div> -->
                                        </div>
                                    </div>
                                    <button type="submit" id="submit-form" hidden>123</button>
                                    <div class="pt-3 form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn-block btn btn-primary" ">Kirim Pendaftaran</button>
                                        </div>
                                        <div class="col-md-12 text-center mt-5">
                                            <p>Sudah mendaftar? <a href="<?= base_url('pmb/login') ?>">Login</a> ke dashboard.</p>
                                        </div>
                                    </div>

                                    <?php form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

            <!-- Modal -->
            <div class="modal fade" id="Kebijakan" role="dialog" aria-labelledby="KebijakanLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="KebijakanLabel">Kebijakan Privasi & Persyaratan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('admin/daftar_absen') ?>" method="post">
                            <div class="modal-body">
                                <div class="overflow-auto" id="scrollTop" style="max-height: 700px;">

                                    <p><b>Selamat Datang di <?= $web['nama'] ?></b></p>

                                    <p style="text-indent: 25px;">Syarat dan Ketentuan yang ditetapkan di bawah ini mengatur terkait prosedur pendaftaran hingga administrasi <?= $web['nama'] ?> baik secara offline maupun melalui situs <?= site_url(); ?> (Selanjutnya disebut sebagai Penyedia Layanan). Calon Siswa/i dan atau Wali (Selanjutnya disebut sebagai Pengguna) diwajibkan untuk membaca dengan cermat dan seksama untuk memahami hak dan kewajiban antara Penyedia dan Pengguna.
                                    <p>Syarat dan Ketentuan ini adalah sebagai perjanjian antara Pengguna dan Penyedia Layanan untuk mengatur pengelolaan Data Pribadi pada <?= $web['nama'] ?>.</p>
                                    <p>Dengan menyetujui Syarat dan Ketentuan ini, Pengguna juga menyetujui ketentuan penggunaan tambahan pada <?= $web['nama'] ?> dan perubahannya merupakan bagian yang tidak terpisahkan dari Syarat dan Ketentuan ini.</p>
                                    <p>Setiap kegiatan terkait dengan penggunaan situs <?= site_url(); ?>, dilindungi secara hukum melalui Undang-Undang Republik Indonesia No.11 Tahun 2008 tentang Informasi dan Transaksi Elektronik dan Perubahannya, Undang-Undang Republik Indonesia No. 28 Tahun 2014 tentang Hak Cipta, dan peraturan perundangan lainnya yang berlaku. Segala bentuk perikatan yang timbul dari segala aktivitas di situs <?= site_url(); ?> telah memenuhi kaidah dan syarat sahnya suatu perikatan sebagaimana yang tercantum dalam Kitab Undang-Undang Hukum Perdata.</p>
                                    </p>
                                    <br />
                                    <p>1. LAYANAN DAN/ATAU JASA</p>

                                    <p style="text-indent: 30px;"> <?= $web['nama'] ?> adalah jenjang pendidikan Sekolah Menengah Atas yang berbasis militer. Anda diwajibkan untuk membaca keseluruhan Syarat dan Ketentuan ini serta mempersiapkan Persyaratan Pendaftaran yang harus dilengkapi saat melakukan pendaftaran.</p>

                                    <p>2. HAK DAN BATASAN ANDA DALAM MENGGUNAKAN LAYANAN</p>
                                    <li>
                                        <p style="padding-left: 10px;">2.1. Layanan dilindungi oleh hak cipta, kerahasiaan dagang, dan hak kekayaan intelektual lainnya berdasarkan peraturan perundang-undangan di Indonesia. Anda hanya diberikan hak untuk menggunakan Layanan, dan <?= $web['nama'] ?> tetap memegang seluruh hak kepemilikan Layanan yang tidak diserahkan kepada Anda secara tertulis di dokumen ini. Selama Anda menggunakan atau memenuhi kewajiban pembayaran yang berlaku dan mematuhi ketentuan Perjanjian ini, <?= $web['nama'] ?> memberikan hak yang sifatnya personal, terbatas, tidak eksklusif, dan tidak dapat ditransfer (kecuali disebutkan secara eksplisit di dokumen ini) untuk menggunakan Layanan yang hanya berlaku untuk periode penggunaan yang disediakan dalam ketentuan pemesanan dan aktivasi, dan hanya untuk tujuan yang dijabarkan <?= $web['nama'] ?> di situs dan aplikasi untuk Layanan yang dimaksud.</p>
                                    </li>

                                    <p style="text-indent: 30px;"> Hak penggunaan yang diberikan kepada Anda oleh Perjanjian ini bukanlah sebuah pengalihan atau penjualan hak kepemilikan <?= $web['nama'] ?> atas Perangkat Lunak, Sistem, Layanan, atau bagiannya. Selain dari hak penggunaan yang disebutkan di awal paragraf ini, <?= $web['nama'] ?> tetap menguasai seluruh hak, hak milik, dan kepentingan (termasuk seluruh hak kekayaan intelektual) atas Perangkat Lunak ataupun salinannya. Perangkat Lunak dilindungi oleh peraturan perundang-undangan terkait hak kekayaan intelektual yang berlaku di wilayah Indonesia, termasuk undang-undang hak cipta dan perjanjian internasional. Upaya apapun untuk menggunakan Perangkat Lunak di luar yang diperbolehkan oleh lisensi ini akan mengakhiri berlakunya lisensi yang dimaksud secara otomatis dan Pengguna dapat dimintai pertanggungjawabannya.</p>

                                    <li>
                                        <p style="padding-left: 10px;">2.2 Pengguna setuju untuk tidak menggunakan Layanan atau konten situs ini dengan cara yang melanggar hukum, peraturan yang berlaku, dan Perjanjian ini. Kecuali diperbolehkan oleh <?= $web['nama'] ?> secara tertulis, Anda setuju bahwa Pengguna tidak akan:</p>
                                    </li>
                                    <ol>
                                        <li>a. Memberikan akses atau bagian Layanan apapun kepada pihak ketiga.</li>

                                        <li>b. Mengubah, menghalangi, atau mengganggu Layanan, server pendukung, atau jaringan baik secara manual maupun melalui penggunaan script, worm, ataupun virus.</li>

                                        <li>c. Mereproduksi, menduplikasi, mengkopi, mendekonstruksi, menjual, memperdagangkan, atau menjual kembali Layanan yang dimaksud.</li>

                                        <li>d. Mencoba mengakses sistem <?= $web['nama'] ?> lainnya yang tidak menjadi bagian Layanan.</li>

                                        <li>e. Secara berlebihan mengakibatkan overload terhadap sistem <?= $web['nama'] ?> yang digunakan untuk menyediakan Layanan.</li>
                                    </ol>
                                    <p>Jika Anda melanggar salah satu ketentuan tersebut atau lebih, Perjanjian ini dan hak Anda untuk menggunakan Layanan dapat diakhiri oleh <?= $web['nama'] ?> secara sepihak.</p>

                                    <p>3. PEMBAYARAN</p>
                                    <p>Untuk Layanan yang disediakan berdasarkan pembayaran berbasis-langganan, ketentuan berikut berlaku kecuali <?= $web['nama'] ?> memberi pemberitahuan lain secara tertulis. Perjanjian ini juga meliputi acuan dan mencakup program pemesanan dan ketentuan pembayaran yang disediakan bagi Anda di situs internet untuk Layanan yang dimaksud:
                                    <p>
                                    <ol>
                                        <li>a. Pembayaran akan ditagihkan dalam mata uang rupiah (Rp. atau Indonesian Rupiah/IDR).</li>

                                        <li>b. Semua pembayaran akan dibuat tanpa adanya pemotongan, khususnya pemotongan pajak atau jenis pajak lainnya, oleh karena itu Andalah yang akan sepenuhnya bertanggung jawab. Anda juga berkewajiban untuk mengirim bukti pembayaran pajak Anda kepada kami. Jika Anda tidak mengirim dokumen-dokumen tersebut kepada kami, maka kami berhak untuk menunda ataupun memutuskan akun Anda dan menolak penggunaan Layanan kami.</li>

                                        <li>c. Di bawah Perjanjian ini, layanan pemrosesan pembayaran untuk Perangkat Lunak dan/atau Layanan yang dibeli di situs ini disediakan oleh pihak ke tiga yang bertindak atas nama “<?= $web['nama'] ?>”, tergantung jenis metode pembayaran yang digunakan untuk pembelian Perangkat Lunak dan/atau Layanan.</li>

                                        <li>d. Setelah melakukan pembayaran pendaftaran, anda diwajibkan untuk mengikuti wawancara dan melajutkan proses pendaftaran yang akan disampaikan oleh <?= $web['nama'] ?> hingga kegiatan belajar mengajar di mulai.</li>

                                        <li>e. Jika setelah melakukan pembayaran pendaftaran Anda tidak mengikuti proses pendaftaran hingga selesai sesuai ketentuan <?= $web['nama'] ?>, maka Anda setuju bahwa uang pendaftaran Anda hangus.</li>
                                    </ol>
                                    <p>Anda harus membayar menggunakan salah satu cara berikut:</p>
                                    <ol>
                                        <li>a. Transfer melalui bank/ATM ke Rekening Virtual yang diberitahukan kepada Anda bersama tagihan;

                                        <li>b. Melalui cara pembayaran lainnya yang diberitahukan kepada Anda oleh <?= $web['nama'] ?> secara tertulis atau tertera pada aplikasi. Termasuk namun tidak terbatas pada Credit Card, E-Money, dan Go-Pay.

                                        <li>c. Pembayaran Tunai langsung ke bagian administrasi <?= $web['nama'] ?>, Lantai 2, Jl. Mayor Damar No.167 Kecamatan. Turen, Kabupaten Malang, Jawa Timur 65175. Pembayaran tunai hanya dapat dilakukan selain alamat tersebut. Jika Anda melakukan pembayaran tunai melalui selain yang diinformasikan maka bukan merupakan tanggung jawab kami, segera laporkan kepada pihak <?= $web['nama'] ?> melalui WhatsApp: (+62)811-360-6063.

                                        <li>d. Jika pembayaran dan informasi pendaftaran Anda tidak tepat, tidak terkini, atau tidak lengkap, kemudian Anda tidak memberitahukan kami secepatnya setelah terjadinya perubahan informasi, kami dapat membekukan atau mengakhiri akun Anda dan menolak menyediakan Anda penggunaan Layanan dalam bentuk apapun.

                                        <li>e. <?= $web['nama'] ?> akan secara otomatis memperbaharui Layanan bulanan atau tahunan dengan harga terkini, kecuali Layanan dibatalkan atau diakhiri sesuai Perjanjian ini.

                                        <li>f. Ketentuan tambahan untuk pembatalan atau pembaharuan dapat disampaikan kepada Anda melalui situs Layanan.
                                    </ol>
                                    <p>4. PENGGUNAAN LAYANAN DAN JASA</p>
                                    <p>Dengan Anda melanjutkan penggunaan atau pengaksesan Situs ini, berarti Anda telah menyatakan serta menjamin kepada Kami bahwa Anda hanya diperkenankan untuk mengakses dan/atau menggunakan Situs ini untuk keperluan pribadi.<br />
                                        Anda tidak diperkenankan menggunakan Situs dalam hal sebagai berikut :</p>
                                    <ol>
                                        <li>a. Untuk menyakiti, menyiksa, mempermalukan, memfitnah, mencemarkan nama baik, mengancam, mengintimidasi atau mengganggu orang atau bisnis lain, atau apapun yang melanggar privasi atau yang Kami anggap cabul, menghina, penuh kebencian, tidak senonoh, tidak patut, tidak pantas, tidak dapat diterima, mendiskriminasikan atau merusak.</li>
                                        <li>b. Dalam cara yang melawan hukum, tindakan penipuan atau tindakan komersil.</li>
                                        <li>c. Melanggar atau menyalahi hak orang lain, termasuk tanpa kecuali : hak paten, merek dagang, hak cipta, rahasia dagang, publisitas, dan hak milik lainnya.</li>
                                        <li>d. Untuk membuat, memeriksa, memperbarui, mengubah atau memperbaiki database, rekaman atau direktori Anda ataupun orang lain.</li>
                                        <li>e. Mengubah atau mengatur ulang bagian apapun dalam Situs ini yang akan mengganggu atau menaruh beban berlebihan pada sistem komunikasi dan teknis kami.</li>
                                        <li>f. Mengunakan kode computer otomatis, proses, program, robot, net crawler, spider, pemrosesan data, trawling atau kode computer, proses, program atau sistem ‘screen scraping’ alternatif.</li>
                                        <li>g. Kami tidak bertanggung jawab atas kehilangan akibat kegagalan mengakses Situs, dan metode penggunaan Situs yang di luar kendali Kami.</li>
                                        <li>h. Kami tidak bertanggung jawab atau dapat dipersalahkan atas kehilangan atau kerusakan yang diluar perkiraan saat Anda mengakses atau menggunakan Situs ini. Ini termasuk kehilangan penghematan yang diharapkan, kehilangan bisnis atau kesempatan bisnis, kehilangan pemasukan atau keuntungan, atau kehilangan atau kerusakan apapun yang Anda harus alami akibat penggunaan Situs ini.</li>
                                    </ol>

                                    <p>5. KETENTUAN PEMBEBASAN TANGGUNG JAWAB JAMINAN</p>

                                    <li>
                                        <p style="padding-left: 10px;">5.1 Penggunaan Anda terhadap layanan, perangkat lunak, dan konten sepenuhnya adalah risiko Anda. Kecuali disebutkan dalam Perjanjian ini, Layanan disediakan “sebagaimana adanya.” Semaksimal yang diperbolehkan oleh hukum yang berlaku, <?= $web['nama'] ?>, perusahaan afiliasinya, dan penyedia data atau jasa pihak ketiga, penyedia lisensi, distributor, atau penyuplai (secara kolektif disebut “penyuplai”) membebaskan diri dari tanggung jawab terkait seluruh bentuk jaminan, secara eksplisit maupun tersirat, termasuk jaminan bahwa layanan cocok untuk tujuan khusus, hak milik, dapat diperdagangkan, kehilangan data, non-interferensi terhadap atau tidak adanya pelanggaran terhadap hak kekayaan intelektual, atau ketepatan, keandalan, kualitas atau konten dalam atau terkait dengan layanan. <?= $web['nama'] ?> dan perusahaan afiliasinya dan penyuplai tidak memberikan jaminan bahwa layanan yang disediakan sepenuhnya aman, bebas dari bugs, virus, interupsi, error, pencurian, atau kehancuran. Jika pengecualian untuk jaminan tersirat tidak berlaku bagi Anda, jaminan tersirat terbatas pada 60 hari dari tanggal pembelian atau pengiriman layanan, manapun yang lebih cepat.</p>
                                    </li>

                                    <li>
                                        <p style="padding-left: 10px;">5.2 <?= $web['nama'] ?> berikut perusahaan afiliasi dan penyuplai membebaskan diri dari tanggung jawab atas representasi atau jaminan bahwa penggunaan layanan oleh Anda akan memenuhi atau memastikan kepatuhan kepada kewajiban hukum atau undang-undang atau peraturan lainnya. Anda sendiri yang bertanggung jawab bahwa penggunaan layanan patuh kepada dengan hukum yang berlaku.</p>
                                    </li>

                                    <p>6. UMUM</p>

                                    <li>
                                        <p style="padding-left: 10px;">6.1. Penggunaan dan akses ke Situs ini diatur oleh Syarat dan Ketentuan serta Kebijakan Privasi Kami. Dengan mengakses atau menggunakan Situs ini, informasi, atau aplikasi lainnya dalam bentuk aplikasi mobile yang disediakan dalam Situs, berarti Anda telah memahami, menyetujui serta terikat dan tunduk dengan segala syarat dan ketentuan yang berlaku di <?= $web['nama'] ?>.</p>
                                    </li>

                                    <li>
                                        <p style="padding-left: 10px;">6.2. Kami berhak untuk menutup atau mengubah atau memperbaharui Syarat dan Ketentuan ini setiap saat tanpa pemberitahuan, dan berhak untuk membuat keputusan akhir jika tidak ada ketidakcocokan. Kami tidak bertanggung jawab atas kerugian dalam bentuk apa pun yang timbul akibat perubahan pada Syarat dan Ketentuan.</p>
                                    </li>

                                    <li>
                                        <p style="padding-left: 10px;">6.3. Jika Anda masih memerlukan jawaban atas pertanyaan yang tidak terdapat dalam Syarat dan Ketentuan ini, Anda dapat menghubungi Kami di email sma@bisantara.com atau menghubungi Kami di nomor <?= $web['telp'] ?></p>
                                    </li>


                                </div>
                            </div>
                            <div class="float-left" id="show-check">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" id="termsChkbx" onchange="isChecked(this, 'sub1')" />
                                        <label class="form-check-label" for="gridCheck">
                                            Saya setuju dengan syarat & ketentuan.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" id="sub1" class="btn btn-success" disabled="disabled" onclick="$('#submit-form').submit()">Kirim Pendaftaran</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

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

    function isChecked(checkbox, sub1) {
        document.getElementById(sub1).disabled = !checkbox.checked;
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#jurus").hide();
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

        $("#show-check").hide();

        $('#scrollTop').scroll(function() {
            if ($('#scrollTop').scrollTop() > 100) {
                $("#show-check").show();
            } else {
                $("#show-check").hide();
            }
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
</script>