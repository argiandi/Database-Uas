<?php 

include "../config/koneksi.php";

$id = @$_POST['id'];
$jadwal_sholat = @$_POST['jadwal_sholat'];
$Waktu_masuk = @$_POST['waktu_masuk'];
$waktu_habis = @$_POST['waktu_habis'];

$data = [];

$query = mysqli_query($conn, "UPDATE `tampilan` 
SET `jadwal_sholat`='".$jadwal_sholat."',`waktu_masuk`='".$Waktu_masuk."',`waktu_habis`='".$waktu_habis.
"' WHERE `id`='".$id."'");

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
