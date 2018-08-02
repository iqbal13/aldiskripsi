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
            
              <div class="col-md-6">
                <div class="form-group">
              <h3> Pilih Kota </h3>
              <select class="form-control" name="kota" onchange="pilihkecamatan(this.value)">
              <?php 
              $query = "SELECT * FROM master_kota";
              $run = mysqli_query($conn,$query);
              while($dt = mysqli_fetch_array($run)){ ?>
                <option value="<?php echo $dt['id_kota'] ?>">
                  <?php echo $dt['kota'] ?>
                 </option>
              <?php } ?>
            </select>

            <div id="hasil_kecamatan"> </div>

            <div id="hasil_kelurahan"> </div>

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
    <script>
      function pilihkecamatan(a){

        $.ajax({
          type:"POST",
          url:"<?php echo $url ?>ajaxdata.php?module=pilihkecamatan",
          data:"id_kota="+a,
          success:function(dt){
            $("#hasil_kecamatan").html(dt);
          }
        })

      }

      function pilihkelurahan(a){

         $.ajax({
          type:"POST",
          url:"<?php echo $url ?>ajaxdata.php?module=pilihkelurahan",
          data:"id_kecamatan="+a,
          success:function(dt){
            $("#hasil_kelurahan").html(dt);
          }
        })


      }

      function pilihdata(a){

        window.location.href='<?php echo $url ?>index.php?module=dss&id_kelurahan='+a;

      }

      $(document).ready(function(){
        



      });
    </script>
    <!-- /.content -->