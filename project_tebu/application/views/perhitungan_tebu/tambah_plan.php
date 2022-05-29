<div class="container">

<div class="container-sm">
<?php if($this->session->flashdata('flash')):  ?>
<div class="row">
    <div class="col">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  Data Plan<strong>berhasil</strong><?= $this->session->flashdata('flash'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    </div>
</div>
    <?php endif; ?>
<form class="container-fluid" method="post"  action="<?= base_url('data/tambah_plan'); ?>">
   
    
      <div class="mb-3">
      <?php if(validation_errors()): ?>
    <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
    </div>
<?php endif; ?>
  
<div class="mb-3">
        <label  class="form-label">Wilayah Plan</label>
        <select name="id_kebun" id="id_kebun" class="form-control" >
        <option value="">-Pilih Wilayah plan-</option>
        <?php foreach($kebun as $kbn) : ?>
          <option value="<?= $kbn['id_kebun']; ?>"><?= $kbn['kebun']; ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <label  class="form-label">Masukan Nama Plan Baru</label>
        <input type="text" class="form-control" id="nama_plan" name="nama_plan">
      </div>
      <label  class="form-label">Masukan Luas Plan Baru</label>
        <input type="text" class="form-control" id="luas_plan" name="luas_plan">
      </div>



  
 
  <div class="col text-center">
      <button type="submit" name="tambah" class="btn btn-primary">Tambah Plan Baru</button>
    </div>
    <div class="col text-center">
      <a href="<?= base_url('user');  ?>" class="btn btn-primary">Kembali</a>
    </div>
</form>





</div>







</div>