<?php 
include "../config/koneksi.php";
$jadwal_shalat = @$_POST['jadwal_sholat'];
$Waktu_masuk = @$_POST['waktu_masuk'];
$waktu_habis = @$_POST['waktu_habis'];
$data = [];
$query = mysqli_query($conn, "INSERT INTO `tampilan` (`jadwal_sholat`,`waktu_masuk`,`waktu_habis`) 
VALUES ('".$jadwal_shalat."', '".$Waktu_masuk."', '".$waktu_habis."')" );
if($query){
    $status = true;
    $pesan = "request success";
    $data[] = $query;
} else {
    $status = false;
    $pesan = "request failed";
}
$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $data
];
header("Content-Type: application/json");
echo json_encode($json);
?>
