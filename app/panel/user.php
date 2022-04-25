<?php
require_once("../config.php");
?>
<div class="card card-color panel-primary">
            <div class="card-header"> 
                <h3 class="panel-title">Daftar User Terdaftar</h3> 
            </div> 
        <div class="card-body">
        <div class="table-responsive">
                                        <table id="datatable" class="table table-striped">
                                            <thead>
                                                <tr class='success'>
                                                    <th>No</th>
                                                    <th>UID</th>
                                                    <th>Nama</th>
                                                    <th>Masa Berlaku</th>
                                                    <th>Terdaftar tanggal</th>
                                                    <th>Penggunaan Terakhir</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$i=0;

$tampil = mysqli_query($konek,"SELECT * FROM user ORDER BY id ASC");

while($data = mysqli_fetch_array($tampil))
 {
 $i++;
 $id = $data['id'];
 $uid = $data['rfid'];
 $nama = $data['nama'];
 $daftar = $data['tanggal'];
if($data['stat'] == "TAkses"){
    $masa = $data['berlaku']."x Tersisa";
} else if($data['stat'] == "TWaktu"){
    $waktu = $data['expiry'];
    $waktu = date('d-m-Y', strtotime($waktu));
    $str1 = strtotime($waktu);
    $str2 = strtotime($date);
    $selisih = $str1-$str2;
    $masa = $selisih/24/60/60;
    $masa = $masa." Hari Tersisa";
} else {
    $masa = "Selamanya";
}
 $dapat = mysqli_query($konek,"SELECT * FROM history WHERE rfid = '$uid' ORDER BY id DESC LIMIT 1");
 $dapat1 = mysqli_fetch_array($dapat);
 $countd = mysqli_num_rows($dapat);

 if($countd > 0){
 $terakhir_login = $dapat1['tanggal']." Jam ".$dapat1['waktu'];
 } else {
    $terakhir_login = "Belum Pernah Digunakan";
 }
 
echo "
<tr>
 <td>".$i."</td>
 <td>".$uid."</td>
 <td>".$nama."</td>
 <td>".$masa."</td>
 <td>".$daftar."</td>
 <td>".$terakhir_login."</td>"
 ?> 
 <td><a href="#" onClick="confirm_modal('hapus-action.php?&id=<?php echo  $id; ?>');"><button class="btn btn-danger" title="Hapus">Hapus</button></a></td>
</tr>
<?php
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
        <h5 class="modal-title">Konfirmasi Penghapusan UID</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Anda Yakin ingin menghapus UID Tersebut?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
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