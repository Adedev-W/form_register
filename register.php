<?php
session_start();
if (!isset($_SESSION['form_status'])) {
	$_SESSION['form_status'] = "add";
    header("Location: register.php");
    exit();
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran TK Harvard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <section class="reg-form mt-3">
    	<h1 class="ap fw-bold text-center">Formulir Pendaftaran</h1>
    	<form action="form/1.php" class="row g-3 ms-2 mt-3 me-2 pb-3 bg-light shadow-lg" method="POST" id="form-one">
			  <div class="col-md-6">
			    <label for="inputEmail4" class="form-label">Nama Lengkap</label>
			    <input type="text" name="3ab0" class="form-control" id="inputEmail4" placeholder="Nama Lengkap" value="<?php echo $_SESSION['nama_lengkap'] ?? ''; ?>">
			  </div>
			  <div class="col-md-6">
			    <label for="inputPassword4" class="form-label">Nama Panggilan</label>
			    <input type="text" name="2bs1" class="form-control" id="inputPassword4" placeholder="Nama Panggilan" value="<?php echo $_SESSION['nama_p'] ?? ''; ?>">
			  </div>
			  <div class="col-md-6">
			    <label for="inputAddress" class="form-label">Tempat Lahir</label>
			    <input type="text" name="6bs1" class="form-control" id="inputAddress" placeholder="Tempat Lahir" value="<?php echo $_SESSION['tempat_lahir'] ?? ''; ?>">
			  </div>
			  <div class="col-md-6">
			    <label for="inputAddress2" class="form-label">Tanggal Lahir</label>
			    <input type="text" name="8bz1" class="form-control" id="inputAddress2" onfocus="(this.type='date')" onblur="(this.type='text')"  placeholder="Double click" value="<?php echo $_SESSION['tanggal_lahir'] ?? ''; ?>">
			  </div>
			  <div class="col-md-6">
			    <label for="inputState" class="form-label">Jenis Kelamin</label>
			    <select id="inptgendr" name="azs1" class="form-select">
			      <option selected>Pilih</option>
			      <option value="Laki-Laki"<?php if(isset($_SESSION['jenis_kelamin']) && $_SESSION['jenis_kelamin'] == 'Laki-Laki') echo ' selected'; ?>>Laki-laki</option>
			      <option value="Perempuan"<?php if(isset($_SESSION['jenis_kelamin']) && $_SESSION['jenis_kelamin'] == 'Perempuan') echo ' selected'; ?>>Perempuan</option>
			    </select>
			  </div>
			  <div class="col-md-6">
			    <label for="inputAg" class="form-label">Agama</label>
			    <select id="inputState" name="5vs1" class="form-select">
			      <option selected>Pilih</option>
			      <option value="islam"<?php if(isset($_SESSION['agama']) && $_SESSION['agama'] == 'islam') echo ' selected'; ?>>Islam</option>
			      <option value="kristen"<?php if(isset($_SESSION['agama']) && $_SESSION['agama'] == 'kristen') echo ' selected'; ?>>Kristen</option>
			      <option value="katolik"<?php if(isset($_SESSION['agama']) && $_SESSION['agama'] == 'katolik') echo ' selected'; ?>>Katolik</option>
			      <option value="hindu"<?php if(isset($_SESSION['agama']) && $_SESSION['agama'] == 'hindu') echo ' selected'; ?>>Hindu</option>
			      <option value="buddha"<?php if(isset($_SESSION['agama']) && $_SESSION['agama'] == 'buddha') echo ' selected'; ?>>Buddha</option>
			      <option value="khonghucu"<?php if(isset($_SESSION['agama']) && $_SESSION['agama'] == 'khonghucu') echo ' selected'; ?>>Khonghucu</option>
			    </select>
			  </div>
			  <div class="col-md-6">
			    <label for="inputa" class="form-label">Alamat</label>
			    <input type="text" name="sb4f1" class="form-control" id="inputZip" value="<?php echo $_SESSION['alamat'] ?? ''; ?>">
			  </div>
			  <div class="col-md-6">
			    <label for="inputa" class="form-label">Anak Ke-</label>
			    <input type="text" name="7df1" class="form-control" id="inputZip" value="<?php echo $_SESSION['anak_ke'] ?? ''; ?>">
			  </div>
			  <div class="col-md-6">
			    <label for="inputa" class="form-label">Jumlah Saudara</label>
			    <input type="text" name="g80a" class="form-control" id="inputZip" value="<?php echo $_SESSION['jumlah_saudara'] ?? ''; ?>">
			  </div>
			  <div class="col-md-4">
			    <label for="inputa" class="form-label">Status dalam Keluarga</label>
			    <input type="text" name="7bs1" class="form-control" id="inputZip" value="<?php echo $_SESSION['status_d_keluarga'] ?? ''; ?>">
			  </div>
			  <div class="col-md-4">
			    <label for="inputa" class="form-label">Kewarganegaraan</label>
			    <input type="text" name="6js1" class="form-control" id="inputZip" value="<?php echo $_SESSION['negara'] ?? ''; ?>">
			  </div>
			  <div class="col-12 d-flex">
			    <button type="button" id="submitbtn" class="btn btn-primary me-2 fw-bold fs-6">Simpan</button>
			  <?php if(isset($_SESSION['form_status']) && $_SESSION['form_status'] == 'next') { ?>
						    <button type="submit" name="delsubmit" class="btn btn-danger me-2 fw-bold fs-6">Hapus</button>
						    <button type="submit" name="next"  class="btn text-white fw-bold btn-warning">Lanjut</button>
			  <?php } ?>
			  </div>
	    </form>
	</section>
	<script src="/js/actionjsuser.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
<?php
if (isset($_SESSION['alert_save'])) {
	echo $_SESSION['alert_save'];
	unset($_SESSION['alert_save']);
}
if (isset($_SESSION['k'])) {
	echo $_SESSION['k'];
}
	
/*

*/
?>