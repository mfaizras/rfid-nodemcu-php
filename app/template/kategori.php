<?php
$jenis = "waktu";
$jenis = $_POST['jenis'];
if($jenis == "jumlah"){ ?>
<label>Masukan Jumlah Akses :</label>
				                      <div>
				                        <input type="text" class="form-control" name="akses" id="akses" placeholder="Masukkan Jumlah Akses yang diinginkan">
				                      </div>
<?php } else if ($jenis == "waktu") { ?>
    <label>Masukan Waktu Kadaluarsa (dalam hari):</label>
				                      <div>
				                        <input type="date" class="form-control" name="kadaluarsa" id="kadaluarsa" placeholder="Masukan angka">
				                      </div>

<?php } else {
    }?>