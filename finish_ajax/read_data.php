<?php
header("Content-Type: application/json");// mendefiniskan jika halaman ini adalah json
// koneksi ke database
include "config.php";


// melakukan query untuk mengambil data dari database
$stmt = $conn->prepare("SELECT * FROM barang_ajax");
$stmt->execute();
$resultData = $stmt->get_result();
$dataResult = [];
// melakukan perulangan untuk manampilkan data dari database
while ($row = $resultData->fetch_assoc()){
    $dataResult[] = $row;
}
// mengubah data tsb menjadi json
echo json_encode($dataResult);
?>