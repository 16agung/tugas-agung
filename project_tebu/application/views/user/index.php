 <!-- Begin Page Content -->
 <div class="container">

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0">
    <h1 class="h3 mb-0 text-gray-800">Aplikasi Perhitungan</h1>
</div>

<div class="row rows-cols-2">

    <!-- Earnings (Monthly) Card Example -->
    <div class=" d-grid gap-1 mx-auto">
    <div class="card-body">
<a type="button" class="btn btn-lg btn-danger"  title="Popover title" href="<?= base_url('perhitungan_tebu'); ?>" >Perhitungan Budidaya Tebu</a>
        </div>
    </div>
    
    
    <div class=" d-grid gap-1 mx-auto">
             <div class="card-body">    
            <a type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" data-bs-placement="right" title="Popover title" href="<?= base_url('serverside'); ?>">Rekap Hasil Perhitungan Tebu</a>
        </div>
    </div>

    <!-- Tasks Card Example -->
    <div class=" d-grid gap-2 mx-auto">
         
             <div class="card-body">
            <a type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">Data</a>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class=" d-grid gap-2 mx-auto">
             <div class="card-body">
            <a type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" title="Popover title" href="<?= base_url('profile'); ?>" >My profile</a>
        </div>
    </div>

    </div>

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->