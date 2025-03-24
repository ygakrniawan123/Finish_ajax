<?php
header("Content-Type: application/json");
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Id = $_POST['EditId'] ?? NULL;
    $Nama = $_POST['EditNama'] ?? NULL;
    $Stok = $_POST['EditStok'] ?? NULL;

    if (empty($Id) || empty($Nama) || empty($Stok)) {
        echo json_encode(["error" => "Data tidak boleh kosong"]);
    } else {
        $stmt = $conn->prepare("UPDATE barang_ajax SET Nama = ?, Stok = ? WHERE Id = ?");
        $stmt->bind_param("ssi", $Nama, $Stok, $Id);

        if ($stmt->execute()) {
            echo json_encode(["success" => "Data berhasil diperbarui"]);
        } else {
            echo json_encode(["error" => "Gagal memperbarui data"]);
        }
    }
} else {
    echo json_encode(["error" => "Permintaan tidak valid"]);
}
?>
