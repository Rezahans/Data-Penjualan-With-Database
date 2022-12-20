<?php
require "config.php";

if($_GET['Id_pembeli'] != null){
    $id = $_GET['Id_pembeli'];
    $script = "SELECT Id_pembeli,nama,alamat,HP,Tgl_Transaksi,Jenis_barang,Nama_Barang,Harga,Jumlah, (Jumlah*Harga) AS Total_bayar FROM latif where Id_pembeli=$id";
    $query = mysqli_query($link,$script);
    $data = mysqli_fetch_array($query);
} else{
    header("location:read.php");
}

if(isset($_POST['hapus'])){
    $script2 = "DELETE FROM latif where Id_pembeli = $id";
    $query2 = mysqli_query($link,$script2);
    if($query2){
        header("location:read.php");
    }
}

    
    
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>

  <header>
    <div class="nav-bar">
      <a href="read.php" class="logo">HanHans Store</a>
      <div class="navigation">
        <div class="nav-items">
          <i class="uil uil-times nav-close-btn"></i>
          <a href="index.php"><i class="uil uil-home"></i> Home</a>
          <a href="read.php"><i class="uil uil-compass"></i> Data Penjualan</a>
          <a href="create.php"><i class="uil uil-create"></i> Create</a>
          <a href="logout.php"><i class="uil uil-create"></i> Logout</a>
        </div>
      </div>
      <i class="uil uil-apps nav-menu-btn"></i>
    </div>
    <div class="scroll-indicator-container">
      <div class="scroll-indicator-bar"></div>
    </div>
  </header>
    <br>
    <table class="table table-striped table-bordered table-hover">
    
                <div class="col-md-3 produk">
                    <div class="page-header">
                        <<h1>View Details</h1>
                    </div>
                    <div class="form-group">
                        <label>Id_pembeli</label>
                        <p class="form-control-static"><?php echo $data["Id_pembeli"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <p class="form-control-static"><?php echo $data["nama"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label> Alamat</label>
                        <p class="form-control-static"><?php echo $data["alamat"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label> HP</label>
                        <p class="form-control-static"><?php echo $data["HP"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label> Tgl_Transaksi</label>
                        <p class="form-control-static"><?php echo $data["Tgl_Transaksi"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Jenis_barang</label>
                        <p class="form-control-static"><?php echo $data["Jenis_barang"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Nama_Barang</label>
                        <p class="form-control-static"><?php echo $data["Nama_Barang"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <p class="form-control-static"><?php echo $data["Jumlah"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <p class="form-control-static"><?php echo $data["Harga"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Total_Bayar</label>
                        <p class="form-control-static"><?php echo $data["Total_bayar"]; ?></p>
                    </div>
                    
                    <div class="box-detail-produk">
                        <form method="post">
                        <a href="update.php?Id_pembeli=<?= $data['Id_pembeli']?>" class="btn btn-warning">Update Data</a>
                        <a href="delete.php?Id_pembeli=<?= $data['Id_pembeli']?>" class="btn btn-warning">Delete Data</a>
                        <a href="read.php" type="submit" class="btn btn-primary" >Kembali</a>
                        </table>      

</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        <html>