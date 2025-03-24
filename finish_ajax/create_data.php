<?php
header("Content-Type: application/json");// mendefiniskan jika halaman ini adalah json
// kobeksi ke databse
include "config.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $Nama = $_POST['Nama'] ?? '';
    $Stok = $_POST['Stok'] ?? '';
    



    // jika data kosong maka akan melakukab vaidasi tsb
    if(trim($Nama) === "" || trim($Stok) === ""){
        echo json_encode(["error" => "Data tidak boleh kosong"]);
        exit;
    }else {
        $stmt = $conn->prepare("INSERT INTO barang_ajax(Nama,Stok) VALUES(?,?)");
        $stmt->bind_param("si", $Nama, $Stok);


        // jika berhasil menambhakan data maka akan menjalankan validaso tsb
        if($stmt->execute()){
            echo json_encode(["success" => "Data berhasil di tambahkan"]);
        }else{
            echo json_encode(["error" => "Data gagal di tambahkan"]);
        }
    }
}else{
    echo json_encode(["error" => "Data tidak di temukan"]);
}


?>