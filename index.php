<?php

session_start();
$error = null;
$button = null;
$print = null;
if(isset($_POST["btn"])){
  $nama = $_POST["nama"];
  $nis = $_POST["nis"];
  $rayon = $_POST["rayon"];
  $dataSudahAda = false;

  //mengecek apakah data nama siswa ada yang sama
  if(isset($_SESSION["dataSiswa"])) {
      foreach ($_SESSION["dataSiswa"] as $data) {
          if ($data["nama"] == $nama) {
              $dataSudahAda = true;
              break;
          }
      }
  }


  if ($dataSudahAda){
      $error = ' <div style="text-align: center;" class="alert alert-danger mt-3" role="alert">
      Nama sudah ada
      </div>';
  } else {
      $_SESSION["dataSiswa"][] = [
          "nama" => $nama,
          "nis" => $nis,
          "rayon" => $rayon
      ];
  }


}

if($_SESSION["dataSiswa"] != null){
  $button = ' <a class="btn btn-danger mt-2" href="hapusAll.php">Hapus</a>';
  $print = ' <a onclick="printPage()"  class="btn btn-success mt-2" href="print.php"><i class="bi bi-printer"> Print</i></a>';
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DataSiswa</title>
  <link rel="icon" type="image/x-icon" href="asset/img/siswa.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    
    .form-control {
      width: 200px;
      border: 1px solid #ced4da;
      
    }

    
    .col.mb-3 {
     
    }

    .input-all {
      display: flex;
      align-items: center;
      justify-content: center;

    }

    .container {
      max-width: 670px;
    }
    


  </style>
</head>
<body>
  <h1 class="text-center">Masukan Data siswa</h1><br>
  <div class="container">
    <div class="input-all">
      <form action="" method="post" class="row mx-auto">
            <div class="col-md-4">
              <input name="nama" type="text" class="form-control" required id="exampleFormControlInput1" placeholder="Masukkan Nama">
            </div>
            <div class="col-md-4">
              <input name="nis" type="text" class="form-control" required id="exampleFormControlInput2" placeholder="Masukkan NIS">
            </div>
            <div class="col-md-4">
              <input name="rayon" type="text" class="form-control" required id="exampleFormControlInput3" placeholder="Masukkan Rayon">
            </div>
        <div class="switch">
          <button name="btn" style="width: 120px;" type="submit" class="btn btn-primary mt-2 ">Tambah</button>
          <?= $button ;?>
          <?= $print ;?>
        </div>
        </div>
      </form>
      <?= $error;?>

    <br>

    <?php $i = 1 ;?>
      <table class="table table-bordered">
        <thead class="table-success">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">NIS</th>
            <th scope="col">Rayon</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>


        <tbody>

          <?php if($_SESSION["dataSiswa"] == null):?>
            <div style="text-align: center;" class="alert alert-danger" role="alert">tidak ada data</div><hr>
          <?php else :?>
            
          <?php foreach($_SESSION["dataSiswa"] as $key => $data) :?>
            <tr>
              <th scope="row"><?= $i++ ;?></th>
              <td><?= $data["nama"];?></td>
              <td><?= $data["nis"];?></td>
              <td><?= $data["rayon"];?></td>
              <td>
                <a class="btn btn-danger" href="hapus.php?id=<?= $key ?>">Hapus</a>
                <a class="btn btn-warning" href="edit.php?id=<?= $key ?>">edit</a>
              </td>
            </tr>
          <?php endforeach ;?>
        
        </tbody>
      </table>
    <?php endif ;?>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-SYyqXdpJnFDTLPQ4d+aCXOwkgxEV9vmV1Evr3fNfNEW0c8jweW0CKfdvuqQtkUfY" crossorigin="anonymous"></script>
</body>
</html>
