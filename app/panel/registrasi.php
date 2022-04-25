<?php
require_once("../config.php");

$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('../UIDContainer.php',$Write);
?>

<script>
			$(document).ready(function(){
				 $("#uid").load("UIDContainer.php");
				setInterval(function() {
					$("#uid").load("UIDContainer.php");
				}, 500);
			});
		</script>
<div class="card card-color panel-primary">
            <div class="card-header"> 
                <h3 class="panel-title">Registrasi kartu baru</h3> 
            </div> 
        <div class="card-body">
			<div class="col-lg-12" id="indexresult"></div>
	  <form method="POST">
				                    <div class="form-group">
				                      <label>Card UID :</label>
				                      <div>
                                      <textarea class="form-control" name="uid" id="uid" placeholder="Mohon untuk scan kartu pada perangkat" rows="1" required></textarea>
				                      </div>
				                    </div>
				                    <div class="form-group">
				                      <label>Nama :</label>
				                      <div>
				                        <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama">
				                      </div>
				                    </div>
									<div class="form-group">
				                      <label>Masa Berlaku :</label>
				                      <div>
				                        <select class="form-control" name="expiry" id="expiry">
				                          <option value="permanent">Selamanya</option>
				                          <option value="terbatas">Akses Terbatas</option>
				                        </select>
				                      </div>
				                    </div>
									<div class="form-group" name="aset-jenis" id="aset-jenis">
				                      
				                    </div>
									<div class="form-group" name="aset-masa" id="aset-masa">
				                      
				                    </div>
      </div>

      <div class="modal-footer">
        <button type="submit"  onclick="kirim()" name="kirim" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>

  <script>

function kirim()
{
post();
	var uid = $('#uid').val();
	var nama = $('#nama').val();
	var expiry = $('#expiry').val();
	var jenis = $('#jenis').val();
	var akses = $('#akses').val();
	var kadaluarsa = $('#kadaluarsa').val();
	$.ajax({
		url	: 'panel/proses-reg.php',
		data	: 'uid='+uid+'&nama='+nama+'&expiry='+expiry+'&jenis='+jenis+'&akses='+akses+'&kadaluarsa='+kadaluarsa,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
                     result();
	        $("#indexresult").prepend(msg);
	    }
	});
}
</script>
<script type="text/javascript">
$(document).ready(function(){

  $("#expiry").change(function(){
    var expiry = $("#expiry").val();

	$.ajax({
		url	: 'template/jenis.php',
		data	: 'expiry='+expiry,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#aset-jenis").html(msg);
	        }
	});
  });
});
</script>
