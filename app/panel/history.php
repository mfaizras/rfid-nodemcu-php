<?php
require_once("../config.php");
?>
<div class="card card-color panel-primary">
            <div class="card-header"> 
                <h3 class="panel-title">Histori Akses</h3> 
            </div> 
        <div class="card-body">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="#" onClick="confirm_modal('hapus-action.php?&id=historyall');"><button class="btn btn-danger" title="Hapus">Kosongkan History</button></a>
        </div>
        <div class="table-responsive">
                                        <table id="datatable" class="table table-striped">
                                            <thead>
                                                <tr class='success'>
                                                    <th>No</th>
                                                    <th>UID</th>
                                                    <th>Nama</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$i=0;

$tampil = mysqli_query($konek,"SELECT * FROM history ORDER BY id DESC");

while($data = mysqli_fetch_array($tampil))
 {
 $i++;

echo "
<tr>
 <td>".$i."</td>
 <td>".$data['rfid']."</td>
 <td>".$data['nama']."</td>
 <td>".$data['tanggal']."</td>
 <td>".$data['waktu']."</td>
</tr>";
}
?>
                                            </tbody>
                                        </table>
                                    </div>
            </div> 
        </div>

        <!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Penghapusan History</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Anda Yakin ingin mengosongkan History?</p><br><br>
        <b><i>
    *Note : History yang sudah dikosongkan tidak bisa dikembalikan
    </i>
        </b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="#" class="btn btn-danger" id="delete_link">Kosongkan</a>
      </div>
    </div>
  </div>
</div>

<!-- Javascript untuk popup modal Delete-->
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>   