<!DOCTYPE html>
<html>
<head>
	<title>M Noval Nur Auliya - 191011401333</title>
</head>
<body>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA</h3>
 
	<?php
		include '../../config/koneksi.php';
		$id = $_GET['id'];
		$data = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE id='$id'");
		while($d = mysqli_fetch_array($data))
		{
	?>
		<form method="post" action="edit_aksi.php" enctype="multipart/form-data">
			<table>
				<tr>			
					<td>Nama</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="text" name="nama" value="<?php echo $d['nama']; ?>">
					</td>
				</tr>
				<tr>
					<td>NIM</td>
					<td><input type="number" name="nim" value="<?php echo $d['nim']; ?>"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><input type="text" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
				</tr>
				<tr>
					<td>Foto</td>
					<td>
						<img src="../../assets/gambar/<?php echo $d['foto']; ?>" style="height: 100px;"><br>
						<input type="file" name="foto" />
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="UPDATE"></td>
				</tr>		
			</table>
		</form>
	<?php } ?>
</body>
</html>