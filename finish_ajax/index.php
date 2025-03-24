<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD AJAX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <h2 class="text-center">CRUD AJAX dengan PHP dan MySQL</h2>
    <table class="table table-striped mt-3">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="DataBarang"></tbody>
    </table>

    <!-- Form Tambah Data -->
    <div class="mt-4">
      <h4>Tambah Data Barang</h4>
      <form id="FormTambah" method="POST">
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" name="Nama" id="Nama" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Stok</label>
          <input type="number" class="form-control" id="Stok" name="Stok">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
    </div>
  </div>

  <!-- Modal Update -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="FormUpdate">
            <input type="hidden" name="EditId" id="EditId">
            <div class="mb-3">
              <label>Nama</label>
              <input type="text" name="EditNama" id="EditNama" class="form-control">
            </div>
            <div class="mb-3">
              <label>Stok</label>
              <input type="number" name="EditStok" id="EditStok" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JS & jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <script>
$(document).ready(function() {
  // Load Data
  function loadData() {
    $.ajax({
      url: "read_data.php",
      type: "GET",
      dataType: "json",
      success: function(result) {
        let html = "";
        $.each(result, function(index, item) {
          html += `<tr>
                      <td>${index + 1}</td>
                      <td>${item.Nama}</td>
                      <td>${item.Stok}</td>
                      <td>
                        <button class="btn btn-danger btn-sm btn-delete" data-id="${item.Id}">Hapus</button>
                        <button class="btn btn-success btn-sm btn-update" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${item.Id}" data-nama="${item.Nama}" data-stok="${item.Stok}">Edit</button>
                      </td>
                   </tr>`;
        });
        $("#DataBarang").html(html);
      }
    });
  }

  loadData();

  // Insert Data
  $("#FormTambah").submit(function(e) {
    e.preventDefault();
    let resultForm = $(this).serialize();
    $.ajax({
      url: "create_data.php",
      type: "POST",
      data: resultForm,
      dataType: "json",
      success: function(resultData) {
        alert(resultData.success || resultData.error);
        $("#FormTambah")[0].reset();
        loadData();
      }
    });
  });

  // Hapus Data
  $(document).on("click", ".btn-delete", function(){
    let Id = $(this).data("id");
    if(confirm("Yakin ingin menghapus data ini?")){
      $.ajax({
        url: "delete_data.php",
        type: "POST",
        dataType: "json",
        data: {Id: Id},
        success: function (deleteData){
          alert(deleteData.success || deleteData.error);
          loadData();
        }
      });
    }
  });

  // Tampilkan Data di Form Edit
  $(document).on("click", ".btn-update", function(){
    let Id = $(this).data("id");
    let nama = $(this).data("nama");
    let stok = $(this).data("stok");

    $("#EditId").val(Id);
    $("#EditNama").val(nama);
    $("#EditStok").val(stok);
  });

  // Update Data
  $("#FormUpdate").submit(function(e){
    e.preventDefault();
    let UpdateForm = $(this).serialize();
    $.ajax({
      url: "update_data.php",
      type: "POST",
      dataType: "json",
      data: UpdateForm,
      success: function(resultUpdate){
        alert(resultUpdate.success || resultUpdate.error);
        $("#exampleModal").modal("hide");
        loadData();
      }
    });
  });
});
  </script>
</body>
</html>
