<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<div class="card mb-4">
                <div class="card-header">
                    <h3>List Rekap Per Plan </h3>

<!-- Modal -->
<div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nama_modal"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pekerjaan</th>
                                    <th scope="col">Luas Plan</th>
                                    <th scope="col">Biaya</th>
                                    <th scope="col">Biaya Per HA</th>


                                </tr>
                            </thead>
                            <tbody id="detail">

                            </tbody>
                        </table>
                    </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Simpan Data</button> -->
      </div>
    </div>
  </div>
</div>
                </div>

<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>N0</th>
                <th>Tanggal</th>
                <th>Nama Plan</th>
                <th>Nama Mandor</th>
                <th>pekerjaan</th>
                <th>Biaya</th>
                <th>Biaya per HA</th>

                <th>Aksi</th>
            </tr>
        </thead>

    </table>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
       var modal = $('#modalData');
        var tableData = $('#tabel_plan');
        var formData = $('#formData');
        var btnSave = $('#btnSave');
        var nama_modal = $('#nama_modal');
       $(document).ready(function() {
    $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "order":[],
        "ajax":{
            "url": "<?= base_url('serverside_plan/getData') ?>",
            "type": "POST"

        },
        "columnDefs": [{
            "target": [-1],
            "orderable": false  
        }]
    });
  });

    function byid(id_riwayat , type){
      if(type=='detail'){
        saveData = 'edit';
        $("#detail").empty();

      }
       
      $.ajax({
         type: "POST",
                 url: "<?= base_url('serverside_plan/byid/') ?>" +id_riwayat ,
                 dataType: "JSON",
                 success:function(data) 
                 {
                  if (type=='detail') {
                    console.log( data);
                    var no = 1;
                        for (i = 0; i < data.length; i++) {
                            $("#detail").append('<tr><td>' + no + '</td><td>' + data[i]['nama_pekerjaan'] +  '</td><td>' + data[i]['luas_plan'] + '</td><td>' + data[i]['luas_plan'] * data[i]['biaya_ha'] + '</td><td>' + data[i]['biaya_ha']+'</td></tr>');
                            no++;
                            modal.modal('show');
                               }   
                              } else{
                   var result =  confirm('Apakah Anda Yakin Meghapus Catatan ' + '??')
                  if (result) {// apabila oke ditekan
                    deleteData(data[0].id_riwayat);                    
                  } 
                  }
                  
                 }           
      });

    }
    function deleteData(id_riwayat){
     
      $.ajax({
                 type: "POST",
                 url: "<?= base_url('serverside/delete_detail/') ?>" +id_riwayat ,
                 dataType: "JSON",
                 success:function(respone) { 
                  reloadTable()
                 }           
      });

}
    
    </script>
    

    