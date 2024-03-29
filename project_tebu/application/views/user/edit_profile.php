<div class="container">

<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1> 




<div class="row">

<div class="col-lg">

<?= form_open_multipart('profile/edit_profile');?>
<div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
    </div>
  </div>
<div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
    </div>
  </div>
<div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
      <?= form_error('name','<small class="text-danger pl-3">','</small>' ); ?>
    </div>
  </div>
<div class="form-group row">
    <div class="col-sm-2">
Foto
    </div>
    <div class="col-sm-10">
        <div class="row">

        <div class="col-sm-3">
            <img src=" <?= base_url('assets/img/profile/') .  $user['image']; ?>" class="img-fluid img-thumbnail"> 
        </div>
        <div class="col-sm-9">
        <div class="input-group mb-3">
  <input type="file" class="form-control" id="image" name="image">
  
</div>
        </div>
        </div>
    </div>    

  </div>


<div class="form-group row justify-content-end">
<div class="col-sm-10">
  <button type="submit" class="btn btn-primary">
Edit
  </button>
</div>
</div>

</form>
</div>
</div>


</div>
</div> 