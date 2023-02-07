
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
	<h3>TAMBAH DATA</h3>
	<form method="post" action="tambah_aksi.php" enctype="multipart/form-data">
		<table>
			<tr>
				<td>kategori</td>
				<td>
					<select name="kategori">
						<option disabled selected>Pilih Kategori</option>
						<?php
							include '../../config/koneksi.php';
							$data = mysqli_query($koneksi,"SELECT * FROM kategori");
							while($d = mysqli_fetch_array($data))
							{ ?>
								<option value="<?php echo $d['id']; ?>">
									<?php echo $d['kategori']; ?>
								</option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>			
				<td>Judul</td>
				<td><input type="text" name="judul"></td>
			</tr>
			<tr>
				<td>Isi</td>
				<td><textarea name="isi"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>
		</table>
	</form>
</body>
</html>