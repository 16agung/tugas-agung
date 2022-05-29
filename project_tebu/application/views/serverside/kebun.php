<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<div class="card mb-4">
                <div class="card-header">
                    <h3>List Kebun</h3>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" onclick="add()" data-bs-toggle="modal" data-bs-target="#modalData">
  Tambah Kebun Baru
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
        <input type="hidden" id="id_kebun" name="id_kebun" value="">

  <div class="mb-3">
    <label for="Nama Kebun" class="form-label">Nama Kebun</label>
    <input type="text" class="form-control" id="nama_kebun" name="nama_kebun" placeholder="Masukan Nama Kebun" >
  </div>
  <div class="mb-3">
    <label for="Luas Kebun" class="form-label">Luas Kebun</label>
    <input type="text" class="form-control" id="luas_kebun" name="luas_kebun" placeholder="Masukan Luas Kebun">
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
               
<table id="tabel_kebun" class="table table-bordered" style="width:100%" cellspacing="0">
        <thead>
            <tr>
                <th>N0</th>
                <th>Nama Wilayah</th>
                <th>Luas</th>
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
        var tableData = $('#tabel_kebun');
        var formData = $('#formData');
        var btnSave = $('#btnSave');
        var nama_modal = $('#nama_modal');

        $(document).ready(function() {

    
          tableData.DataTable({
        "processing": true,
        "serverSide": true,
        "order":[],
        "ajax":{
            "url": "<?= base_url('kebun/getData') ?>",
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
      nama_modal.text('Tambah Data Kebun');      
    }
function reloadTable(){
  tableData.DataTable().ajax.reload();
}
    function save(){
      btnSave.text('Sedang menyimpan data...');
      btnSave.attr('disabled', true);
        if (saveData == 'tambah') {
         url = "<?= base_url('kebun/tambah_kebun') ?>"
        }else{
          url = "<?= base_url('kebun/ubah_kebun') ?>"
        }
      $.ajax({
         type: "POST",
                 url: url ,
                 data: formData.serialize(),
                 dataType: "JSON",
                 success:function(respone) {

                  if(respone.status=='success'){
                    modal.modal('hide');
                    reloadTable();
                  }
                 },
                 error: function(){
                   console.log('Telah terjadi kesalahan')
                 }           
      });

    }

    function byid(id_kebun, type){
      if(type=='edit'){
        saveData = 'edit';
        formData[0].reset();

      }
      $.ajax({
         type: "GET",
                 url: "<?= base_url('kebun/byid/') ?>" +id_kebun ,
                 dataType: "JSON",
                 success:function(respone) {
                   if (type=='edit') {
                     
                     nama_modal.text('Ubah Data Kebun');
                      btnSave.text('Ubah Data');
                      btnSave.attr('disabled', false);
                     $('[name="id_kebun"]').val(respone[0].id_kebun);
                     $('[name="nama_kebun"]').val(respone[0].kebun);
                     $('[name="luas_kebun"]').val(respone[0].luas);
                     modal.modal('show');
                   } else{
                   var result =  confirm('Apakah Anda Yakin Meghapus Data Kebun '+ respone[0].kebun + '??')
                  if (result) {// apabila oke ditekan
                    deleteData(respone[0].id_kebun);                    
                  } 
                  }
                  
                 }           
      });

    }
    function deleteData(id_kebun){
     
      $.ajax({
                 type: "POST",
                 url: "<?= base_url('kebun/delete_kebun/') ?>" +id_kebun ,
                 dataType: "JSON",
                 success:function(respone) { 
                  reloadTable()
                 }           
      });

}
    </script>
    

    