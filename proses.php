<?php 

	include 'config/koneksi.php';
	$module = $_GET['module'];


	switch ($module) {
		case 'tambahlahan':
			
                  $nama_lahan = $_POST['nama_lahan'];
                  $alamat = $_POST['alamat'];
                  $kondisi_tanah = $_POST['kondisi_tanah'];
                  $kondisi_jalan = $_POST['kondisi_jalan'];
                  $jarak_lahan_terhadap_pemukiman = $_POST['jarak_lahan_terhadap_pemukiman'];
                  $jarak_lahan_terhadap_sungai = $_POST['jarak_lahan_terhadap_sungai'];
                  $jarak_lahan_terhadap_jalanraya = $_POST['jarak_lahan_terhadap_jalanraya'];
                  $kelurahan = $_POST['kelurahan'];

                  $query = "INSERT INTO data_lahan (nama_lahan,alamat,kondisi_tanah,kondisi_jalan,jarak_lahan_terhadap_pemukiman,jarak_lahan_terhadap_sungai,jarak_lahan_terhadap_jalanraya,kelurahan) VALUES ('$nama_lahan','$alamat','$kondisi_tanah','$kondisi_jalan','$jarak_lahan_terhadap_pemukiman','$jarak_lahan_terhadap_sungai','$jarak_lahan_terhadap_jalanraya','$kelurahan')";
                  $run = mysqli_query($conn,$query);
                  if($run){
                  	echo "<script>alert('Data berhasil masuk')</script>";
                  	echo "<script>window.location.href='index.php?module=datalahan'</script>";
                  }else{
                  	echo "ada yang error";
                  }






			break;
		case "validasi" : 

            $unikpercobaan = $_GET['unikpercobaan'];

            $query = "UPDATE hasil_dss SET status = 1 WHERE unikpercobaan = '$unikpercobaan'";
            $run = mysqli_query($conn,$query);
            if($run){
                  echo "<script>alert('Data Berhasil Divalidasi')</script>";
                  echo "<script>window.location.href='index.php?module=report'</script>";
            }else{
                  echo "Gagal";
            }



            break;
		default:
			# code...
			break;
	}