
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Data Penjualan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- css bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="content">
  <header>
    <div class="nav-bar">
      <a href="" class="logo">HanHans Store</a>
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

    <div class="container">
      <div align="center">
      </div>
      <!--Panel Form pencarian -->
      <div class="row">
        <div class="col-md-5">
          <div class="panel panel-default">
            <div class="panel-heading"><b>Pencarian</b></div>
            <div class="panel-body">
              <form class="form-inline">
                <div class="form-group">
                  <select class="form-control" id="Kolom" name="Kolom" required="">
                    <?php
                    $kolom = (isset($_GET['Kolom'])) ? $_GET['Kolom'] : "";
                    ?>
                    <option value="Id_pembeli" <?php if ($kolom == "Id_pembeli") echo "selected"; ?>>ID_pembeli</option>
                    <option value="nama" <?php if ($kolom == "nama") echo "selected"; ?>>Nama</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="KataKunci" name="KataKunci" placeholder="Kata kunci.." required="" value="<?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
                <a href="read.php" class="btn btn-danger">Reset</a>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Tabel data -->
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>ID Pembeli</th>
            <th>Nama</th>
            <th>HP</th>
            <th>Tgl_Transaksi</th>
            <th>Nama_Barang</th>
            <th>Harga</th>
            <th>Total_Bayar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include "config.php";
        
          $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

          $kolomCari = (isset($_GET['Kolom'])) ? $_GET['Kolom'] : "";

          $kolomKataKunci = (isset($_GET['KataKunci'])) ? $_GET['KataKunci'] : "";

          // Jumlah data per halaman
          $limit = 5;

          $limitStart = ($page - 1) * $limit;
     
          //kondisi jika parameter pencarian kosong
          if ($kolomCari == "" && $kolomKataKunci == "") {
            $SqlQuery = mysqli_query($link, "SELECT Id_pembeli,nama,HP,Tgl_Transaksi,Nama_Barang,Harga,Jumlah, (Jumlah*Harga) AS Total_bayar FROM latif LIMIT " . $limitStart . "," . $limit);
          } else {
            //kondisi jika parameter kolom pencarian diisi
            $SqlQuery = mysqli_query($link, "SELECT Id_pembeli,nama,HP,Tgl_Transaksi,Nama_Barang,Harga,Jumlah, (Jumlah*Harga) AS Total_bayar FROM latif WHERE $kolomCari LIKE '%$kolomKataKunci%' LIMIT " . $limitStart . "," . $limit);
          }

          $no = $limitStart + 1;

          while ($row = mysqli_fetch_array($SqlQuery)) {
          ?>
            <tr>
            <td><?php echo $row['Id_pembeli']; ?></td>
              <td><?php echo $row['nama']; ?></td>
              <td><?php echo $row['HP']; ?></td>
              <td><?php echo $row['Tgl_Transaksi']; ?></td>
              <td><?php echo $row['Nama_Barang']; ?></td>
              <td><?php echo $row['Harga']; ?></td>
              <td><?php echo $row['Total_bayar']; ?></td>
              <td><?php echo "<a href='read_detail.php?Id_pembeli=". $row['Id_pembeli'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <div align="right">
        <ul class="pagination">
          <?php
          // Jika page = 1, maka LinkPrev disable
          if ($page == 1) {
          ?>
            <!-- link Previous Page disable -->
            <li class="disabled"><a href="#">Previous</a></li>
            <?php
          } else {
            $LinkPrev = ($page > 1) ? $page - 1 : 1;

            if ($kolomCari == "" && $kolomKataKunci == "") {
            ?>
              <li><a href="read.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
            <?php
            } else {
            ?>
              <li><a href="read.php?Kolom=<?php echo $kolomCari; ?>&KataKunci=<?php echo $kolomKataKunci; ?>&page=<?php echo $LinkPrev; ?>">Previous</a></li>
          <?php
            }
          }
          ?>

          <?php
          //kondisi jika parameter pencarian kosong
          if ($kolomCari == "" && $kolomKataKunci == "") {
            $SqlQuery = mysqli_query($link, "SELECT Id_pembeli,nama,HP,Tgl_Transaksi,Nama_Barang,Harga,Jumlah, (Jumlah*Harga) AS Total_bayar FROM latif");
          } else {
            //kondisi jika parameter kolom pencarian diisi
            $SqlQuery = mysqli_query($link, "SELECT Id_pembeli,nama,HP,Tgl_Transaksi,Nama_Barang,Harga,Jumlah, (Jumlah*Harga) AS Total_bayar FROM latif WHERE $kolomCari LIKE '%$kolomKataKunci%'");
          }

          $JumlahData = mysqli_num_rows($SqlQuery);

          // Hitung jumlah halaman yang tersedia
          $jumlahPage = ceil($JumlahData / $limit);

          // Jumlah link number 
          $jumlahNumber = 1;

          // Untuk awal link number
          $startNumber = ($page > $jumlahNumber) ? $page - $jumlahNumber : 1;

          // Untuk akhir link number
          $endNumber = ($page < ($jumlahPage - $jumlahNumber)) ? $page + $jumlahNumber : $jumlahPage;

          for ($i = $startNumber; $i <= $endNumber; $i++) {
            $linkActive = ($page == $i) ? ' class="active"' : '';

            if ($kolomCari == "" && $kolomKataKunci == "") {
          ?>
              <li<?php echo $linkActive; ?>><a href="read.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

              <?php
            } else {
              ?>
                <li<?php echo $linkActive; ?>><a href="read.php?Kolom=<?php echo $kolomCari; ?>&KataKunci=<?php echo $kolomKataKunci; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php
            }
          }
              ?>

              <!-- link Next Page -->
              <?php
              if ($page == $jumlahPage) {
              ?>
                <li class="disabled"><a href="#">Next</a></li>
                <?php
              } else {
                $linkNext = ($page < $jumlahPage) ? $page + 1 : $jumlahPage;
                if ($kolomCari == "" && $kolomKataKunci == "") {
                ?>
                  <li><a href="read.php?page=<?php echo $linkNext; ?>">Next</a></li>
                <?php
                } else {
                ?>
                  <li><a href="read.php?Kolom=<?php echo $kolomCari; ?>&KataKunci=<?php echo $kolomKataKunci; ?>&page=<?php echo $linkNext; ?>">Next</a></li>
              <?php
                }
              }
              ?>
        </ul>
      </div>
    </div>

</body>

</html>