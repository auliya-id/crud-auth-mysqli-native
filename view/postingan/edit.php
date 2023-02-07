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
		$data = mysqli_query($koneksi,"SELECT * FROM postingan WHERE id='$id'");
		while($d = mysqli_fetch_array($data))
		{
	?>
		<form method="post" action="edit_aksi.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>kategori</td>
					<td>
						<select name="kategori">
							<?php
								$sqlKat = mysqli_query($koneksi,"SELECT * FROM kategori");
								$dataKat = mysqli_fetch_all($sqlKat, MYSQLI_ASSOC);
								foreach($dataKat as $r):
							?>
								<option value="<?php echo $r['id']; ?>" <?= $r['id'] == $d['kategori_id'] ? "selected" : "" ?>>
									<?php echo $r['kategori']; ?>
								</option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>			
					<td>Judul</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="text" name="judul" value="<?php echo $d['judul']; ?>">
					</td>
				</tr>
				<tr>
					<td>Isi</td>
					<td><textarea name="isi"><?php echo $d['isi']; ?></textarea></td>
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