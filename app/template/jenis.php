<?php
$jenis = $_POST['expiry'];
if($jenis == "terbatas"){ ?>
<label>Jenis Akses Terbatas :</label>
				                      <div>
				                        <select class="form-control" name="jenis" id="jenis">
                                        <option value="kosong">Pilih salah satu</option>
				                          <option value="waktu">Terbatas Berdasarkan Waktu</option>
				                          <option value="jumlah">Terbatas berdasarkan jumlah Scan</option>
				                        </select>
				                      </div>
<?php } else {

} ?>

<script type="text/javascript">
$(document).ready(function(){

  $("#jenis").change(function(){
    var jenis = $("#jenis").val();

	$.ajax({
		url	: 'template/kategori.php',
		data	: 'jenis='+jenis,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#aset-masa").html(msg);
	        }
	});
  });
});
</script>