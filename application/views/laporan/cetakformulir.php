<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FORMULIR PMB STIKES BOGOR HUSADA</title>
	<style>
		html,
		body {
			font-size: 12px;
		}

		@page {
			margin: 25px;
		}

		.header {
			font-size: 14px;
			font-weight: bold;
			text-align: center;
		}

		table {
			width: 100%;
			border: 1px solid #000000;
			border-collapse: collapse;
		}

		.tabel_utama {
			font-size: 14px;
			padding-top: 15px;
			padding-bottom: 15px;
		}

		.tabel_footer {
			padding-top: 30px;
			font-size: 14px;
			border: 1px solid #fff;
			text-align: center;
		}

		table tr th,

		table tr td {
			border: 1px solid #fff;
			padding: 4px 8px;
		}
	</style>
</head>

<body>
	<div class="header">
		<div style="font-weight: bold; font-size: 17px">FORMULIR PENERIMAAN PESERTA MAHASISWA BARU</div>
		<div style="font-weight: bold; font-size: 22px">"<?= $web['nama'] ?>"</div>
		<div style="font-size: 15px;">Alamat : <?= $web['alamat'] ?></div>
		<div style="font-size: 15px;">No Telp : <?= $web['telp'] ?> E-mail : <?= $web['email'] ?></div>

		<div style="font-size: 16px">Tahun Pelajaran <?= date("Y"); ?>/<?= date("Y") + 1; ?></div>
	</div>

	<hr>

	<table class="tabel_utama" style="border: 1px;" width="100%" cellspacing="2">
		<tr>
			<td width="25%">Nomor Pendaftaran</td>
			<td width="50%"><?= $pmb['no_daftar'] ?></td>
		</tr>
		<tr>
			<td>Status Pendaftaran</td>
			<td><?= ($pmb['status'] == 1) ? 'Konfirmasi' : 'Di Tolak' ?></td>
		</tr>
	</table>
	<table width="100%" class="tabel_utama" cellspacing="2">
		<tr>
			<td colspan="3"><b>A. IDENTITAS CALON MAHASISWA</b></td>
		</tr>
		<tr>
			<td align="" width="5%">1. </td>
			<td width="20%">Nama</td>
			<td width="50%"><?= strtoupper($pmb['nama']); ?></td>
		</tr>
		<tr>
			<td align="">2. </td>
			<td>NIK</td>
			<td><?= $pmb['nik'] ?></td>
		</tr>
		<tr>
			<td align="">3. </td>
			<td>NISN</td>
			<td><?= $pmb['nis'] ?></td>
		</tr>
		<tr>
			<td align="">4. </td>
			<td>Jenis Kelamin</td>
			<td><?= ($pmb['jk'] == 'L') ? 'Laki-Laki' : 'Perempuan' ?></td>
		</tr>
		<tr>
			<td align="">5. </td>
			<td>Tempat Lahir</td>
			<td><?= $pmb['kab'] ?></td>
		</tr>
		<tr>
			<td align="">6. </td>
			<td>Tanggal Lahir</td>
			<td><?= mediumdate_indo(date($pmb['ttl'])) ?></td>
		</tr>
		<tr>
			<td align="">7. </td>
			<td>Alamat</td>
			<td><?= $pmb['alamat'] ?></td>
		</tr>
		<tr>
			<td align="">8. </td>
			<td>Asal Sekolah</td>
			<td><?= $pmb['sekolah_asal'] ?></td>
		</tr>
		<tr>
			<td align="">9. </td>
			<td>Email</td>
			<td><?= $pmb['email'] ?></td>
		</tr>
		<tr>
			<td align="">10. </td>
			<td>No HP</td>
			<td><?= $pmb['no_hp'] ?></td>
		</tr>
		<tr>
			<td colspan="3"><b>B. IDENTITAS ORANG TUA</b></td>
		</tr>
		<tr>
			<td align="">1. </td>
			<td>Nama Ayah</td>
			<td><?= $pmb['nama_ayah'] ?></td>
		</tr>
		<tr>
			<td align="">2. </td>
			<td>Pekerjaan Ayah</td>
			<td><?= $pmb['pek_ayah'] ?></td>
		</tr>
		<tr>
			<td align="">3. </td>
			<td>Nama Ibu</td>
			<td><?= $pmb['nama_ibu'] ?></td>
		</tr>
		<tr>
			<td align="">4. </td>
			<td>Pekerjaan Ibu</td>
			<td><?= $pmb['pek_ibu'] ?></td>
		</tr>
		<tr>
			<td align="">5. </td>
			<td>No Telepon Ortu</td>
			<td><?= $pmb['no_telp'] ?></td>
		</tr>
		<?php if (!empty($pmb['nama_wali'])) : ?>
			<tr>
				<td colspan="3"><b>C. IDENTITAS WALI</b></td>
			</tr>
			<tr>
				<td align="">1. </td>
				<td>Nama Wali</td>
				<td><?= $pmb['nama_wali'] ?></td>
			</tr>
			<tr>
				<td align="">2. </td>
				<td>Pekerjaan Wali</td>
				<td><?= $pmb['pek_wali'] ?></td>
			</tr>
			<tr>
				<td align="">3. </td>
				<td>No Telepon</td>
				<td><?= $pmb['no_telp'] ?></td>
			</tr>
		<?php endif ?>
	</table>
	<hr />
	<table class="tabel_utama" width="100%" cellspacing="2">
		<tr>
			<td colspan="3"><b>*) PERYARATAN PENDAFTARAN</b></td>
		</tr>
		<tr>
			<td align="" width="5%">1. </td>
			<td width="20%">KTP / Akta Lahir</td>
			<td width="50%"><?= (!empty($pmb['img_ktp'])) ? 'Ada' : 'Tidak Ada' ?></td>
		</tr>
		<tr>
			<td align="" width="5%">2. </td>
			<td width="20%">Kartu Keluarga (KK)</td>
			<td width="50%"><?= (!empty($pmb['img_kk'])) ? 'Ada' : 'Tidak Ada' ?></td>
		</tr>
		<tr>
			<td align="" width="5%">3. </td>
			<td width="20%">SKHUN / Ijazah</td>
			<td width="50%"><?= (!empty($pmb['img_ijazah'])) ? 'Ada' : 'Tidak Ada' ?></td>
		</tr>
	</table>

	<table class="tabel_footer" width="">
		<tr>
			<td width="50%" align="center"><br><br><br><br><br><br></td>
			<td width="50%" align="center">Bogor,</span>, <?= pretty_date(date('Y-m-d'), 'd F Y', false) ?><br />Orang Tua / Wali <br><br><br><br><br>( ................................... )</td>
		</tr>
	</table>

</body>

</html>