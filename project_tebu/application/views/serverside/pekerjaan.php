<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<div class="card mb-4">
                <div class="card-header">
                    <h3>List Pekerjaan</h3>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" onclick="add()" data-bs-toggle="modal" data-bs-target="#modalData">
  Tambah Pekerjaan
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
        <input type="hidden" id="id_pekerjaan" name="id_pekerjaan" value="">
  
  <div class="mb-3">
    <label for="Nama Pekerjaan" class="form-label">Nama Pekerjaan</label>
    <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" placeholder="Masukan Nama Pekerjaan" >
  </div>
  <div class="mb-3">
    <label for="Ongkos Pekerjaan" class="form-label">Ongkos Pekerjaan</label>
    <input type="text" class="form-control" id="ongkos_pekerjaan" name="ongkos_pekerjaan" placeholder="Masukan Ongkos Pekerjaan">
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
               
<table id="tabel_pekerjaan" class="table table-bordered" style="width:100%" cellspacing="0">
        <thead>
            <tr>
                <th>N0</th>
                <th>Nama Pekerjaan</th>
                <th>Ongkos Pekerjaan</th>
                <th>Aksi</th>
            </tr>
        </thead>

    </table>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
      
      var saveData;
      var modal = $('#modalData');
        var tableData = $('#tabel_pekerjaan');
        var formData = $('#formData');
        var btnSave = $('#btnSave');
        var nama_modal = $('#nama_modal');

        $(document).ready(function() {

    
          tableData.DataTable({
        "processing": true,
        "serverSide": true,
        "order":[],
        "ajax":{
            "url": "<?= base_url('pekerjaan/getData') ?>",
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
      nama_modal.text('Tambah Data Pekerjaan');      
    }
function reloadTable(){
  tableData.DataTable().ajax.reload();
}
    function save(){
      btnSave.text('Sedang menyimpan data...');
      btnSave.attr('disabled', true);
        if (saveData == 'tambah') {
         url = "<?= base_url('pekerjaan/tambah_pekerjaan') ?>"
        }else{
          url = "<?= base_url('pekerjaan/ubah_pekerjaan') ?>"
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

    function byid(id_pekerjaan, type){
      if(type=='edit'){
        saveData = 'edit';
        formData[0].reset();

      }
      $.ajax({
         type: "GET",
                 url: "<?= base_url('pekerjaan/byid/') ?>" +id_pekerjaan ,
                 dataType: "JSON",
                 success:function(respone) {
                   if (type=='edit') {
                     
                     nama_modal.text('Ubah Data Pekerjaan');
                      btnSave.text('Ubah Data');
                      btnSave.attr('disabled', false);
                     $('[name="id_pekerjaan"]').val(respone[0].id_pekerjaan);
                     $('[name="nama_pekerjaan"]').val(respone[0].nama_pekerjaan);
                     $('[name="ongkos_pekerjaan"]').val(respone[0].ongkos_pekerjaan);
                     modal.modal('show');
                   } else{
                   var result =  confirm('Apakah Anda Yakin Meghapus Data Pekerjaan '+ respone[0].nama_pekerjaan + '??')
                  if (result) {// apabila oke ditekan
                    deleteData(respone[0].id_pekerjaan);                    
                  } 
                  }
                  
                 }           
      });

    }
    function deleteData(id_pekerjaan){
     
      $.ajax({
                 type: "POST",
                 url: "<?= base_url('pekerjaan/delete_pekerjaan/') ?>" +id_pekerjaan ,
                 dataType: "JSON",
                 success:function(respone) { 
                  reloadTable()
                 }           
      });

}
    </script>
    

    