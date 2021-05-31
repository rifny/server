<!DOCTYPE html>
<html>
<head>
	<title>DATA INPUTAN</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<table class="table table-striped">
			<tr>
				<th>Nama</th>
				<th>Email</th>
				<th>Nomer HP</th>
				<th>Tanggal</th>
				<th>Waktu</th>
				<th>Pesanan</th>
			</tr>
			<?php
			include 'koneksi.php';
			$sql = "select * from daftarpesanan";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				while ($row = mysqli_fetch_row($result)) {
					$name= $row['nama'];
					$email= $row['email'];
					$hp= $row['no_hp'];
					$date= $row['cdate'];
					$time= $row['ctime'];				
					$req= $row['req'];				
					?>
					<tr>
					<td><?php echo $name ?></td>
					<td><?php echo $email ?></td>
					<td><?php echo $hp ?></td>
					<td><?php echo $date ?></td>
					<td><?php echo $time ?></td>
					<td><?php echo $req ?></td>
					</tr> <?php
				}
				mysqli_free_result($result);
			?>

		</table>
		<a href="index.html">Kembali</a>
		<?php
		}
			?>
	</div>
</body>
</html>