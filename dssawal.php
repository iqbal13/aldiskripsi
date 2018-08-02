<?php
	include 'config/koneksi.php';

	$jumlah = @$_POST['jumlah'];
$qqq = "SELECT * FROM data_lahan left join master_kondisitanah ON data_lahan.kondisi_tanah =master_kondisitanah.id LEFT JOIN master_kondisijalan ON data_lahan.kondisi_jalan = master_kondisijalan.id_kondisi LEFT JOIN master_kelurahan ON data_lahan.kelurahan = master_kelurahan.id";
	$query = mysqli_query($conn,$qqq);
	$p1 = array();
	$p2 = array();
	$p3 = array();
	$p4 = array();
	$p5 = array();
	$p6 = array();
	$ptotal = array();

	$gett = mysqli_query($conn,"SELECT  * FROM v_max");
	$r = mysqli_fetch_array($gett);

	$nilaimax = 0;

  $data = array(
    'kode_lahan' => array(),
    'nilai' => array());


	while($run = mysqli_fetch_array($query)){
		$p1[$run['kode_lahan']] = ($run['luas_lahan']  / $r['maksimal_luas']) * 0.223;
		$p2[$run['kode_lahan']] = ($run['nilai']  / $r['maksimal_nilai']) * 0.178;
		$p3[$run['kode_lahan']] = ($run['nilai_jalan']  / $r['maksimal_nilaijalan']) * 0.169;
		$nilai  = 0;
              if($run['jarak_lahan_terhadap_pemukiman'] > 50 AND $run['jarak_lahan_terhadap_pemukiman'] <= 100){
                    $nilai = 1;
                  }else if($run['jarak_lahan_terhadap_pemukiman'] < 50){
                    $nilai = 0;
                  }else if($run['jarak_lahan_terhadap_pemukiman'] > 100){
                    $nilai = 0.5;
                  }
                  		$p4[$run['kode_lahan']] = ($nilai / 1) * 0.155;
                  if($run['jarak_lahan_terhadap_jalanraya'] > 50 AND $run['jarak_lahan_terhadap_jalanraya'] <= 100){
                    $nilai2 = 1;
                  }else if($run['jarak_lahan_terhadap_jalanraya'] < 50){
                    $nilai2 = 0;
                  }else if($run['jarak_lahan_terhadap_jalanraya'] > 100){
                    $nilai2 = 0.5;
                  }
                 

                $p5[$run['kode_lahan']] = ($nilai2 / 1) * 0.165;
                $p6[$run['kode_lahan']] = ($run['jarak_lahan_terhadap_sungai'] / $r['mak_sungai']) * 0.117;

           
                $ptotal[$run['kode_lahan']] = $p1[$run['kode_lahan']] + $p2[$run['kode_lahan']] + $p3[$run['kode_lahan']] + $p4[$run['kode_lahan']] + $p5[$run['kode_lahan']] + $p6[$run['kode_lahan']];
                if($nilaimax >=  $ptotal[$run['kode_lahan']]){
                	$nilaimax  = $nilaimax;
                }else{
                	$nilaimax = $ptotal[$run['kode_lahan']];
                }
	}

echo "<pre>";
print_r($ptotal);

arsort($ptotal);
echo "<br />Hasil Sorting Full Factorial <br />";

print_r($ptotal);










	?>