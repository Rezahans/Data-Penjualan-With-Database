<?php
//inisialisasi session
session_start();
//mengecek username pada session
if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HanHans Store</title>
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
          <a href="grafik_pie.php"><i class="uil uil-create"></i> Pie</a>
          <a href="grafik_bulan.php"><i class="uil uil-create"></i> Bulan</a>
          <a href="grafik.php"><i class="uil uil-create"></i> Grafik</a> 
          <a href="logout.php"><i class="uil uil-create"></i> Logout</a>     
         
        </div>
      </div>
      <i class="uil uil-apps nav-menu-btn"></i>
    </div>
    <div class="scroll-indicator-container">
      <div class="scroll-indicator-bar"></div>
    </div>
  </header>
  <section class="home">
   
   <center><h1>WELCOME</h1></center> 

  </section>



</body>
</html>
      
</html>
      