<?php 
session_start();


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
</head>
  <style>
    
    .form-control {
      width: 200px;
      border: 1px solid #ced4da;
      
    }

    
    .col.mb-3 {
      margin-bottom: 5px; 
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
<body>

<?php $i = 1 ;?>
<table class="table table-bordered">

  <thead class="table-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">NIS</th>
      <th scope="col">Rayon</th>
    </tr>
  </thead>

  <tbody>
    <?php if($_SESSION["dataSiswa"] == null):?>
      <div style="text-align: center;" class="alert alert-danger" role="alert">Tidak ada data</div>
      <button type="button" onclick="printPage()">print</button>
    <?php else :?>

    <?php foreach($_SESSION["dataSiswa"] as $key => $data) :?>
      <tr>
        <th scope="row"><?= $i++ ;?></th>
        <td><?= $data["nama"];?></td>
        <td><?= $data["nis"];?></td>
        <td><?= $data["rayon"];?></td>
      </tr>
    <?php endforeach ;?>
  
  </tbody>
</table>

<?php endif ;?>

<a id="btn"  class="btn btn-success mt-2" href="print.php"><i class="bi bi-printer"> Print</i></a>

<script>
  document.getElementById('btn').addEventListener('click', function(){
    window.print();
  })    
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-SYyqXdpJnFDTLPQ4d+aCXOwkgxEV9vmV1Evr3fNfNEW0c8jweW0CKfdvuqQtkUfY" crossorigin="anonymous"></script>
</body>
</html> 