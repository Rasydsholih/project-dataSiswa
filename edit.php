<?php 
session_start();
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $kontakTerpilih = null;
    foreach($_SESSION["dataSiswa"] as $key => $data){
        if($key == $id){
            $kontakTerpilih = $data;
            break;
        }
    }

    if($kontakTerpilih == null) {
        header('Location: index.php');
        exit();
    }
}

if(isset($_POST['btn'])) {
    // memperbarui data di dalam session
    foreach ($_SESSION['dataSiswa'] as $key => &$data) {
        if ($id == $key) {
            $data['nama'] = $_POST['nama'];
            $data['nis'] = $_POST['nis'];
            $data["rayon"] = $_POST["rayon"];
            break;
        }
    }
    // kembali ke halaman utama setelah selesai mengedit
    header('Location: index.php');
    exit();
}






?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DataSiswa</title>
  <link rel="icon" type="image/x-icon" href="asset/img/siswa.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Ubah Data</h2>
    <form action="" method="post">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $kontakTerpilih["nama"];?>">
      </div>
      <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="text" class="form-control" id="nis" name="nis" value="<?= $kontakTerpilih["nis"];?>">
      </div>
      <div class="mb-3">
        <label for="rayon" class="form-label">Rayon</label>
        <input type="text" class="form-control" id="rayon" value=" <?= $kontakTerpilih["rayon"];?>" name="rayon">
      </div>
      <button type="submit" class="btn btn-primary" name="btn">Ubah Data</button>
    </form>
  </div>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-SYyqXdpJnFDTLPQ4d+aCXOwkgxEV9vmV1Evr3fNfNEW0c8jweW0CKfdvuqQtkUfY" crossorigin="anonymous"></script>
</body>
</html>
