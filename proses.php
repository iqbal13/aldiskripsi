<?php 

	include 'config/koneksi.php';
	$module = $_GET['module'];


	switch ($module) {
		case 'tambahlahan':
			
                  $nama_lahan = $_POST['nama_lahan'];
                  $alamat = $_POST['alamat'];
                  $kondisi_tanah = $_POST['kondisi_tanah'];
                  $luas_lahan = $_POST['luas_lahan'];
                  $kondisi_jalan = $_POST['kondisi_jalan'];
                  $jarak_lahan_terhadap_pemukiman = $_POST['jarak_lahan_terhadap_pemukiman'];
                  $jarak_lahan_terhadap_sungai = $_POST['jarak_lahan_terhadap_sungai'];
                  $jarak_lahan_terhadap_jalanraya = $_POST['jarak_lahan_terhadap_jalanraya'];
                  $kelurahan = $_POST['kelurahan'];

                  $query = "INSERT INTO data_lahan (nama_lahan,luas_lahan,alamat,kondisi_tanah,kondisi_jalan,jarak_lahan_terhadap_pemukiman,jarak_lahan_terhadap_sungai,jarak_lahan_terhadap_jalanraya,kelurahan) VALUES ('$nama_lahan','$luas_lahan','$alamat','$kondisi_tanah','$kondisi_jalan','$jarak_lahan_terhadap_pemukiman','$jarak_lahan_terhadap_sungai','$jarak_lahan_terhadap_jalanraya','$kelurahan')";
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
            case "hapuslahan": 


            $kode_lahan = $_GET['id'];
            $query = "DELETE FROM data_lahan WHERE kode_lahan = '$kode_lahan'";
            $run = mysqli_query($conn,$query);
             if($run){
                  echo "<script>alert('Data Berhasil Divalidasi')</script>";
                  echo "<script>window.location.href='index.php?module=report'</script>";
            }else{
                  echo "Gagal";
            }

            break;
      

            case "editlahan":

                  $kode_lahan = $_POST['kode_lahan'];
                  $nama_lahan = $_POST['nama_lahan'];
                  $alamat = $_POST['alamat'];
                  $kondisi_tanah = $_POST['kondisi_tanah'];
                  $luas_lahan = $_POST['luas_lahan'];
                  $kondisi_jalan = $_POST['kondisi_jalan'];
                  $jarak_lahan_terhadap_pemukiman = $_POST['jarak_lahan_terhadap_pemukiman'];
                  $jarak_lahan_terhadap_sungai = $_POST['jarak_lahan_terhadap_sungai'];
                  $jarak_lahan_terhadap_jalanraya = $_POST['jarak_lahan_terhadap_jalanraya'];
                  $kelurahan = $_POST['kelurahan'];

                  $query = "UPDATE data_lahan SET nama_lahan = '$nama_lahan', alamat = '$alamat', kondisi_tanah = '$kondisi_tanah', kondisi_jalan = '$kondisi_jalan', luas_lahan = '$luas_lahan', jarak_lahan_terhadap_pemukiman = '$jarak_lahan_terhadap_pemukiman', jarak_lahan_terhadap_sungai = '$jarak_lahan_terhadap_sungai', jarak_lahan_terhadap_jalanraya = '$jarak_lahan_terhadap_jalanraya', kelurahan = '$kelurahan' WHERE kode_lahan = '$kode_lahan'";
                  $run = mysqli_query($conn,$query);
                  if($run){
                        echo "<script>alert('Data berhasil Dirubah')</script>";
                        echo "<script>window.location.href='index.php?module=datalahan'</script>";
                  }else{
                        echo "ada yang error";
                  }


            break;


		default:
			# code...
			break;
	}