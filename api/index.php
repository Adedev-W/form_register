<?php
session_start();
include_once "../db/cc.php";
$getupdated = "SELECT * FROM informasi_c_siswa ORDER BY updated_at DESC LIMIT 1;";
$result_up = mysqli_query($conn, $getupdated);
$getupdated_result = mysqli_fetch_assoc($result_up);

$data_api = array(
    "updated_at" => $getupdated_result["updated_at"],
    "data_student_list" => array()
);
$query = "SELECT a.*, i.*
	      FROM informasi_c_siswa AS a
		  INNER JOIN informasi_orangtua AS i ON a.id = i.id_c_siswa;";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data_api[] = $row;
        // Lakukan sesuatu dengan data yang telah diambil
        // Misalnya, tampilkan data atau simpan dalam variabel
    }
}

mysqli_free_result($result);
mysqli_close($conn);
$jsonData = json_encode($data_api);
echo $jsonData;
?>