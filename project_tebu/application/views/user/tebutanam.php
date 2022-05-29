 <!-- Begin Page Content -->
 <div class="container">

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
<!-- <div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0"> -->
    <h1 class="h3 mb-0 text-gray-800">Perhitungan Tebu tanam</h1>
</div>

<form class="container-fluid" method="post"  action="<?= base_url('user/hasil_tebu_tanam'); ?>">
  <div class="mb-3">
    <label  class="form-label">Masukan Luas Plan</label>
    <input type="text" class="form-control" id="inputEmail4" name="t_luas_plan">
  </div>

  <div class="mb-3">
    <label  class="form-label">Masukkan Biaya Sewa</label>
    <input type="text" class="form-control" id="inputPassword4" name="t_biaya_sewa">
  </div>

  <div class="mb-3">
    <label  class="form-label">Masukkan Biaya Sewa Traktor</label>
    <input type="text" class="form-control" id="inputPassword4" name="t_biaya_traktor">
  </div>

  <div class="mb-3">
      <label  class="form-label">Masukan Harga Bibit(kwt)</label>
      <input type="text" class="form-control" id="inputEmail4" name="t_harga_bibit">
    </div>
    <div class="mb-3">
        <label  class="form-label">Masukkan Berat Bibit Tertanam</label>
        <input type="text" class="form-control" id="inputPassword4" name="t_berat_bibit">
    </div>
    <div class="mb-3">
      <label  class="form-label">Masukkan Biaya Rata-Rata Tanam</label>
      <input type="text" class="form-control" id="inputPassword4" name="t_biaya_tanam">
    </div>
  
    <div class="mb-3">
      <label  class="form-label">Masukan Jumlah Penyemprot Herbisida Pertama</label>
      <input type="text" class="form-control" id="inputEmail4" name="t_penyemprot_pertama">
    </div>
    <div class="mb-3">
      <label  class="form-label">Masukkan Jumlah Herbisida Pertama(Liter)</label>
      <input type="text" class="form-control" id="inputPassword4" name="t_jumlah_herbisida_pertama">
    </div>
    <div class="mb-3">
        <label for="inputCity" class="form-label">Masukkan Luas Mingguan Penyemprotan Pertama</label>
        <input type="text" class="form-control" id="inputCity" name="t_luas_mingguan_herbisida_pertama">
    </div>
  
    <div class="mb-3">
      <label for="inputCity" class="form-label">Masukkan Jumlah Pemupuk Pertama</label>
      <input type="text" class="form-control" id="inputCity" name="t_pemupuk_pertama">
  </div>
  <div class="mb-3">
    <label  class="form-label">Masukan Jumlah Pupuk(Kg) pertama</label>
    <input type="text" class="form-control" id="inputEmail4" name="t_jumlah_pupuk_pertama">
  </div>
  <div class="mb-3">
    <label  class="form-label">Masukkan Luas Mingguan Pemupukan Pertama</label>
    <input type="text" class="form-control" id="inputPassword4" name="t_luas_mingguan_pupuk_pertama">
  </div>
  
  <div class="mb-3">
    <label  class="form-label">Masukan Biaya Rata-Rata Gulud Pertama</label>
    <input type="text" class="form-control" id="inputEmail4" name="t_biaya_gulud1">
  </div>

    <div class="mb-3">
      <label  class="form-label">Masukan Jumlah Penyemprot Herbisida Kedua</label>
      <input type="text" class="form-control" id="inputEmail4" name="t_penyemprot_kedua">
    </div>
    <div class="mb-3">
      <label  class="form-label">Masukkan Jumlah Herbisida Kedua(Liter)</label>
      <input type="text" class="form-control" id="inputPassword4" name="t_jumlah_herbisida_kedua">
    </div>
    <div class="mb-3">
        <label for="inputCity" class="form-label">Masukkan Luas Mingguan Penyemprotan Kedua</label>
        <input type="text" class="form-control" id="inputCity" name="t_luas_mingguan_herbisida_kedua">
    </div>
  
    <div class="mb-3">
      <label for="inputCity" class="form-label">Masukkan Jumlah Pemupuk Kedua</label>
      <input type="text" class="form-control" id="inputCity" name="t_pemupuk_kedua">
  </div>
  <div class="mb-3">
    <label  class="form-label">Masukan Jumlah Pupuk(Kg) Kedua</label>
    <input type="text" class="form-control" id="inputEmail4" name="t_jumlah_pupuk_kedua">
  </div>
  <div class="mb-3">
    <label  class="form-label">Masukkan Luas Mingguan Pemupukan Kedua</label>
    <input type="text" class="form-control" id="inputPassword4"name="t_luas_mingguan_pupuk_kedua">
  </div>
  
  <div class="mb-3">
    <label  class="form-label">Masukan Biaya Gulud Kedua</label>
    <input type="text" class="form-control" id="inputEmail4" name="t_biaya_gulud2">
  </div>
  
  <div class="mb-3">
    <label  class="form-label">Masukan Biaya Rata-Rata Klentek</label>
    <input type="text" class="form-control" id="inputEmail4" name="t_biaya_klentek">
  </div>
  
  <div class="mb-3">
    <label  class="form-label">Masukan Biaya Lain-Lain</label>
    <input type="text" class="form-control" id="inputEmail4" name="t_biaya_lain">
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
</div>

</div>
<!-- /.container-fluid -->

</div>