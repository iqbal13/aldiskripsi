    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Lahan</h3>

             
            </div>

            <div class="box-body">
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> No </th>
                      <th> Nama Lahan </th>
                      <th> Alamat </th>
                      <th> P1 </th>
                      <th> P2 </th>
                      <th> P3 </th>
                      <th> P4 </th>
                      <th> P5 </th>
                      <th> P6 </th>
                      <th> Kelurahan  </th>
                      </tr>
                  </thead>
                  <tbody>
                       <?php 
                       $no = 1;
                       $id_kelurahan = $_GET['id_kelurahan'];
              $gallery = mysqli_query($conn,"SELECT * FROM data_lahan left join master_kondisitanah ON data_lahan.kondisi_tanah =master_kondisitanah.id LEFT JOIN master_kondisijalan ON data_lahan.kondisi_jalan = master_kondisijalan.id_kondisi LEFT JOIN master_kelurahan ON data_lahan.kelurahan = master_kelurahan.id_kelurahan WHERE data_lahan.kelurahan = '$id_kelurahan'");
              while($run = mysqli_fetch_array($gallery)){ ?>
                <tr>
                  <td> <?php echo $no ?> </td>
                  <td> <?php echo $run['nama_lahan'] ?> </td>
                  <td> <?php echo $run['alamat'] ?> </td>
                  <td> <?php echo $run['luas_lahan'] ?> </td>
                  <td> <?php echo $run['nilai'] ?> </td>
                  <td> <?php echo $run['nilai_jalan'] ?> </td>
                  <td> <?php 
                  if($run['jarak_lahan_terhadap_pemukiman'] > 50 AND $run['jarak_lahan_terhadap_pemukiman'] <= 100){
                    $nilai = 1;
                  }else if($run['jarak_lahan_terhadap_pemukiman'] <= 50){
                    $nilai = 0;
                  }else if($run['jarak_lahan_terhadap_pemukiman'] > 100){
                    $nilai = 0.5;
                  }
                  echo $nilai;
                   ?> </td>
                        <td> <?php 
                  if($run['jarak_lahan_terhadap_jalanraya'] > 50 AND $run['jarak_lahan_terhadap_jalanraya'] <= 100){
                    $nilai = 1;
                  }else if($run['jarak_lahan_terhadap_jalanraya'] < 50){
                    $nilai = 0;
                  }else if($run['jarak_lahan_terhadap_jalanraya'] > 100){
                    $nilai = 0.5;
                  }
                  echo $nilai;
                   ?> </td>


                       <td> <?php echo $run['jarak_lahan_terhadap_sungai']
                   ?> </td>


                  <td> <?php echo $run['nama_kelurahan'] ?> </td>
                 
                </tr>

              <?php  $no = $no + 1; } ?>
                  </tbody>

              </table>
           
      
              <br />

              <div class="col-md-6">
              <form method="POST" action="<?php echo $url_admin ?>dss.php">
              <div class="form-group">
                <label> Masukan Jumlah lahan yang ingin dicari </label>
                <input type="text" name="jumlah" class="form-control" id="jumlah">
              </div>
              <button type="button" class="btn btn-primary" id="btncari">
                Uji DSS
              </button>
            </form>
            </div>
              <div class="col-md-6">
                  <div id="hasildata"></div>
              </div>


            </div>
            <!-- /.box-body -->
                        </form>

          </div>
          <!-- /.box -->

        
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <script>
      $(document).ready(function(){
          $("#btncari").click(function(){
              var nilai = $("#jumlah").val();
// if ($("#jumlah").is(":empty")) {
//     alert('Harap Isi angka terlebih dahulu');
//     return false;
//   }
    
    var id_kelurahan = "<?php echo $_GET['id_kelurahan'] ?>";
    $.ajax({
      type:"POST",
      url:"<?php echo $url_admin ?>dss.php",
      data:"jumlah="+nilai+"&id_kelurahan="+id_kelurahan,
      beforeSend:function(){

      },success:function(dt){
        $("#hasildata").html(dt);
      }
    })

          });
      });
    </script>
    <!-- /.content -->