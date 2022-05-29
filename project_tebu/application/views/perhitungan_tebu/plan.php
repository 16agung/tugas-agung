<div class="container">




<form class="container-fluid" method="post"  action="<?= base_url('user/hasil_tebu_tanam'); ?>">
 

    <div class="mb-3">
        <a href="<?= base_url('data/tambah_plan');  ?>" class="btn bg-gradient-primary"> Tambah Plan Baru <a/>
      </div>
    
  

    
        
    <div class="mb-3">
    <ol class="list-group list-group-numbered">
        <?php foreach ($plan as $plan): ?>    
    <li class="list-group-item">
  <?= $plan['nama_plan']; ?> 
<a href="<?= base_url(); ?>data/hapus_mandor/<?= $plan['id_plan'] ?>" class="badge badge-danger float-right" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
<a href="<?= base_url(); ?>data/ubah_mandor/<?= $plan['id_plan'] ?>" class="badge badge-primary float-right" >Ubah</a>
</li>
     <?php endforeach ?>
        </ol>
      
      </div>
      <?= $this->pagination->create_links(); ?>
     
 
  
 
  <div class="col text-center">
      <button type="submit" name="hitung" class="btn btn-primary">Hitung</button>
    </div>
    <div class="col text-center">
      <a href="<?= base_url('user');  ?>" class="btn btn-primary">Kembali</a>
    </div>
</form>





</div>







</div>