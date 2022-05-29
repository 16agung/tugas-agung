<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<div class="card mb-4">
                <div class="card-header">
                    <h3>Ongkos Supir</h3>
  

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
        <input type="hidden" id="id_ongkos_sopir" name="id_ongkos_sopir" value="">
  
  <div class="mb-3">
    <label for="Ongkos Sopir" class="form-label">Ongkos Sopir</label>
    <input type="text" class="form-control" id="ongkos_Sopir" name="ongkos_sopir" placeholder="Masukan Ongkos sopir">
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
               
<table id="tabel_ongkos_sopir" class="table table-bordered" style="width:100%" cellspacing="0">
        <thead>
            <tr>
                <th>N0</th>
                <th>Ongkos Supir</th>
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
        var tableData = $('#tabel_ongkos_sopir');
        var formData = $('#formData');
        var btnSave = $('#btnSave');
        var nama_modal = $('#nama_modal');

        $(document).ready(function() {

    
          tableData.DataTable({
        "processing": true,
        "serverSide": true,
        "order":[],
        "ajax":{
            "url": "<?= base_url('supir/getData') ?>",
            "type": "POST"

        },
        "columnDefs": [{
            "target": [-1],
            "orderable": false  
        }]
    });
    });

   
function reloadTable(){
  tableData.DataTable().ajax.reload();
}
    function save(){
      btnSave.text('Sedang menyimpan data...');
      btnSave.attr('disabled', true);
        if (saveData == 'tambah') {
        }else{
          url = "<?= base_url('supir/ubah_supir') ?>"
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

    function byid(id_ongkos_sopir, type){
      if(type=='edit'){
        saveData = 'edit';
        formData[0].reset();
      }
      $.ajax({
         type: "GET",
                 url: "<?= base_url('supir/byid/') ?>" +id_ongkos_sopir ,
                 dataType: "JSON",
                 success:function(respone) {
                   if (type=='edit') {
                     
                     nama_modal.text('Ubah Data Ongkos Supir');
                      btnSave.text('Ubah Data');
                      btnSave.attr('disabled', false);
                     $('[name="id_ongkos_sopir"]').val(respone[0].id_ongkos_sopir);
                     $('[name="ongkos_sopir"]').val(respone[0].ongkos_sopir);
                     modal.modal('show');
                   } else{
                    
                  }
                  
                 }           
      });

    }
   
    </script>
    

    