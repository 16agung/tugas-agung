<title><?= $biaya_sewa_lahan; ?></title> 

 <!-- Begin Page Content -->
 <div class="container">

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0">
    <h1 class="h3 mb-0 text-gray-800">Perhitungan Tebu tanam</h1>
</div>

<form class="row g-3" method="get"  action="<?= base_url('user/hasil'); ?>">
  <div class="col-md-6">
    <label  class="form-label">Biaya Sewa Lahan</label>
    <input readonly  type="text" class="form-control" value="<?=$h_sewalahan;?>" readonly>   
  </div>

  <div class="col-md-6">
    <label  class="form-label">Biaya Sewa Traktor</label>
    <input type="text" class="form-control" id="inputPassword4" value=" <?= $h_biayatraktor;?>" readonly> 
  </div>

  <div class="col-md-6">
    <label  class="form-label">Biaya Bibit</label>
    <input type="text" class="form-control" id="inputPassword4" value="<?=$h_biayabibit;?>" readonly>
  </div>

  <div class="col-md-6">
      <label  class="form-label">Biaya Tanam</label>
      <input type="text" class="form-control" id="inputEmail4" value="<?=$h_biayatanam;?>" readonly>
    </div>
    <div class="col-md-6">
        <label  class="form-label">Jumlah Konsumsi Herbisida Pertama</label>
        <input type="text" class="form-control" id="inputPassword4" value="<?=$h_jumlah_konsumsi_herbisida1;?>" readonly>
    </div>
    <div class="col-md-6">
      <label  class="form-label">Ongkos Herbisda Pertama</label>
      <input type="text" class="form-control" id="inputPassword4"value="<?=$h_ongkos_berbisida1;?>" readonly>
    </div>
  
    <div class="col-md-6">
      <label  class="form-label">Biaya Penyemprotan Herbisida Pertama</label>
      <input type="text" class="form-control" id="inputEmail4" value="<?=$h_biaya_prenyemprotan_herbisida1;?>" readonly>
    </div>
    <div class="col-md-6">
      <label  class="form-label">Jumlah Konsumsi Pupuk Pertama</label>
      <input type="text" class="form-control" id="inputPassword4" value="<?=$h_jumlah_konsumsi_pupuk1;?>" readonly>
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Ongkos Pemupukan Pertama</label>
        <input type="text" class="form-control" id="inputCity"value="<?=$h_ongkos_pupuk1;?>" readonly>
    </div>
  
    
    <div class="col-md-6">
    <label  class="form-label">Biaya Pemupukan Pertama</label>
    <input type="text" class="form-control" id="inputEmail4" value="<?=$h_biaya_pemupukan1;?>" readonly>
  </div>


    <div class="col-md-6">
      <label  class="form-label">Jumlah Konsumsi Herbisida kedua</label>
      <input type="text" class="form-control" id="inputEmail4"value="<?=$h_jumlah_konsumsi_herbisida2;?>" readonly>
    </div>
    <div class="col-md-6">
        <label  class="form-label">Ongkos Herbisida Kedua</label>
        <input type="text" class="form-control" id="inputPassword4"value="<?=$h_ongkos_berbisida2;?>" readonly>
    </div>
    <div class="col-md-6">
      <label  class="form-label">Biaya Penyemprotan Herbisida Kedua</label>
      <input type="text" class="form-control" id="inputPassword4"value="<?=$h_biaya_prenyemprotan_herbisida2;?>" readonly>
    </div>
    
    <div class="col-md-6">
      <label  class="form-label">Jumlah Konsumsi Pupuk Kedua</label>
      <input type="text" class="form-control" id="inputPassword4" value="<?=$h_jumlah_konsumsi_pupuk2;?>" readonly>
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Ongkos Pemupukan Kedua</label>
        <input type="text" class="form-control" id="inputCity"value="<?=$h_ongkos_pupuk2;?>" readonly>
    </div>
  
    
    <div class="col-md-6">
    <label  class="form-label">Biaya Pemupukan Kedua</label>
    <input type="text" class="form-control" id="inputEmail4" value="<?=$h_biaya_pemupukan2;?>" readonly>
  </div>


    <div class="col-md-6">
    <label  class="form-label">Biaya Gulud Pertama</label>
    <input type="text" class="form-control" id="inputEmail4" value="<?=$h_biayagulud1;?>" readonly>
  </div>
    <div class="col-md-6">
    <label  class="form-label">Biaya Gulud Kedua</label>
    <input type="text" class="form-control" id="inputEmail4" value="<?=$h_biayagulud2;?>" readonly>
  </div>
    
    <div class="col-md-6">
    <label  class="form-label">Biaya klentek</label>
    <input type="text" class="form-control" id="inputEmail4" value="<?=$h_biayaklentek;?>" readonly>
  </div>
    <div class="col-md-6">
    <label  class="form-label">Biaya Lain-Lain</label>
    <input type="text" class="form-control" id="inputEmail4" value="<?=$h_biayalain;?>" readonly>
  </div>
  <div class="col-md-6">
    <label  class="form-label">Grand Total</label>
    <input type="text" class="form-control" id="inputPassword4" value="<?=$h_grandtotal;?>" readonly>
  </div>
 
  <!-- <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
</div> -->
<!-- <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
        Check me out
    </label>
    </div>
</div> -->


<!-- <div class="col-12">
  <label for="inputAddress" class="form-label">Masukkan Biaya Kepras</label>
  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
</div>
<div class="col-12">
  <label for="inputAddress2" class="form-label">Address 2</label>
  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
</div> -->
</div>

  

</div>

</div>
<!-- /.container-fluid -->

</div>