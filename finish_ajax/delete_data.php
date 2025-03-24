<?php
header("Content-Type: application/json");// mendefiniskan jika halaman ini adalah json
include "config.php";


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $Id = $_POST['Id'] ?? NULL;


    // jika id kosong
    if(empty($Id)){
        echo json_encode(["error" => "Data tidak boleh kosong"]);
    }else{
    $stmt = $conn->prepare("DELETE FROM barang_ajax WHERE Id = ?");
    $stmt->bind_param("i", $Id);
    

    if($stmt->execute()){
        echo json_encode(["success" => "Data berhasil di hapus"]);
    }else {
        echo json_encode(["error" => "Data gagal di hapus"]);
    }



    }

}else {
    echo json_encode(["error" => "Data gagal ditemukan"]);
}



?>