<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="text-center">
      <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-thumbnail rounded mx-auto d-block " style="max-width: 150px;"> 
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"> <?= $user['name']; ?></h5> 
        <p class="card-text"><?= $user['email']; ?></p>
        <p class="card-text"><small class="text-muted"> Mulai Bergabung <?= date('d F Y', $user['date_created']);  ?> </small></p> 
        <div class="d-grid gap-2 d-md-block">
      <a href="<?= base_url('profile/edit_profile');  ?>" class="btn btn-primary">edit</a>
      <a href="<?= base_url('user');  ?>" class="btn btn-primary">Kembali</a>
    </div>
      </div>
    </div>
  </div>
</div>