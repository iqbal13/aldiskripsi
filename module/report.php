    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Hasil DSS</h3>

             
            </div>
            <div class="box-body">
              
           <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-primary">
    <?php 
    $kota = mysqli_query($conn,"SELECT * FROM master_kota");
    while($run = mysqli_fetch_array($kota)){ ?>

    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo 'kota-'.$run['id_kota'] ?>" aria-expanded="true" aria-controls="collapseOne">

          <?php echo $run['kota'] ?>
        </a>
      </h4>
    </div>
    <div id="<?php echo 'kota-'.$run['id_kota'] ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="<?php echo 'kota-'.$run['id_kota'] ?>">
      <div class="panel-body">

        <h3> Data Hasil Optimasi  </h3>

        <table class="table table-striped">
            <tr>
              <th> No </th>
              <th> Nama Lahan </th>
              <th> Nilai </th>
              <th> Kelurahan </th>
              <th> Kecamatan </th>
            </tr>
            <?php 
            $no = 1;
            $query2 = "SELECT * FROM hasil_dss a LEFT JOIN  data_lahan b ON a.kode_lahan = b.kode_lahan LEFT JOIN master_kelurahan c ON b.kelurahan = c.id_kelurahan left join master_kecamatan d ON c.nama_kecamatan = d.nama_kecamatan 
            WHERE a.status = 1 AND d.id_kota = '$run[id_kota]' ORDER BY d.id_kecamatan ";
            $query2 = mysqli_query($conn,$query2);
            $cek  =mysqli_num_rows($query2);
            if($cek == 0){
              echo "<tr><td colspan='5'> Maaf Belum ada Data </td> </tr>";
            }else{

            while($data2 = mysqli_fetch_array($query2)){ ?>
              <tr>
                <td> <?php echo $no++ ?> </td>
                <td> <?php echo $data2['nama_lahan'] ?> </td>
                <td> <?php echo $data2['nilai'] ?> </td>
                <td> <?php echo $data2['nama_kelurahan'] ?> </td>
                <td> <?php echo $data2['nama_kecamatan'] ?> </td>
              </tr>

            <?php } } ?>

        </table>

      </div>
    </div>
    <?php  } ?>

  </div>
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
    <!-- /.content -->