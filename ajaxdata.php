<?php 

	include 'config/koneksi.php';

	$module = $_GET['module'];

	if($module == 'pilihkecamatan'){
		$id_kota = $_POST['id_kota'];
		$query = "SELECT * FROM master_kecamatan WHERE id_kota = '$id_kota'";
		$run = mysqli_query($conn,$query);
		echo "<h3> Pilih Kecamatan </h3>";
		echo "<select class='form-control' name='kecamatan' onchange='pilihkelurahan(this.value)'>";

		echo "<option>Pilih Kecamatan</option>";
		while($kec = mysqli_fetch_array($run)){ ?>
			<option value="<?php echo $kec['nama_kecamatan'] ?>">
					<?php echo $kec['nama_kecamatan'] ?>
			</option>
			<?php 
		}
		echo '</select>';

	}else if($module == 'pilihkelurahan'){
		

			$id_kecamatan = $_POST['id_kecamatan'];
		$query = "SELECT * FROM master_kelurahan WHERE nama_kecamatan = '$id_kecamatan'";
	///	echo $query;

		$run = mysqli_query($conn,$query);
		echo "<h3> Pilih Kelurahan </h3>";
		echo "<select class='form-control' name='kelurahan' id='kelurahan' onchange='pilihdata(this.value)'>";
		echo "<option>Pilih Kelurahan</option>";
		while($kec = mysqli_fetch_array($run)){ ?>
			<option value="<?php echo $kec['id_kelurahan'] ?>">
					<?php echo $kec['nama_kelurahan'] ?>
			</option>
			<?php 
		}
		echo '</select>';



	}


	?>