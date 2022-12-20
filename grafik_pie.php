<?php
include('config.php');
$produk = mysqli_query($link,"select * from latif");
while($row = mysqli_fetch_array($produk)){
	$nama_produk[] = $row['Nama_Barang'];
	
	$query = mysqli_query($link,"select sum(jumlah) as jumlah from latif where Id_pembeli='".$row['Id_pembeli']."'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['jumlah'];
}
?>
<!doctype html>
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
	<div id="canvas-holder" style="width:50%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_produk); ?>,
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
					label: 'Presentase Penjualan Barang'
				}],
				labels: <?php echo json_encode($nama_produk); ?>},
			options: {
				responsive: true
			}
		};
 
		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};
 
		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});
 
			window.myPie.update();
		});
 
		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};
 
			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
 
				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}
 
			config.data.datasets.push(newDataset);
			window.myPie.update();
		});
 
		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>
 
</html>