<?php
include('config.php');
$produk = mysqli_query($link,"select * from latif");
while($row = mysqli_fetch_array($produk)){
	$nama_produk[] = $row['Nama_Barang'];
	
	$query = mysqli_query($link,"select sum(jumlah) as jumlah from latif  where Id_pembeli='".$row['Id_pembeli']."'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['jumlah'];
}
?>
<!DOCTYPE html>
<html>
<header>
    <div class="nav-bar">
      <a href="read.php" class="logo">HanHans Store</a>
      <div class="navigation">
        <div class="nav-items">
        <script type="text/javascript" src="Chart.js"></script>
          <i class="uil uil-times nav-close-btn"></i>
          <a href="index.php"><i class="uil uil-home"></i> Home</a>
          <a href="grafik_pie.php"><i class="uil uil-create"></i> Pie</a>
          <a href="grafik_bulan.php"><i class="uil uil-create"></i> Bulan</a>
          <a href="grafik.php"><i class="uil uil-create"></i> Grafik</a>
		  <a href="logout.php"><i class="uil uil-create"></i> Logout</a>    
          <link rel="stylesheet" href="style.css">
         
        </div>
      </div>
      <i class="uil uil-apps nav-menu-btn"></i>
    </div>
    <div class="scroll-indicator-container">
      <div class="scroll-indicator-bar"></div>
    </div>
  </header>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
       
	</div>
    

 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_produk); ?>,
				datasets: [{
					label: 'Grafik Penjualan',
					data: <?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>