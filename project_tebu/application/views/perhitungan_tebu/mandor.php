<div class="container">




<form class="container-fluid" method="post"  action="<?= base_url('user/hasil_tebu_tanam'); ?>">
 

    <div class="mb-3">
        <a href="<?= base_url('data/tambah_mandor');  ?>" class="btn bg-gradient-primary"> Tambah Mandor <a/>
      </div>
    
  

    
        
    <div class="mb-3">
    <ol class="list-group list-group-numbered">
        <?php foreach ($mandor as $mdr): ?>    
    <li class="list-group-item">
  <?= $mdr['nama_mandor']; ?> 
<a href="<?= base_url(); ?>data/hapus_mandor/<?= $mdr['id_mandor'] ?>" class="badge badge-danger float-right" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
<a href="<?= base_url(); ?>data/ubah_mandor/<?= $mdr['id_mandor'] ?>" class="badge badge-primary float-right" >Ubah</a>
</li>
     <?php endforeach ?>
        </ol>

      </div>


 
  
 
  <div class="col text-center">
      <button type="submit" name="hitung" class="btn btn-primary">Hitung</button>
    </div>
    <div class="col text-center">
      <a href="<?= base_url('user');  ?>" class="btn btn-primary">Kembali</a>
    </div>
</form>





</div>







</div>