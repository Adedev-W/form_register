<?php
session_start();
include_once "../db/cc.php";
/*
if (!isset($_SESSION['form_status']) || $_SESSION['form_status'] != 'next') {
    header("Location: register.php");
    exit();
}
*/
/*
CREATE TABLE informasi_orangtua (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nama_lengkap_ayah VARCHAR(255),
  tempat_lahir_ayah VARCHAR(255),
  tanggal_lahir_ayah DATE,
  agama_ayah VARCHAR(50),
  alamat_ayah VARCHAR(255),
  status_dengan_ayah VARCHAR(50),
  negara_ayah VARCHAR(255),
  pekerjaan_ayah VARCHAR(255),
  pendidikan_ayah VARCHAR(255),
  nama_lengkap_ibu VARCHAR(255),
  tempat_lahir_ibu VARCHAR(255),
  tanggal_lahir_ibu DATE,
  agama_ibu VARCHAR(50),
  alamat_ibu VARCHAR(255),
  status_dengan_ibu VARCHAR(50),
  negara_ibu VARCHAR(255),
  pekerjaan_ibu VARCHAR(255),
  pendidikan_ibu VARCHAR(255),
  id_c_siswa INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (id_c_siswa) REFERENCES informasi_c_siswa(id)
);
INSERT INTO informasi_orangtua (nama_lengkap_ayah, tempat_lahir_ayah, tanggal_lahir_ayah, agama_ayah, alamat_ayah, status_dengan_ayah, negara_ayah, pekerjaan_ayah, pendidikan_ayah, nama_lengkap_ibu, tempat_lahir_ibu, tanggal_lahir_ibu, agama_ibu, alamat_ibu, status_dengan_ibu, negara_ibu, pekerjaan_ibu, pendidikan_ibu, id_c_siswa)
VALUES ('Nama Ayah', 'Tempat Lahir Ayah', '1980-01-01', 'Islam', 'Alamat Ayah', 'Ayah', 'Indonesia', 'Pekerjaan Ayah', 'Pendidikan Ayah', 'Nama Ibu', 'Tempat Lahir Ibu', '1982-02-02', 'Islam', 'Alamat Ibu', 'Ibu', 'Indonesia', 'Pekerjaan Ibu', 'Pendidikan Ibu', LAST_INSERT_ID());


*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_SESSION['form_status'])) {
	    header("Location: ../register.php");
	    exit();
	} elseif(isset($_POST['delsubmit'])) {
        $sessionNames = array('nama_l_ayah', 'tempat_l_ayah', 'tanggal_l_ayah', 'agama_ayah', 'alamat_ayah', 'status_dayah', 'negara_ayah','pekerjaan_ayah', 'pendidikan_ayah','nama_l_ibu', 'tempat_l_ibu', 'tanggal_l_ibu', 'agama_ibu', 'alamat_ibu', 'status_dibu', 'negara_ibu','pekerjaan_ibu', 'pendidikan_ibu');
		foreach ($sessionNames as $sessionName) {
		    if (isset($_SESSION[$sessionName])) {
		        unset($_SESSION[$sessionName]);
		    }
		}
        header("Location: ../s_register.php");
	    exit();
	} elseif(isset($_POST['sendsubmit'])) {
		$sessionNames = array('nama_lengkap', 'nama_p', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat','anak_ke', 'jumlah_saudara', 'status_d_keluarga', 'negara', 'nama_l_ayah', 'tempat_l_ayah', 'tanggal_l_ayah', 'agama_ayah', 'alamat_ayah', 'status_dayah', 'negara_ayah','pekerjaan_ayah', 'pendidikan_ayah','nama_l_ibu', 'tempat_l_ibu', 'tanggal_l_ibu', 'agama_ibu', 'alamat_ibu', 'status_dibu', 'negara_ibu','pekerjaan_ibu', 'pendidikan_ibu');
		$isEmpty = false; // Flag untuk menandakan apakah ada session yang kosong
		foreach ($sessionNames as $sessionName) {
		    if (empty($_SESSION[$sessionName])) {
		        $isEmpty = true;
		        break; // Menghentikan loop jika ada session yang kosong
		    }
		}
		
		if ($isEmpty) {
		    $_SESSION['alert_send'] = "<script>swal_send_js()</script>";
		    header("Location: ../s_register.php");
		    exit();
		} else {
		    $query_check = "SELECT COUNT(*) FROM informasi_c_siswa WHERE nama_lengkap = ?";
		    $stmt_check = mysqli_stmt_init($conn);
		    if (mysqli_stmt_prepare($stmt_check, $query_check)) {
		        mysqli_stmt_bind_param($stmt_check, "s", $_SESSION['nama_lengkap']);
		        mysqli_stmt_execute($stmt_check);
		        mysqli_stmt_bind_result($stmt_check, $count);
		        mysqli_stmt_fetch($stmt_check);
		        mysqli_stmt_close($stmt_check);
		
		        if ($count > 0) {
		            $_SESSION['aler_fail'] = "<script>swal_fail_js();</script>";
		            header("Location: ../s_register.php");
		            exit();
		        } else {
		            // Data belum ada dalam tabel, lakukan operasi INSERT
		            $query_siswa = "INSERT INTO informasi_c_siswa (nama_lengkap, nama_panggilan, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, anak_ke, jumlah_saudara, status_d_keluarga, negara) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
		            $stmt_siswa = mysqli_stmt_init($conn);
		            if (mysqli_stmt_prepare($stmt_siswa, $query_siswa)) {
		                mysqli_stmt_bind_param($stmt_siswa, "sssssssssss", $_SESSION['nama_lengkap'], $_SESSION['nama_p'], $_SESSION['tempat_lahir'], $_SESSION['tanggal_lahir'], $_SESSION['jenis_kelamin'], $_SESSION['agama'], $_SESSION['alamat'], $_SESSION['anak_ke'], $_SESSION['jumlah_saudara'], $_SESSION['status_d_keluarga'], $_SESSION['negara']);
		                mysqli_stmt_execute($stmt_siswa);
		                mysqli_stmt_close($stmt_siswa);
		            }
		            
		            $query_orangtua = "INSERT INTO informasi_orangtua (nama_lengkap_ayah, tempat_lahir_ayah, tanggal_lahir_ayah, agama_ayah, alamat_ayah, status_dengan_ayah, negara_ayah, pekerjaan_ayah, pendidikan_ayah, nama_lengkap_ibu, tempat_lahir_ibu, tanggal_lahir_ibu, agama_ibu, alamat_ibu, status_dengan_ibu, negara_ibu, pekerjaan_ibu, pendidikan_ibu, id_c_siswa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, LAST_INSERT_ID())";
					$stmt_orangtua = mysqli_stmt_init($conn);
					if (mysqli_stmt_prepare($stmt_orangtua, $query_orangtua)) {
					    mysqli_stmt_bind_param($stmt_orangtua, "ssssssssssssssssss", $_SESSION['nama_l_ayah'], $_SESSION['tempat_l_ayah'], $_SESSION['tanggal_l_ayah'], $_SESSION['agama_ayah'], $_SESSION['alamat_ayah'], $_SESSION['status_dayah'], $_SESSION['negara_ayah'], $_SESSION['pekerjaan_ayah'], $_SESSION['pendidikan_ayah'], $_SESSION['nama_l_ibu'], $_SESSION['tempat_l_ibu'], $_SESSION['tanggal_l_ibu'], $_SESSION['agama_ibu'], $_SESSION['alamat_ibu'], $_SESSION['status_dibu'], $_SESSION['negara_ibu'], $_SESSION['pekerjaan_ibu'], $_SESSION['pendidikan_ibu']);
					    mysqli_stmt_execute($stmt_orangtua);
					    mysqli_stmt_close($stmt_orangtua);
					}
					mysqli_close($conn);
					header("Location: ../s_register.php");
					exit();
				}
		    }
		}
					
		
					
				
    } else {	
	    $nama_l_ayah = $_POST['nama_l_ayah'];
	    $tempat_l_ayah = $_POST['tempat_l_ayah'];
	    $tanggal_l_ayah = $_POST['tanggal_l_ayah'];
	    $agama_ayah = $_POST['agama_ayah'];
	    $alamat_ayah = $_POST['alamat_ayah'];
	    $status_dayah = $_POST['status_dayah'];
	    $negara_ayah = $_POST['negara_ayah'];
	    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
	    $pendidikan_ayah = $_POST['pendidikan_ayah'];
	    $nama_l_ibu = $_POST['nama_l_ibu'];
	    $tempat_l_ibu = $_POST['tempat_l_ibu'];
	    $tanggal_l_ibu = $_POST['tanggal_l_ibu'];
	    $agama_ibu = $_POST['agama_ibu'];
	    $alamat_ibu = $_POST['alamat_ibu'];
	    $status_dibu = $_POST['status_dibu'];
	    $negara_ibu = $_POST['negara_ibu'];
	    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
	    $pendidikan_ibu = $_POST['pendidikan_ibu']; 
	    $nama_layah = filter_var($nama_l_ayah, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $tempat_layah = filter_var($tempat_l_ayah, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $agamayah = filter_var($agama_ayah, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $alamatayah = filter_var($alamat_ayah, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $statusdayah = filter_var($status_dayah, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $negaraayah = filter_var($negara_ayah, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $pekerjaanayah = filter_var($pekerjaan_ayah, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $pendidikanayah = filter_var($pendidikan_ayah, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $namalibu = filter_var($nama_l_ibu, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $tempatlibu = filter_var($tempat_l_ibu, FILTER_SANITIZE_SPECIAL_CHARS);      
	    $agamaibu = filter_var($agama_ibu, FILTER_SANITIZE_SPECIAL_CHARS);
	    $alamatibu = filter_var($alamat_ibu, FILTER_SANITIZE_SPECIAL_CHARS);    
	    $statusdibu = filter_var($status_dibu, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $negaraibu = filter_var($negara_ibu, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $pekerjaanibu = filter_var($pekerjaan_ibu, FILTER_SANITIZE_SPECIAL_CHARS); 
	    $pendidikanibu = filter_var($pendidikan_ibu, FILTER_SANITIZE_SPECIAL_CHARS);   
	    $_SESSION['nama_l_ayah'] = $nama_layah;
	    $_SESSION['tempat_l_ayah'] = $tempat_layah;
	    $_SESSION['tanggal_l_ayah'] = $tanggal_l_ayah;
	    $_SESSION['agama_ayah'] = $agamayah;
	    $_SESSION['alamat_ayah'] = $alamatayah;
	    $_SESSION['status_dayah'] = $statusdayah;
	    $_SESSION['negara_ayah'] = $negaraayah;
	    $_SESSION['pekerjaan_ayah'] = $pekerjaanayah;
	    $_SESSION['pendidikan_ayah'] = $pendidikanayah;
	    $_SESSION['nama_l_ibu'] = $namalibu;
	    $_SESSION['tempat_l_ibu'] = $tempatlibu;
	    $_SESSION['tanggal_l_ibu'] = $tanggal_l_ibu;
	    $_SESSION['agama_ibu'] = $agamaibu;
	    $_SESSION['alamat_ibu'] = $alamatibu;
	    $_SESSION['status_dibu'] = $statusdibu;
	    $_SESSION['negara_ibu'] = $negaraibu;
	    $_SESSION['pekerjaan_ibu'] = $pekerjaanibu;
	    $_SESSION['pendidikan_ibu'] = $pendidikanibu;
	    header("Location: ../s_register.php");
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