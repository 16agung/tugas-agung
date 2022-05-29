<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Bootstrap CSS -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
			crossorigin="anonymous"
		/>
<!-- css -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css"> 
    <title><?= $title; ?></title> 

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets'); ?>/css/sb-admin-2.min.css" rel="stylesheet" />
  </head>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
			
				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
		
					<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= base_url('user'); ?>">Halaman Utama</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="<?= base_url('perhitungan_tebu'); ?>">Perhitungan Budidaya Tebu</a>
						</li>
          
          <li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= base_url('mandor'); ?>">Data Mandor</a>
						</li>
          <li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= base_url('pekerjaan'); ?>">Data Pekerjaan</a>
						</li>	
							
						<li class="nav-item dropdown">
						<a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Plan
          </a>
           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url('kebun'); ?>">Wilayah</a></li>
            <li><a class="dropdown-item" href="<?= base_url('plan'); ?>">Plan</a></li>
          </ul>
						</li>

	
						<li class="nav-item dropdown">
						<a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Rekap
          </a>
           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url('serverside'); ?>">Rekap Perhitungan Budidaya Tebu Per Mandor</a></li>
            <li><a class="dropdown-item" href="<?= base_url('serverside_plan'); ?>">Rekap Perhitungan Budidaya Tebu Per Plan</a></li>
          </ul>
						</li>
		  <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</i></a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <li class="nav-item">
							<a class="dropdown-item" href="<?= base_url('profile'); ?>">My Profile</a>
						</li>
            <li class="nav-item"><a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" >Logout</a></li>
          </ul>
        </li>
					</ul>
				</div>
			</div>
		</nav>
  <!-- <body class="bg-gradient-success"> -->