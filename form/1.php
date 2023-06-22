<?php
session_start();

/*
CREATE TABLE informasi_c_siswa (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nama_lengkap VARCHAR(255),
  nama_panggilan VARCHAR(255),
  tempat_lahir VARCHAR(255),
  tanggal_lahir DATE,
  jenis_kelamin VARCHAR(50),
  agama VARCHAR(255),
  alamat VARCHAR(255),
  anak_ke VARCHAR(255),
  jumlah_saudara VARCHAR(255),
  status_d_keluarga VARCHAR(255),
  negara VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

SELECT a.*, i.*
FROM informasi_c_siswa AS a
INNER JOIN informasi_orangtua AS i ON a.id = i.id_c_siswa;


*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_SESSION['form_status'])) {
	    header("Location: ../register.php");
	    exit();
	} elseif(isset($_POST['delsubmit'])) {
        $sessionNames = array('nama_lengkap', 'nama_p', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat','anak_ke', 'jumlah_saudara', 'status_d_keluarga', 'negara');
		foreach ($sessionNames as $sessionName) {
		    if (isset($_SESSION[$sessionName])) {
		        unset($_SESSION[$sessionName]);
		    }
		}
        header("Location: ../register.php");
	    exit();
	} elseif(isset($_POST['next'])) {
        header("Location: ../s_register.php");
	    exit();
    } else {
	    $nama = $_POST['3ab0'];
	    $nama_p = $_POST['2bs1'];
	    $tempat_l = $_POST['6bs1'];
	    $tanggal_l = $_POST['8bz1'];
	    $jenis_k = $_POST['azs1'];
	    $agama = $_POST['5vs1'];
	    $alamat = $_POST['sb4f1'];
	    $anak_ke = $_POST['7df1'];
	    $jumlah_s = $_POST['g80a'];
	    $status_dk = $_POST['7bs1'];
	    $negara = $_POST['6js1'];  
	    $aab0 = filter_var($nama, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $abs1 = filter_var($nama_p, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $abst = filter_var($tempat_l, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $azs1 = filter_var($jenis_k, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $apd = filter_var($agama, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $avs1 = filter_var($alamat, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $adf1 = filter_var($anak_ke, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $a80a = filter_var($jumlah_s, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $abs1 = filter_var($status_dk, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $ajs1 = filter_var($negara, FILTER_SANITIZE_SPECIAL_CHARS);      
	    $_SESSION['nama_lengkap'] = $aab0;
	    $_SESSION['nama_p'] = $abs1;
	    $_SESSION['tempat_lahir'] = $abst;
	    $_SESSION['tanggal_lahir'] = $tanggal_l;
	    $_SESSION['jenis_kelamin'] = $azs1;
	    $_SESSION['agama'] = $apd;
	    $_SESSION['alamat'] = $avs1;
	    $_SESSION['anak_ke'] = $adf1;
	    $_SESSION['jumlah_saudara'] = $a80a;
	    $_SESSION['status_d_keluarga'] = $abs1;
	    $_SESSION['negara'] = $ajs1;
	    $_SESSION['form_status'] = "next";
	    $_SESSION['alert_save'] = "<script>swal_save_js();</script>";
	    header("Location: ../register.php");
	    exit();
	}
}

?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
</body></html>