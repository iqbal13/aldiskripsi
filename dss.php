<?php
	include 'config/koneksi.php';

	$jumlah_permintaan = @$_POST['jumlah'];
  $id_kelurahan = $_POST['id_kelurahan'];
$qqq = "SELECT * FROM data_lahan left join master_kondisitanah ON data_lahan.kondisi_tanah =master_kondisitanah.id LEFT JOIN master_kondisijalan ON data_lahan.kondisi_jalan = master_kondisijalan.id_kondisi LEFT JOIN master_kelurahan ON data_lahan.kelurahan = master_kelurahan.id_kelurahan WHERE data_lahan.kelurahan = '$id_kelurahan'";
	$query = mysqli_query($conn,$qqq);
	$p1 = array();
	$p2 = array();
	$p3 = array();
	$p4 = array();
	$p5 = array();
	$p6 = array();
	$ptotal = array();

	$gett = mysqli_query($conn,"SELECT  * FROM v_max");
    $count = mysqli_num_rows($query);
      if($jumlah_permintaan > $count){
        echo "<h3 class='text-danger'> Maaf, Permintaan yang diminta melebihi data yang anda </h3>";
        exit;
      }

	$r = mysqli_fetch_array($gett);

  $maksimal = array();
  $kodelahan = array();
    $pos = 0;
	while($run = mysqli_fetch_array($query)){
		$p1 = ($run['luas_lahan']  / $r['maksimal_luas']) * 0.223;
		$p2 = ($run['nilai']  / $r['maksimal_nilai']) * 0.178;
		$p3 = ($run['nilai_jalan']  / $r['maksimal_nilaijalan']) * 0.169;
		$nilai  = 0;
    if($run['jarak_lahan_terhadap_pemukiman'] > 50 AND $run['jarak_lahan_terhadap_pemukiman'] <= 100){
        $nilai = 1;
                  }else if($run['jarak_lahan_terhadap_pemukiman'] < 50){
                    $nilai = 0;
                  }else if($run['jarak_lahan_terhadap_pemukiman'] > 100){
                    $nilai = 0.5;
                  }
                  		$p4 = ($nilai / 1) * 0.155;
                  if($run['jarak_lahan_terhadap_jalanraya'] > 50 AND $run['jarak_lahan_terhadap_jalanraya'] <= 100){
                    $nilai2 = 1;
                  }else if($run['jarak_lahan_terhadap_jalanraya'] < 50){
                    $nilai2 = 0;
                  }else if($run['jarak_lahan_terhadap_jalanraya'] > 100){
                    $nilai2 = 0.5;
                  }
                
                $p5 = ($nilai2 / 1) * 0.165;
                $p6 = ($run['jarak_lahan_terhadap_sungai'] / $r['mak_sungai']) * 0.117;

                $ptotal = $p1 + $p2 + $p3 + $p4 + $p5 + $p6;
                  $kodelahan['kode_lahan'][$pos] = $run['kode_lahan'];
                  $kodelahan['namalahan'][$pos] = $run['nama_lahan'];
                  $maksimal['nilai'][$pos] = $ptotal;

                  $pos = $pos + 1;
	}
// echo "<pre>";
// print_r($maksimal['nilai']);

// echo "<hr />";
// print_r($kodelahan['kode_lahan']);


$hasil = array();
$jumlah = count($maksimal['nilai']);
for($i=0;$i<=$jumlah-1;$i++){
for($j=0;$j<=($jumlah-($i+1));$j++){
if($maksimal['nilai'][$j] > @$maksimal['nilai'][$j+1]){
$k = $maksimal['nilai'][$j];
$maksimal['nilai'][$j] = @$maksimal['nilai'][$j+1];
$maksimal['nilai'][$j+1] = $k;
$yy = $kodelahan['kode_lahan'][$j];
$kodelahan['kode_lahan'][$j] = @$kodelahan['kode_lahan'][$j+1];
$kodelahan['kode_lahan'][$j+1] = $yy;


$zz = $kodelahan['namalahan'][$j];
$kodelahan['namalahan'][$j] = @$kodelahan['namalahan'][$j+1];
$kodelahan['namalahan'][$j+1] = $zz;
}
}
$hasil['kode_lahan'][$i] = $yy;
$hasil['nilai'][$i] = $k;
$hasil['namalahan'][$i] = $zz;
}
echo "<h3> Hasil Perhitungan DSS </h3>";
echo "<table class='table table-striped'>";
echo "<tr>";
echo "<th> No </th>";
echo "<th> Kode Lahan </th>";
echo "<th> Nama Lahan </th>";
echo "<th> Nilai </th>";
echo "<tr>";
$l = 1;
$unikpercobaan = strtotime(date('Y-m-d H:i:s'));
for($awal = 0 ;$awal < $jumlah_permintaan; $awal++){
  echo "<tr>";
  $kode_lahan = $hasil['kode_lahan'][$awal];
  $nama_lahan = $hasil['namalahan'][$awal];
  $nilai_akhir = $hasil['nilai'][$awal];
  echo "<td>".$l."</td>";
  $l = $l + 1;
  echo "<td>".$kode_lahan."</td>";
  echo "<td>".$nama_lahan."</td>";
  echo "<td>".$nilai_akhir."</td>";
  echo "</tr>";
$dt = "DELETE FROM hasil_dss WHERE kode_lahan = '$kode_lahan' AND status = 0";
$qq  = mysqli_query($conn,$dt);

$qq2 = mysqli_query($conn,"INSERT INTO hasil_dss(kode_lahan,nilai,unikpercobaan) VALUES ('$kode_lahan','$nilai_akhir','$unikpercobaan')");
}
echo "</table>";
echo "<a href='".$url_admin."proses.php?module=validasi&unikpercobaan=".$unikpercobaan."' class='btn btn-success'> Validasi Data </a>";


	?>