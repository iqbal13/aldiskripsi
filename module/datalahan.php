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

              <a class="btn btn-primary" href="<?php echo $url_admin ?>index.php?module=tambahlahan">
              Tambah Data
              </a>
            </div>

        <form method="POST" action="<?php echo $url_admin ?>proses.php?module=tambahlahan" enctype="multipart/form-data">
            <div class="box-body">
              <table class="table table-striped" id="data-table">
                  <thead>
                    <tr>
                      <th> No </th>
                      <th> Nama Lahan </th>
                      <th> Luas Lahan </th>
                      <th> Alamat </th>
                      <th> Kondisi Tanah </th>
                      <th> Kondisi Jalan </th>
                      <th> Jarak Lahan Terhadap Pemukiman </th>
                      <th> Jarak Lahan Terhadap Jalan Raya  </th>
                      <th> Jarak Lahan Terhadap Jalan Sungai  </th>
                      <th> Kelurahan  </th>

                      <th> Aksi </th>
                    </tr>
                  </thead>
                  <tbody>
                       <?php 
                       $no = 1;
              $gallery = mysqli_query($conn,"SELECT * FROM data_lahan left join master_kondisitanah ON data_lahan.kondisi_tanah =master_kondisitanah.id LEFT JOIN master_kondisijalan ON data_lahan.kondisi_jalan = master_kondisijalan.id_kondisi LEFT JOIN master_kelurahan ON data_lahan.kelurahan = master_kelurahan.id_kelurahan");
              while($run = mysqli_fetch_array($gallery)){ ?>
                <tr>
                  <td> <?php echo $no ?> </td>
                  <td> <?php echo $run['nama_lahan'] ?> </td>
                  <td> <?php echo $run['luas_lahan'] ?> </td>
                  <td> <?php echo $run['alamat'] ?> </td>
                  <td> <?php echo $run['kondisitanah'] ?> </td>
                  <td> <?php echo $run['kondisijalan'] ?> </td>
                  <td> <?php echo $run['jarak_lahan_terhadap_pemukiman'] ?> </td>
                  <td> <?php echo $run['jarak_lahan_terhadap_jalanraya'] ?> </td>
                  <td> <?php echo $run['jarak_lahan_terhadap_sungai'] ?> </td>
                  <td> <?php echo $run['nama_kelurahan'] ?> </td>
                  <td> 
                    <a href='<?php echo $url_admin ?>index.php?module=tambahlahan&aksi=editlahan&id=<?php echo $run['id'] ?>'> Edit </a>
                    <a href='<?php echo $url_admin ?>proses.php?module=hapuslahan&id=<?php echo $run['kode_lahan'] ?>' onclick="return confirm('Hapus berita  ini ? data akan terhapus permanen')"> Hapus </a>
                  </td>
                </tr>

              <?php  $no = $no + 1; } ?>
                  </tbody>

              </table>
           
      


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
<script src="<?php echo $url_admin ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $url_admin ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
  $(function () {
    $('#data-table').DataTable();
  });
</script>