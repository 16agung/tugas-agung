
<div class="content-wrapper">
    <div class="container-fluid">

<div class="container-sm">


<form class="container-fluid" method="post"  action="<?= base_url('perhitungan_tebu/simpan_data'); ?>">
 
<!-- Tanggal -->
    <div class="mb-3">
        <label  class="form-label">Masukan Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal">
      </div>
      <div class="col-md-3">
                                <input type="hidden" class="form-control" readonly name="id_riwayat" type="text" placeholder="id_riwayat" value="<?= $kode; ?>" aria-describedby="basic-addon2" />
                            </div>
    <!-- mandor -->
      <div class="mb-3">
        <label  class="form-label">Nama Mandor</label>
        <select name="id_mandor" id="id_mandor" class="form-control">
        <option value="">-Pilih Nama Mandor-</option>
          <?php foreach($mandor as $mdr) : ?>
        <option value="<?= $mdr['id_mandor']; ?>"><?= $mdr['nama_mandor']; ?></option>
        <?php endforeach ?>
        </select>
      </div>


      <div class="mb-3">
        <label  class="form-label">Nama Wilayah</label>
        <select  class="form-control" id="id_kebun" name="id_kebun"  >
<option value="">--Pilih Nama Wilayah--</option>
          <?php foreach($kebun as $kbn) : ?>
        <option value="<?= $kbn['id_kebun']; ?>"> <?= $kbn['kebun']; ?></option>
        <?php endforeach ?>
        </select>
        
      </div>
      <div class="mb-3">
        <label  class="form-label">Nama Plan</label>
        <select  class="form-control" id="plan" name="plan"  >
<option value="">--Pilih Nama Plan--</option>
        </select>
       
      </div>
      <button type="button"  class="btn btn-success" id="add_cart" name="add_cart">
                                  <div class="fas fa-check"></div>
                              </button>
     
                             
                                            <input type="hidden" class="form-control" id="id_plan" name="id_plan" readonly >
                                            <input type="hidden" class="form-control" id="nama_plan" name="nama_plan" readonly >
                    <input type="hidden" class="form-control" id="luas_plan" name="luas_plan" readonly >
     
                    <div class="mb-3">
     
                         <div class="col-mb-3">
            <!-- <h4>tabel plan</h4> -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Plan Yang diPilih</th>
                        <th>Luas Plan yang Dipilih</th>
                        <th>Aksi</th>
                    </tr>
                </thead> 
                <tbody id="detail_cart">
 
                </tbody>
                 
            </table>
        </div>

        <div class="mb-3">
        <label  class="form-label">Total Luas Plan Terpilih</label>
        <input type="text" class="form-control" id="total" name="total" readonly>
      </div>
                <div class="mb-3">
        <label  class="form-label">Jenis Pekerjaan</label>
        <select  name="id_pekerjaan" id="id_pekerjaan" class="form-control" >
        <option  value="">-Pilih Jenis Pekerjaan-</option>
        <?php foreach($pekerjaan as $pkj) : ?>
          <option value="<?= $pkj['id_pekerjaan']; ?>"><?= $pkj['nama_pekerjaan']; ?></option>
          <?php endforeach ?>
        </select>
      </div>
      

     
      <!-- //penggajian  -->
     
      <div class="mb-3">
        <label  class="form-label">Masukan Jumlah Pekerja</label>
        <input type="text" class="form-control" id="jumlah_pekerja" name="jumlah_pekerja">
      </div>
      <div class="mb-3">
        <label  class="form-label">Masukan Jumlah Sopir</label>
        <input type="text" class="form-control" id="jumlah_sopir" name="jumlah_sopir">
      </div>
      
      <!-- <div class="mb-3"> -->
    <input type="hidden" class="form-control" id="gaji_pekerja" name="gaji_pekerja" readonly>
  <!-- </div> -->
      <!-- <div class="mb-3"> -->
      <?php foreach($sopir as $sopir) : ?>
    <input type="hidden" class="form-control" id="gaji_sopir" value="<?= $sopir['ongkos_sopir']; ?>" name="gaji_sopir" readonly>
    <?php endforeach ?>
  <!-- </div> -->
      <div class="mb-3">
        <label  class="form-label">Biaya Pekerja dan Sopir</label>
        <input type="text" class="form-control" id="hargatot" name="hargatot" readonly >
      </div>
      <div class="mb-3">
          <label  class="form-label">Biaya Pekerja dan Sopir Per HA</label>
          <input type="text" class="form-control" id="output_biaya_ha" name="output_biaya_ha" readonly>
        </div>
      
  <!-- <div class="col text-center">
      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <a href="<?= base_url('user');  ?>" class="btn btn-primary">Kembali</a>
    </div>
    <div class="col text-center"> -->
        </div>
    
        <div class="d-grid gap-2 d-md-block">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <a href="<?= base_url('user');  ?>" class="btn btn-primary">Kembali</a>
</div>
  </form>


</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



<script type="text/javascript">
//         $(document).ready(function(){

       
       
           
//        });
       
       $(document).ready(function(){
       
        

        //ini untuk mendapatkan plan berdasarkan pilihan wilayah
        $('#id_kebun').change(function() {
        var id = $(this).val();
        console.log(id);

        $.ajax({
        type: "POST",
                url: "<?= base_url('perhitungan_tebu/get_plan') ?>",
                data: {
                   id:id
                },
                dataType: "JSON",
                success: function(respone) {
                  $('#plan').html(respone);             
                }

        });
        });

        //ini untuk memilih plan
                   $('#plan').change(function() {
 var id = $(this).val();
 $.ajax({
       type: "POST",
                 url: "<?= base_url('perhitungan_tebu/proses_plan') ?>",
                 data: {
                    id:id
                 },
                 dataType: "JSON",
                 success: function(respone) {
                      console.log(respone);
                     $('#luas_plan').val(respone[0].luas_plan);
                     $('#nama_plan').val(respone[0].nama_plan);
                     $('#id_plan').val(respone[0].id_plan);
                     console.log($(this).val());
                     if ($(this).val() <=  $(this).val() > 0) {
                                $("#add_cart").prop('disabled', false);
                            } else {
                                $("#add_cart").prop('disabled', true);
                            }
                 }

         });
         });
                 
         
         
         //ini untuk pekerjaan
         $('#id_pekerjaan').change(function() {

         var id = $(this).val();
        $.ajax({
             type: "POST",
                 url: "<?= base_url('perhitungan_tebu/proses_ongkos') ?>",
                 data: {
                    id:id
                 },
                 dataType: "JSON",
                 success: function(respone) {       
                     // console.log(respone);
                     $('#gaji_pekerja').val(respone[0].ongkos_pekerjaan);
                 }

         });
         });
  //multiple plan
  
    $('#add_cart').click(function(){
            var id_plan    =  $("#id_plan").val();
            var nama_plan  =  $("#nama_plan").val();
            var luas_plan = $("#luas_plan").val();
            var id_kebun     =   $("#id_kebun").val();
            $.ajax({
                url : "<?php echo base_url();?>perhitungan_tebu/add_to_cart",
                method : "POST",
                data : {id_plan: id_plan, nama_plan: nama_plan, luas_plan: luas_plan, id_kebun: id_kebun},
                success: function(data){
                   
                     console.log(data);
                     $("#plan").val("");
                        $("#id_kebun").val("");
                        $("#harga").val("");
                        $("#qty").val("");
                    $('#detail_cart').html();
                    $('#detail_cart').load("<?= base_url('perhitungan_tebu/load_cart'); ?>");
                        $.get("<?= base_url('perhitungan_tebu/total'); ?>", function(data) {
                            $('#total').val(data);
                        });
                }
            });
        });
 
        // Load shopping cart
        $('#detail_cart').load("<?php echo base_url();?>perhitungan_tebu/load_cart");
 
        //Hapus Item Cart
        $(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url : "<?php echo base_url();?>perhitungan_tebu/hapus_cart",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cart').html(data);
                    $('#detail_cart').load("<?= base_url('perhitungan_tebu/load_cart'); ?>");
                 $.get("<?= base_url('perhitungan_tebu/total'); ?>", function(data) {
                     $('#total').val(data);
                    });
                }    
                 });
            
        });   
       });



        //perhitungan
        function perhitungan() {
            var jumlah_pekerja = $("#jumlah_pekerja").val();
            var gaji_pekerja = $("#gaji_pekerja").val();
            var jumlah_sopir = $("#jumlah_sopir").val();
            var gaji_sopir = $("#gaji_sopir").val();
            var hargatot = $("#hargatot").val();
            var luas_plan = $("#total").val();

            var penggajian_pekerja = parseInt(jumlah_pekerja) * parseInt(gaji_pekerja);
            var penggajian_sopir = parseInt(jumlah_sopir) * parseInt(gaji_sopir)  ;
            var total = parseInt(penggajian_pekerja) + parseInt(penggajian_sopir)  ;
            var output_biaya_ha = Math.round(parseInt(hargatot) / (luas_plan))     ;
            
            $("#hargatot").val(total);
            $("#output_biaya_ha").val(output_biaya_ha);
        }
        $("#luas_plan").change(function() {
            perhitungan();
        });
        $("#total").change(function() {
            perhitungan();
        });
        $("#total").keyup(function() {
            perhitungan();
        });
        $("#luas_plan").keyup(function() {
            perhitungan();
        });
        $("#jumlah_pekerja").change(function() {
            perhitungan();
        });
        $("#jumlah_pekerja").keyup(function() {
            perhitungan();
        });
        $("#gaji_pekerja").change(function() {
            perhitungan();
        });
        $("#gaji_pekerja").keyup(function() {
            perhitungan();
        });
        $("#jumlah_sopir").change(function() {
            perhitungan();
        });
        $("#jumlah_sopir").keyup(function() {
            perhitungan();
        });
        $("#gaji_sopir").change(function() {
            perhitungan();
        });
        $("#gaji_sopir").keyup(function() {
            perhitungan();
        });
        $("#output_total_biaya").change(function() {
            perhitungan();
        });
        $("#output_total_biaya").keyup(function() {
            perhitungan();
        });
        $("#hargatot").change(function() {
            perhitungan();
        });
        $("#hargatot").keyup(function() {
            perhitungan();
        });
        
 
        

   </script>