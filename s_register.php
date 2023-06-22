<?php
session_start();
if (!isset($_SESSION['form_status']) || $_SESSION['form_status'] != 'next') {
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
    <section class="reg-form mt-3">
    	<h1 class="ap fw-bold text-center">Formulir Pendaftaran</h1>
    	<form action="form/2.php" class="row g-3 ms-2 mt-3 me-2 pb-3 bg-light shadow-lg" method="POST" id="form-two">
    	  <h4 for="inputEmail4" class="form-label ap fw-bold">Identitas Orang Tua/Wali</h4>
          <div class="col-md-6">
          	<h5 for="inputEmail4" class="form-label ap fw-bold">Informasi Ayah</h5>
          	<div class="pt-2">
			    <label for="inputEmail4" class="form-label">Nama Lengkap</label>
			    <input type="text" name="nama_l_ayah" class="form-control" id="inputEmail4" placeholder="Nama Lengkap" value="<?php echo $_SESSION['nama_l_ayah'] ?? ''; ?>">
			  </div>
			  <div class="pt-2">
			    <label for="inputEmail4" class="form-label">Tempat Lahir</label>
			    <input type="text" name="tempat_l_ayah" class="form-control" id="inputEmail4" placeholder="Nama Lengkap" value="<?php echo $_SESSION['tempat_l_ayah'] ?? ''; ?>">
			  </div>
			  <div class="pt-2">
			    <label for="inputAddress2" class="form-label">Tanggal Lahir</label>
			    <input type="text" name="tanggal_l_ayah" class="form-control" id="inputAddress2" onfocus="(this.type='date')" onblur="(this.type='text')"  placeholder="Double click" value="<?php echo $_SESSION['tanggal_l_ayah'] ?? ''; ?>">
			  </div>
			  <div class="pt-2">
			    <label for="inputAg" class="form-label">Agama</label>
			    <select id="inputState" name="agama_ayah" class="form-select">
			      <option selected>Pilih</option>
			      <option value="Islam"<?php if(isset($_SESSION['agama_ayah']) && $_SESSION['agama_ayah'] == 'Islam') echo ' selected'; ?>>Islam</option>
			      <option value="Kristen"<?php if(isset($_SESSION['agama_ayah']) && $_SESSION['agama_ayah'] == 'Kristen') echo ' selected'; ?>>Kristen</option>
			      <option value="Katolik"<?php if(isset($_SESSION['agama_ayah']) && $_SESSION['agama_ayah'] == 'Katolik') echo ' selected'; ?>>Katolik</option>
			      <option value="Hindu"<?php if(isset($_SESSION['agama_ayah']) && $_SESSION['agama_ayah'] == 'Hindu') echo ' selected'; ?>>Hindu</option>
			      <option value="Buddha"<?php if(isset($_SESSION['agama_ayah']) && $_SESSION['agama_ayah'] == 'Buddha') echo ' selected'; ?>>Buddha</option>
			      <option value="Khonghucu"<?php if(isset($_SESSION['agama_ayah']) && $_SESSION['agama_ayah'] == 'Khonghucu') echo ' selected'; ?>>Khonghucu</option>
			    </select>
			  </div>
			  <div class="pt-2">
			    <label for="inputa" class="form-label">Alamat Ayah</label>
			    <input type="text" name="alamat_ayah" class="form-control" id="inputZip" value="<?php echo $_SESSION['alamat_ayah'] ?? ''; ?>">
			  </div>
			  <div class="pt-2">
			    <label for="inputAg" class="form-label">Status Dengan Ayah</label>
			    <select id="inputState" name="status_dayah" class="form-select">
			      <option selected>Pilih</option>
			      <option value="Kandung"<?php if(isset($_SESSION['status_dayah']) && $_SESSION['status_dayah'] == 'Kandung') echo ' selected'; ?>>Kandung</option>
			      <option value="Tiri"<?php if(isset($_SESSION['status_dayah']) && $_SESSION['status_dayah'] == 'Tiri') echo ' selected'; ?>>Tiri</option>
			      <option value="Angkat"<?php if(isset($_SESSION['status_dayah']) && $_SESSION['status_dayah'] == 'Angkat') echo ' selected'; ?>>Angkat</option>
			      <option value="Wali"<?php if(isset($_SESSION['status_dayah']) && $_SESSION['status_dayah'] == 'Wali') echo ' selected'; ?>>Wali</option>
			    </select>
			  </div>
			  <div class="pt-2">
			    <label for="inputa" class="form-label">Kewarganegaraan</label>
			    <input type="text" name="negara_ayah" class="form-control" id="inputZip" value="<?php echo $_SESSION['negara_ayah'] ?? ''; ?>">
			  </div>
			  <div class="pt-2">
			    <label for="inputa" class="form-label">Pekerjaan</label>
			    <input type="text" name="pekerjaan_ayah" class="form-control" id="inputZip" value="<?php echo $_SESSION['pekerjaan_ayah'] ?? ''; ?>">
			  </div>
              <div class="pt-2">
			    <label for="inputP" class="form-label">Pendidikan</label>
			    <select id="inputState" name="pendidikan_ayah" class="form-select">
			      <option selected>Pilih</option>
			      <option value="Tidak/Belum Sekolah"<?php if(isset($_SESSION['pendidikan_ayah']) && $_SESSION['pendidikan_ayah'] == 'Tidak/Belum Sekolah') echo ' selected'; ?>>Tidak/Belum Sekolah</option>
			      <option value="Belum Tamat SD/Sederajat"<?php if(isset($_SESSION['pendidikan_ayah']) && $_SESSION['pendidikan_ayah'] == 'Belum Tamat SD/Sederajat') echo ' selected'; ?>>Belum Tamat SD/Sederajat</option>
			      <option value="Tamat SD/Sederajat"<?php if(isset($_SESSION['pendidikan_ayah']) && $_SESSION['pendidikan_ayah'] == 'Tamat SD/Sederajat') echo ' selected'; ?>>Tamat SD/Sederajat</option>
			      <option value="SLTP/Sederajat"<?php if(isset($_SESSION['pendidikan_ayah']) && $_SESSION['pendidikan_ayah'] == 'SLTP/Sederajat') echo ' selected'; ?>>SLTP/Sederajat</option>
			      <option value="SLTA/Sederajat"<?php if(isset($_SESSION['pendidikan_ayah']) && $_SESSION['pendidikan_ayah'] == 'SLTA/Sederajat') echo ' selected'; ?>>SLTA/Sederajat</option>
			      <option value="Diploma I/II"<?php if(isset($_SESSION['pendidikan_ayah']) && $_SESSION['pendidikan_ayah'] == 'Diploma I/II') echo ' selected'; ?>>Diploma I/II</option>
			      <option value="Akademi/Diploma III/Sarjana Muda"<?php if(isset($_SESSION['pendidikan_ayah']) && $_SESSION['pendidikan_ayah'] == 'Akademi/Diploma III/Sarjana Muda') echo ' selected'; ?>>Akademi/Diploma III/Sarjana Muda</option>
			      <option value="Diploma IV/Sastra I"<?php if(isset($_SESSION['pendidikan_ayah']) && $_SESSION['pendidikan_ayah'] == 'Diploma IV/Sastra I') echo ' selected'; ?>>Diploma IV/Sastra I</option>
			      <option value="Sastra II"<?php if(isset($_SESSION['pendidikan_ayah']) && $_SESSION['pendidikan_ayah'] == 'Sastra II') echo ' selected'; ?>>Sastra II</option>
			      <option value="Sastra III"<?php if(isset($_SESSION['pendidikan_ayah']) && $_SESSION['pendidikan_ayah'] == 'Sastra III') echo ' selected'; ?>>Sastra III</option>
			    </select>
			  </div> 
          </div>
          <div class="col-md-6">
          	<h5 for="inputEmail4" class="form-label ap fw-bold">Informasi Ibu</h5>
          	<div class="pt-2">
			    <label for="inputEmail4" class="form-label">Nama Lengkap</label>
			    <input type="text" name="nama_l_ibu" class="form-control" id="inputEmail4" placeholder="Nama Lengkap" value="<?php echo $_SESSION['nama_l_ibu'] ?? ''; ?>">
			  </div>
			  <div class="pt-2">
			    <label for="inputEmail4" class="form-label">Tempat Lahir</label>
			    <input type="text" name="tempat_l_ibu" class="form-control" id="inputEmail4" placeholder="Tempat Lahir" value="<?php echo $_SESSION['tempat_l_ibu'] ?? ''; ?>">
			  </div>
			  <div class="pt-2">
			    <label for="inputAddress2" class="form-label">Tanggal Lahir</label>
			    <input type="text" name="tanggal_l_ibu" class="form-control" id="inputAddress2" onfocus="(this.type='date')" onblur="(this.type='text')"  placeholder="Double click" value="<?php echo $_SESSION['tanggal_l_ibu'] ?? ''; ?>">
			  </div>
			  <div class="pt-2">
			    <label for="inputAg" class="form-label">Agama</label>
			    <select id="inputState" name="agama_ibu" class="form-select">
			      <option selected>Pilih</option>
			      <option value="Islam"<?php if(isset($_SESSION['agama_ibu']) && $_SESSION['agama_ibu'] == 'Islam') echo ' selected'; ?>>Islam</option>
			      <option value="Kristen"<?php if(isset($_SESSION['agama_ibu']) && $_SESSION['agama_ibu'] == 'Kristen') echo ' selected'; ?>>Kristen</option>
			      <option value="Katolik"<?php if(isset($_SESSION['agama_ibu']) && $_SESSION['agama_ibu'] == 'Katolik') echo ' selected'; ?>>Katolik</option>
			      <option value="Hindu"<?php if(isset($_SESSION['agama_ibu']) && $_SESSION['agama_ibu'] == 'Hindu') echo ' selected'; ?>>Hindu</option>
			      <option value="Buddha"<?php if(isset($_SESSION['agama_ibu']) && $_SESSION['agama_ibu'] == 'Buddha') echo ' selected'; ?>>Buddha</option>
			      <option value="Khonghucu"<?php if(isset($_SESSION['agama_ibu']) && $_SESSION['agama_ibu'] == 'Khonghucu') echo ' selected'; ?>>Khonghucu</option>
			    </select>
			  </div>
			  <div class="pt-2">
			    <label for="inputa" class="form-label">Alamat Ibu</label>
			    <input type="text" name="alamat_ibu" class="form-control" id="inputZip" value="<?php echo $_SESSION['alamat_ibu'] ?? ''; ?>">
			  </div>
			  <div class="pt-2">
			    <label for="inputAg" class="form-label">Status Dengan Ibu</label>
			    <select id="inputState" name="status_dibu" class="form-select">
			      <option selected>Pilih</option>
			      <option value="Kandung"<?php if(isset($_SESSION['status_dibu']) && $_SESSION['status_dibu'] == 'Kandung') echo ' selected'; ?>>Kandung</option>
			      <option value="Tiri"<?php if(isset($_SESSION['status_dibu']) && $_SESSION['status_dibu'] == 'Tiri') echo ' selected'; ?>>Tiri</option>
			      <option value="Angkat"<?php if(isset($_SESSION['status_dibu']) && $_SESSION['status_dibu'] == 'Angkat') echo ' selected'; ?>>Angkat</option>
			      <option value="Wali"<?php if(isset($_SESSION['status_dibu']) && $_SESSION['status_dibu'] == 'Wali') echo ' selected'; ?>>Wali</option>
			    </select>
			  </div>
			  <div class="pt-2">
			    <label for="inputa" class="form-label">Kewarganegaraan</label>
			    <input type="text" name="negara_ibu" class="form-control" id="inputZip" value="<?php echo $_SESSION['negara_ibu'] ?? ''; ?>">
			  </div>
			  <div class="pt-2">
			    <label for="inputa" class="form-label">Pekerjaan</label>
			    <input type="text" name="pekerjaan_ibu" class="form-control" id="inputZip" value="<?php echo $_SESSION['pekerjaan_ibu'] ?? ''; ?>">
			  </div>
              <div class="pt-2">
			    <label for="inputP" class="form-label">Pendidikan</label>
			    <select id="inputState" name="pendidikan_ibu" class="form-select">
			      <option selected>Pilih</option>
			      <option value="Tidak/Belum Sekolah"<?php if(isset($_SESSION['pendidikan_ibu']) && $_SESSION['pendidikan_ibu'] == 'Tidak/Belum Sekolah') echo ' selected'; ?>>Tidak/Belum Sekolah</option>
			      <option value="Belum Tamat SD/Sederajat"<?php if(isset($_SESSION['pendidikan_ibu']) && $_SESSION['pendidikan_ibu'] == 'Belum Tamat SD/Sederajat') echo ' selected'; ?>>Belum Tamat SD/Sederajat</option>
			      <option value="Tamat SD/Sederajat"<?php if(isset($_SESSION['pendidikan_ibu']) && $_SESSION['pendidikan_ibu'] == 'Tamat SD/Sederajat') echo ' selected'; ?>>Tamat SD/Sederajat</option>
			      <option value="SLTP/Sederajat"<?php if(isset($_SESSION['pendidikan_ibu']) && $_SESSION['pendidikan_ibu'] == 'SLTP/Sederajat') echo ' selected'; ?>>SLTP/Sederajat</option>
			      <option value="SLTA/Sederajat"<?php if(isset($_SESSION['pendidikan_ibu']) && $_SESSION['pendidikan_ibu'] == 'SLTA/Sederajat') echo ' selected'; ?>>SLTA/Sederajat</option>
			      <option value="Diploma I/II"<?php if(isset($_SESSION['pendidikan_ibu']) && $_SESSION['pendidikan_ibu'] == 'Diploma I/II') echo ' selected'; ?>>Diploma I/II</option>
			      <option value="Akademi/Diploma III/Sarjana Muda"<?php if(isset($_SESSION['pendidikan_ibu']) && $_SESSION['pendidikan_ibu'] == 'Akademi/Diploma III/Sarjana Muda') echo ' selected'; ?>>Akademi/Diploma III/Sarjana Muda</option>
			      <option value="Diploma IV/Sastra I"<?php if(isset($_SESSION['pendidikan_ibu']) && $_SESSION['pendidikan_ibu'] == 'Diploma IV/Sastra I') echo ' selected'; ?>>Diploma IV/Sastra I</option>
			      <option value="Sastra II"<?php if(isset($_SESSION['pendidikan_ibu']) && $_SESSION['pendidikan_ibu'] == 'Sastra II') echo ' selected'; ?>>Sastra II</option>
			      <option value="Sastra III"<?php if(isset($_SESSION['pendidikan_ibu']) && $_SESSION['pendidikan_ibu'] == 'Sastra III') echo ' selected'; ?>>Sastra III</option>
			    </select>
			  </div> 
          </div>
		  <div class="col-12 d-flex">
		    <button type="button" id="btnsubmit" class="btn btn-primary fw-bold me-2">Simpan</button>
		    <button type="submit" name="delsubmit" class="btn btn-danger me-2 fw-bold fs-6">Hapus</button>
		    <a href="register.php" name="back" class="btn btn-warning text-white fw-bold me-2 ">Kembali</i></a>
		    <button type="submit" name="sendsubmit" id="por" class="btn btn-success fw-bold fs-6">Kirim</button>
		  </div>
	    </form>
	</section>
	<script src="js/actionjs.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
<?php
if (isset($_SESSION['alert_send'])) {
	echo $_SESSION['alert_send'];
	unset($_SESSION['alert_send']);
}
if (isset($_SESSION['aler_fail'])) {
	echo $_SESSION['aler_fail'];
	unset($_SESSION['aler_fail']);
}
?>