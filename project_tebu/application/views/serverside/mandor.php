
<div class="content-wrapper">
<div class="card mb-4">
                <div class="card-header">
                    <h3>List mandor</h3>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" onclick="add()" data-bs-toggle="modal" data-bs-target="#modalData">
  Tambah mandor
</button>

<!-- Modal -->
<div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nama_modal"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="#" id="formData">
        <input type="hidden" id="id_mandor" name="id_mandor" value="">
  
  <div class="mb-3">
    <label for="Nama mandor" class="form-label">Nama mandor</label>
    <input type="text" class="form-control" id="nama_mandor" name="nama_mandor" placeholder="Masukan Nama mandor" >
  </div>
      
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Simpan Data</button>
      </div>
    </div>
  </div>
</div>
                </div>
               
<table id="tabel_mandor" class="table table-bordered" style="width:100%" cellspacing="0">
        <thead>
            <tr>
                <th>N0</th>
                <th>Nama mandor</th>
                <th>Aksi</th>
            </tr>
        </thead>

    </table>
	<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
			<!-- /.control-sidebar -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
      
      var saveData;
      var modal = $('#modalData');
        var tableData = $('#tabel_mandor');
        var formData = $('#formData');
        var btnSave = $('#btnSave');
        var nama_modal = $('#nama_modal');

        $(document).ready(function() {

    
          tableData.DataTable({
        "processing": true,
        "serverSide": true,
        "order":[],
        "ajax":{
            "url": "<?= base_url('mandor/getData') ?>",
            "type": "POST"

        },
        "columnDefs": [{
            "target": [-1],
            "orderable": false  
        }]
    });
    });

    function add() {
       saveData= 'tambah';
      formData[0].reset();
      modal.modal('show');     
      nama_modal.text('Tambah Data mandor');      
    }
function reloadTable(){
  tableData.DataTable().ajax.reload();
}
    function save(){
      btnSave.text('Sedang menyimpan data...');
      btnSave.attr('disabled', true);
        if (saveData == 'tambah') {
         url = "<?= base_url('mandor/tambah_mandor') ?>"
        }else{
          url = "<?= base_url('mandor/ubah_mandor') ?>"
        }
      $.ajax({
         type: "POST",
                 url: url ,
                 data: formData.serialize(),
                 dataType: "JSON",
                 success:function(respone) {

                  if(respone.status=='success'){
                    modal.modal('hide');
                    btnSave.text('Simpan Data');
                 btnSave.attr('disabled', false);
                    reloadTable();
                  }
                 },
                 error: function(){
                   console.log('Telah terjadi kesalahan')
                 }           
      });

    }

    function byid(id_mandor, type){
      if(type=='edit'){
        saveData = 'edit';
        formData[0].reset();

      }
      $.ajax({
         type: "GET",
                 url: "<?= base_url('mandor/byid/') ?>" +id_mandor ,
                 dataType: "JSON",
                 success:function(respone) {
                   if (type=='edit') {
                     
                     nama_modal.text('Ubah Data Mandor');
                      btnSave.text('Ubah Data');
                      btnSave.attr('disabled', false);
                     $('[name="id_mandor"]').val(respone[0].id_mandor);
                     $('[name="nama_mandor"]').val(respone[0].nama_mandor);
                     modal.modal('show');
                   } else{
                   var result =  confirm('Apakah Anda Yakin Meghapus Data mandor '+ respone[0].nama_mandor + '??')
                  if (result) {// apabila oke ditekan
                    deleteData(respone[0].id_mandor);                    
                  } 
                  }
                  
                 }           
      });

    }
    function deleteData(id_mandor){
     
      $.ajax({
                 type: "POST",
                 url: "<?= base_url('mandor/delete_mandor/') ?>" +id_mandor ,
                 dataType: "JSON",
                 success:function(respone) { 
                  reloadTable()
                 }           
      });

}
    </script>
    

    