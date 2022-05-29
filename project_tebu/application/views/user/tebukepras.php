 <!-- Begin Page Content -->
 <div class="container">

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
<!-- <div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0"> -->
    <h1 class="h3 mb-0 text-gray-800">Aplikasi Perhitungan</h1>
</div>
<form class="container-fluid" method="post"  action="<?= base_url('user/hasil'); ?>">

<div class="tab" > 
  

    <label  class="form-label">Masukan Luas Plan</label>
    <input type="text" class="form-control" id="luas_plan" name="luas_plan">
  
  
    <label  class="form-label">Masukkan Biaya Sewa</label>
    <input type="text" class="form-control" id="biaya_sewa" name="biaya_sewa">
  
  
    <label  class="form-label">Masukan Biaya Kepras</label>
    <input type="text" class="form-control" id="biaya_kepras" name="biaya_kepras" >
  
  
    <label  class="form-label">Masukkan Biaya Putus Akar</label>
    <input type="text" class="form-control" id="biaya_putus_akar" name="biaya_putus_akar">
   

</div>  

<div class="tab" > 

      <label for="inputCity" class="form-label">Masukkan Jumlah Pemupuk Pertama</label>
      <input type="text" class="form-control" id="pemupuk_pertama" name="pemupuk_pertama">
  
  
  
    <label  class="form-label">Masukan Jumlah Pupuk(Kg) pertama</label>
    <input type="text" class="form-control" id="jumlah_pupuk_pertama" name="jumlah_pupuk_pertama">
  
  
  
    <label  class="form-label">Masukkan Luas Mingguan Pemupukan Pertama</label>
    <input type="text" class="form-control" id="luas_mingguan_pupuk_pertama" name="luas_mingguan_pupuk_pertama">
  
  
  
    <label  class="form-label">Masukan Jumlah Penyemprot Herbisida</label>
    <input type="text" class="form-control" id="peyemprot_pertama" name="penyemprot_pertama">
  
  
  
    <label  class="form-label">Masukkan Jumlah Herbisida Pertama(Liter)</label>
    <input type="text" class="form-control" id="jumlah_herbisida_pertama" name="jumlah_herbisida_pertama">
  
  
  
      <label for="inputCity" class="form-label">Masukkan Luas Mingguan Penyemprotan Pertama</label>
      <input type="text" class="form-control" id="luas_mingguan_herbisida_pertama" name="luas_mingguan_herbisida_pertama">
  

</div>

  
  
  <!-- <div class="mb-3">
    <label  class="form-label">Masukan Biaya Sulam</label>
    <input type="text" class="form-control" id="biaya_sulam" name="biaya_sulam">
  </div>
  
  <div class="mb-3">
      <label for="inputCity" class="form-label">Masukkan Jumlah Pemupuk Kedua</label>
      <input type="text" class="form-control" id="pemupuk_kedua" name="pemupuk_kedua">
  </div>
  
  <div class="mb-3">
    <label  class="form-label">Masukan Jumlah Pupuk(Kg) Kedua</label>
    <input type="text" class="form-control" id="jumlah_pupuk_kedua" name="jumlah_pupuk_kedua">
  </div>
  
  <div class="mb-3">
    <label  class="form-label">Masukkan Luas Mingguan Pemupukan Kedua</label>
    <input type="text" class="form-control" id="luas_mingguan_pupuk_kedua" name="luas_mingguan_pupuk_kedua">
  </div>
  
  <div class="mb-3">
    <label  class="form-label">Masukan Biaya Gulud</label>
    <input type="text" class="form-control" id="biaya_gulud" name="biaya_gulud">
  </div>
  
  <div class="mb-3">
    <label  class="form-label">Masukan Jumlah Penyemprot Herbisida Kedua</label>
    <input type="text" class="form-control" id="peyemprot_kedua" name="penyemprot_kedua">
  </div>
  
  <div class="mb-3">
    <label  class="form-label">Masukkan Jumlah Herbisida Kedua(Liter)</label>
    <input type="text" class="form-control" id="jumlah_herbisida_kedua" name="jumlah_herbisida_kedua">
  </div>
  
  <div class="mb-3">
      <label for="inputCity" class="form-label">Masukkan Luas Mingguan Penyemprotan Kedua</label>
      <input type="text" class="form-control" id="luas_mingguan_herbisida_kedua" name="luas_mingguan_herbisida_kedua">
  </div>
  <div class="mb-3">
    <label  class="form-label">Masukan Biaya Rata-Rata Klentek</label>
    <input type="text" class="form-control" id="biaya_klentek" name="biaya_klentek">
  </div>
  <div class="mb-3">
    <label  class="form-label">Masukan Biaya Lain-Lain</label>
    <input type="text" class="form-control" id="biaya_lain" name="biaya_lain">
  </div> -->
 
  <div class="col text-center">
      <button type="submit" name="hitung"  class="btn btn-primary">Hitung</button>
    </div>
    <div class="col text-center">
      <a href="<?= base_url('user');  ?>" class="btn btn-primary">Kembali</a>
    </div>

    <div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>
  


<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>


</form>

		
</div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>


<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
	// This function will display the specified tab of the form ...
	var x = document.getElementsByClassName("tab");
	x[n].style.display = "block";
	// ... and fix the Previous/Next buttons:
	if (n == 0) {
		document.getElementById("prevBtn").style.display = "none";
	} else {
		document.getElementById("prevBtn").style.display = "inline";
	}
	if (n == x.length - 1) {
		document.getElementById("nextBtn").innerHTML = "Submit";
	} else {
		document.getElementById("nextBtn").innerHTML = "Next";
	}
	// ... and run a function that displays the correct step indicator:
	fixStepIndicator(n);
}

function nextPrev(n) {
	// This function will figure out which tab to display
	var x = document.getElementsByClassName("tab");
	// Exit the function if any field in the current tab is invalid:
	if (n == 1 && !validateForm()) return false;
	// Hide the current tab:
	x[currentTab].style.display = "none";
	// Increase or decrease the current tab by 1:
	currentTab = currentTab + n;
	// if you have reached the end of the form... :
	if (currentTab >= x.length) {
		//...the form gets submitted:
		document.getElementById("regForm").submit();
		return false;
	}
	// Otherwise, display the correct tab:
	showTab(currentTab);
}

function validateForm() {
	// This function deals with validation of the form fields
	var x,
		y,
		i,
		valid = true;
	x = document.getElementsByClassName("tab");
	y = x[currentTab].getElementsByTagName("input");
	// A loop that checks every input field in the current tab:
	for (i = 0; i < y.length; i++) {
		// If a field is empty...
		if (y[i].value == "") {
			// add an "invalid" class to the field:
			y[i].className += " invalid";
			// and set the current valid status to false:
			valid = false;
		}
	}
	// If the valid status is true, mark the step as finished and valid:
	if (valid) {
		document.getElementsByClassName("step")[currentTab].className += " finish";
	}
	return valid; // return the valid status
}

function fixStepIndicator(n) {
	// This function removes the "active" class of all steps...
	var i,
		x = document.getElementsByClassName("step");
	for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace(" active", "");
	}
	//... and adds the "active" class to the current step:
	x[n].className += " active";
}

  
</script>

<style>
/* Style the form */
#regForm {
	background-color: #ffffff;
	margin: 100px auto;
	padding: 40px;
	width: 70%;
	min-width: 300px;
}

/* Style the input fields */
input {
	padding: 10px;
	width: 100%;
	font-size: 17px;
	font-family: Raleway;
	border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
	background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
	display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
	height: 15px;
	width: 15px;
	margin: 0 2px;
	background-color: #bbbbbb;
	border: none;
	border-radius: 50%;
	display: inline-block;
	opacity: 0.5;
}

/* Mark the active step: */
.step.active {
	opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
	background-color: #04aa6d;
}




</style>