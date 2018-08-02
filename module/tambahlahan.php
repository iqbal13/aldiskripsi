    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lahan</h3>
            </div>
            <?php 
            if(@$_GET['aksi'] == ''){
              $aksi = 'tambahlahan';
            }else{
              $aksi = 'editlahan';
            }
            ?>

                      <form method="POST" action="<?php echo $url_admin ?>proses.php?module=<?php echo $aksi ?>" enctype="multipart/form-data">
            <div class="box-body">


      <?php 
      if($aksi == 'tambahlahan'){ ?>
              <div class="col-md-12">
                   <div class="form-group">
                  <label>Nama Lahan </label>
                  <input type="text" name="nama_lahan" class="form-control">
                </div>

                <div class="form-group">
                  <label>Luas Lahan </label>
                  <input type="text" name="luas_lahan" class="form-control">
                </div>


                <div class="form-group">
                  <label>Alamat </label>
                  <input type="text" name="alamat" class="form-control">
                </div>


     <div class="form-group">
                  <label>Kondisi Tanah </label>
                  <select class="form-control" name="kondisi_tanah">  
                  <?php 
                  $tanah = mysqli_query($conn,"SELECT * FROM master_kondisitanah");
                  while($dt = mysqli_fetch_array($tanah)){  ?>
                    <option value="<?php echo $dt['id'] ?>"> 
                      <?php echo $dt['kondisitanah'] ?>
                    </option>

                  <?php 
                  }
                  ?>
                </select>
                </div>



                    <div class="form-group">
                  <label>Kondisi Jalan </label>
                                    <select class="form-control" name="kondisi_jalan">  

                  <?php 
                  $tanah = mysqli_query($conn,"SELECT * FROM master_kondisijalan");
                  while($dt = mysqli_fetch_array($tanah)){  ?>
                    <option value="<?php echo $dt['id_kondisi'] ?>"> 
                      <?php echo $dt['kondisijalan'] ?>
                    </option>
                  <?php 
                  }
                  ?>
                </select>

                </div>


                   <div class="form-group">
                  <label>Jarak lahan terhadap Pemukiman </label>
                  <input type="text" name="jarak_lahan_terhadap_pemukiman" class="form-control">
                </div>              

           

                   <div class="form-group">
                  <label>Jarak lahan terhadap Jalan Raya </label>
                  <input type="text" name="jarak_lahan_terhadap_jalanraya" class="form-control">
                </div>

                    <div class="form-group">
                  <label>Jarak lahan terhadap Sungai </label>
                  <input type="text" name="jarak_lahan_terhadap_sungai" class="form-control">
                </div> 

                <div class="form-group">
                <label>Kelurahan</label>
                <select class="form-control" name="kelurahan" required="required">
                  <?php 
                  $kelurahan = mysqli_query($conn,"SELECT * FROM master_kelurahan");
                  while($c = mysqli_fetch_array($kelurahan)){ ?>
                    <option value="<?php echo $c['id'] ?>">
                    <?php echo $c['nama_kelurahan'] ?> </option>
                  <?php } ?>
                  </select> 
              </div>

              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              </div>

              </div>

              <?php } else{ 

                $id = $_GET['kode_lahan'];
                $query_gmbr = mysqli_query($conn,"SELECT * FROM data_lahan WHERE kode_lahan = '$id'");
                while($dt = mysqli_fetch_array($query_gmbr)){
                 
                  $kode_lahan = $dt['kode_lahan'];
                  $nama_lahan = $dt['nama_lahan'];
                  $alamat = $dt['alamat'];
                  $kondisi_tanah = $dt['kondisi_tanah'];
                  $kondisi_jalan = $dt['kondisi_jalan'];
                  $jarak_lahan_terhadap_pemukiman = $dt['jarak_lahan_terhadap_pemukiman'];

                  $jarak_lahan_terhadap_sungai = $dt['jarak_lahan_terhadap_sungai'];


                  $jarak_lahan_terhadap_jalanraya = $dt['jarak_lahan_terhadap_jalanraya'];

                }

                ?>
                 <div class="col-md-12">
                   <div class="form-group">
                  <label>Nama Lahan </label>
                  <input type="text" name="judul_berita" class="form-control">
                </div>

                <div class="form-group">
                  <label>Luas Lahan </label>
                  <input type="text" name="judul_berita" class="form-control">
                </div>


                <div class="form-group">
                  <label>Alamat </label>
                  <input type="text" name="alamat" class="form-control">
                </div>


     <div class="form-group">
                  <label>Kondisi Tanah </label>
                  <select class="form-control" name="kondisi_tanah">  
                  <?php 
                  $tanah = mysqli_query($conn,"SELECT * FROM master_kondisitanah");
                  while($dt = mysqli_fetch_array($tanah)){  ?>
                    <option value="<?php echo $dt['id'] ?>"> 
                      <?php echo $dt['kondisitanah'] ?>
                    </option>

                  <?php 
                  }
                  ?>
                </select>
                </div>



                    <div class="form-group">
                  <label>Kondisi Jalan </label>
                                    <select class="form-control" name="kondisi_jalan">  

                  <?php 
                  $tanah = mysqli_query($conn,"SELECT * FROM master_kondisijalan");
                  while($dt = mysqli_fetch_array($tanah)){  ?>
                    <option value="<?php echo $dt['id_kondisi'] ?>"> 
                      <?php echo $dt['kondisijalan'] ?>
                    </option>
                  <?php 
                  }
                  ?>
                </select>

                </div>


                   <div class="form-group">
                  <label>Jarak lahan terhadap Pemukiman </label>
                  <input type="text" name="jarak_lahan_terhadap_pemukiman" class="form-control">
                </div>              

           

                   <div class="form-group">
                  <label>Jarak lahan terhadap Jalan Raya </label>
                  <input type="text" name="jarak_lahan_terhadap_jalanraya" class="form-control">
                </div>

                    <div class="form-group">
                  <label>Jarak lahan terhadap Sungai </label>
                  <input type="text" name="jarak_lahan_terhadap_sungai" class="form-control">
                </div> 

                <div class="form-group">
                <label>Kelurahan</label>
                <select class="form-control" name="kelurahan" required="required">
                  <?php 
                  $kelurahan = mysqli_query($conn,"SELECT * FROM master_kelurahan");
                  while($c = mysqli_fetch_array($kelurahan)){ ?>
                    <option value="<?php echo $c['id'] ?>">
                    <?php echo $c['nama_kelurahan'] ?> </option>
                  <?php } ?>
                  </select> 
              </div>


              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              </div>

              </div>



              <?php } ?>


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