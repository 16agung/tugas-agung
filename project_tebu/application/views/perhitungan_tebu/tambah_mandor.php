<div class="container">

<div class="container-sm">
<?php if($this->session->flashdata('flash')):  ?>
<div class="row">
    <div class="col">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  Data Mandor<strong>berhasil</strong><?= $this->session->flashdata('flash'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    </div>
</div>
    <?php endif; ?>
<form class="container-fluid" method="post"  action="<?= base_url('data/tambah_mandor'); ?>">
   
    
      <div class="mb-3">
      <?php if(validation_errors()): ?>
    <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
    </div>
<?php endif; ?>
  
      <label  class="form-label">Masukan Nama Mandor Baru</label>
        <input type="text" class="form-control" id="nama_mandor" name="nama_mandor">
      </div>



  
 
  <div class="col text-center">
      <button type="submit" name="tambah" class="btn btn-primary">Tambah Mandor Baru</button>
    </div>
    <div class="col text-center">
      <a href="<?= base_url('user');  ?>" class="btn btn-primary">Kembali</a>
    </div>
</form>





</div>







</div>