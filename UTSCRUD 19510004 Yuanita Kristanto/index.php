<?php
error_reporting(0);
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "dbuts_crud";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die (mysqli_error($koneksi));

	//tombol simpan di klik

	if (isset($_POST['bsimpan']))
	{
		//data akan diedit/disimpan

		if($_GET['hal']=="edit")
		{
			$edit = mysqli_query($koneksi, "UPDATE tpenyewa set 
											nomor_kamar = '$_POST[tnomorkamar]',
											nama_lengkap = '$_POST[tnamalengkap]',
											nomor_ponsel = '$_POST[tnomorponsel]',
											asal = '$_POST[tasal]',
											lama_sewa = '$_POST[tlamasewa]',
											WHERE id_penyewa = '$_GET[id]'
											");
		if($edit)
				{
					echo "<script>
							alert('edit Data Suksess!');
							document.location='index.php';
						  </script>";
				}

				else
				{
					echo "<script>
							alert('edit Data Gagal!!');
							document.location='index.php';
						  </script>";
				}

		}

		else

		{
			$simpan = mysqli_query($koneksi, "INSERT INTO tpenyewa (nomor_kamar, nama_lengkap, nomor_ponsel, asal, lama_sewa)
			 							  VALUES ('$_POST[tnomorkamar]', 
			 							  		 '$_POST[tnamalengkap]', 
			 							  		 '$_POST[tnomorponsel]', 
			 							  		 '$_POST[tasal]', 
			 							  		 '$_POST[tlamasewa]')
											");
		if($Simpan)
		{
			
				  echo "<script>
					alert('Simpan Data Gagal!!');
					document.location='index.php';
				  </script>";
		}

		else
		{
			echo "<script>
					alert('Simpan Data Suksess!');
					document.location='index.php';
				  </script>";
		}
	}


		
	}

// jika tombol edit/hapus di klik

	if(isset($_GET['hal']))
	{
		if($_GET['hal'] == "edit")
		{
			//tamoilan yang akan di edit
			$tampil = mysqli_query($koneksi, "SELECT * FROM tpenyewa WHERE id_penyewa = '$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				$vnomorkamar = $data['nomor_kamar'];
				$vnamalengkap = $data['nama_lengkap'];
				$vnomorponsel = $data['nomor_ponsel'];
				$vasal = $data['asal'];
				$vlamasewa = $data['lama_sewa'];

			}
		}
		elseif ($_GET['hal']=="hapus") 
		{
			$hapus = mysqli_query($koneksi,"DELETE FROM tpenyewa WHERE id_penyewa = '$_GET[id]'");
			if ($hapus)
				echo "<script>
					alert('hapus Data suksess!!');
					document.location='index.php';
				  </script>";
		}
		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>DATA PENYEWA KOST</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body style="background-image: url(1.jpg);">
	<div class="container">
	<h1 class="text-center">KOST MELATI</h1>
	<h2 class="text-center">PALING MANTAB</h2>

<!--awal form-->
	<div class="card mt-1"> 
  <div class="card-header bg-primary text-white">
    Form Input Penyewa Kost
  </div>
  <div class="card-body">
    <form method="post" action="">
    	<div class="form-group">
    		<label>Nomor Kamar</label>
    		<select class="form-control" name="tnomorkamar" >
    			<option value="<?=@$vnomorkamar?>"></option>
    			<option value="R001">R001</option>
    			<option value="R002">R002</option>
    			<option value="R003">R003</option>
    			<option value="R004">R004</option>
    			<option value="R005">R005</option>
    			<option value="R006">R006</option>
    			<option value="R007">R007</option>
    			<option value="R008">R008</option>
    			<option value="R009">R009</option>
    			<option value="R010">R010</option>
    		</select>

    	</div>

    	<div class="form-group">
    		<label>Nama Lengkap</label>
    		<input type="text" name="tnamalengkap" value="<?=@$vnamalengkap?>" class="form-control" placeholder="Input Nama Anda Disini!" required>
    	</div>
    	<div class="form-group">
    		<label>Nomor ponsel</label>
    		<input type="text" name="tnomorponsel" value="<?=@$vnomorponsel?>" class="form-control" placeholder="Input Nomor ponsel Anda Disini!" required>
    	</div>
    	<div class="form-group">
    		<label>Asal</label>
    		<textarea class="form-control" name="tasal" placeholder="Input Asal Anda Disini!"><?=@$vasal?></textarea>
    	</div>
    	<div class="form-group">
    		<label>Lama Sewa</label>
    		<select class="form-control" name="tlamasewa">
    			<option value="<?=@$vlamasewa?>"></option>
    			<option value="3 Bulan">3 Bulan</option>
    			<option value="6 Bulan">6 Bulan</option>
    			<option value="9 Bulan">9 Bulan</option>
    			<option value="12 Bulan">12 Bulan</option>
    			<option value="15 Bulan">15 Bulan</option>
    			<option value="18 Bulan">18 Bulan</option>
    			<option value="21 Bulan">21 Bulan</option>
    			<option value="24 Bulan">24 Bulan</option>
    		</select>
    	</div>

    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

    </form>
  </div>
</div>
<!--akhir form-->

<!--awal tabel-->
	<div class="card mt-5"> 
  <div class="card-header bg-success text-white">
    DAFTAR PENYEWA
  </div>
  <div class="card-body">
  	<table class="table table-bordered table-striped" >
  		<tr>
  			<th>NO</th>
  			<th>Nomor Kamar</th>
  			<th>Nama Lengkap</th>
  			<th>Nomor Ponsel</th>
  			<th>Asal</th>
  			<th>Lama Sewa</th>
  			<th>Aksi</th>
  		</tr>

  		<?php
  			$no = 1;
  			$tampil = mysqli_query($koneksi, "SELECT * from tpenyewa order by id_penyewa desc");
  			while($data = mysqli_fetch_array($tampil)):

  		?>

  		<tr>
  			<td><?=$no++?></td>
  			<td><?=$data['nomor_kamar']?></td>
  			<td><?=$data['nama_lengkap']?></td>
  			<td><?=$data['nomor_ponsel']?></td>
  			<td><?=$data['asal']?></td>
  			<td><?=$data['lama_sewa']?></td>
  			<td>
  				<a href="index.php?hal=edit&id=<?=$data['id_penyewa']?>" class="btn btn-warning">Edit</a>
  				<a href="index.php?hal=hapus&id=<?=$data['id_penyewa']?>" onclick="return confirm('Apakah Ingin Menghapus Data ini?'')" class="btn btn-danger">Hapus</a>
  			</td>

  		</tr>
  	<?php endwhile; ?>
  	</table>
    
  </div>
</div>
<!--akhir tabel-->

</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>