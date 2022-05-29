<!-- Custom styles for this template-->
<!-- <link href="<?= base_url('assets'); ?>/css/sb-admin-2.min.css" rel="stylesheet" /> -->
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
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url('mandor'); ?>">Mandor</a></li>
            <li><a class="dropdown-item" href="<?= base_url('plan'); ?>">Plan</a></li>
            <li><a class="dropdown-item" href="<?= base_url('pekerjaan'); ?>">Pekerjaan</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= base_url('perhitungan_tebu'); ?>">Perhitungan Budidaya Tebu</a></li>
          </ul>
        </li>
		<li class="nav-item">
							<a class="nav-link" href="<?= base_url('profile'); ?>">My Profile</a>
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
		  
					</ul>
				</div>
			</div>
		</nav>
		<div class="container-fluid">