<?php
include '../config.php';
// menyimpan data kedalam variabel
$uid = $_POST['uid'];
$nama = $_POST['nama'];
$expiry = $_POST['expiry'];
$jenis = $_POST['jenis'];
$akses = $_POST['akses'];
$kadaluarsa = $_POST['kadaluarsa'];
// query SQL untuk insert data
$data = mysqli_query($konek,"SELECT * FROM user WHERE rfid = '$uid'");
$data_count = mysqli_num_rows($data);

if (!$uid){ ?>
<div class="alert alert-danger">
<font color="black">
<strong>Failed: </strong> <br />
UID Kosong,  Silahkan Scan Kartu.
</font>
</div>
<?php } else if (!$nama) {?>
<div class="alert alert-danger">
<font color="black">
<strong>Failed: </strong> <br />
Nama kosong, Silahkan isi nama.
</font>
</div>
<?php } else if ($data_count <> 0) {?>
<div class="alert alert-danger">
<font color="black">
<strong>Failed: </strong> <br />
UID Sudah Terdaftar, silahkan gunakan kartu lain.
</font>
</div>
<?php } else {

    if ($expiry == "terbatas"){
    if($jenis == "kosong"){ ?>
    
        <div class="alert alert-danger">
        <font color="black">
        <strong>Failed: </strong> <br />
        Pilih Jenis akses terlebih dahulu.
        </font>
        </div>

<?php } else if ($jenis == "waktu"){
//    $waktu = date("d-m-Y",strtotime($date. '+'.$kadaluarsa.' Days'));
    $waktu = str_replace('/', '-', $kadaluarsa);
    $waktu = date('d-m-Y', strtotime($waktu));
    $str1 = strtotime($waktu);
    $str2 = strtotime($date);
    $selisih = $str1-$str2;
    $selisih = $selisih/24/60/60;

    if (!$kadaluarsa){ ?>
        <div class="alert alert-danger">
        <font color="black">
        <strong>Failed: </strong> <br />
        Tanggal kosong, Isi tanggal terlebih dahulu.
        </font>
        </div>
        <?php } else {
    $send = mysqli_query($konek,"INSERT INTO user (id, rfid, nama, tanggal,expiry,berlaku,stat)
    VALUES (NULL, '$uid', '$nama','$date','$waktu','infinite','TWaktu')");

if ($send){ ?>
    <div class="alert alert-success">
<font color="black">
<strong>Success: </strong> <br />
Kartu berhasil di registrasi<br>
UID : <?php echo $uid; ?><br>
Nama : <?php echo $nama; ?><br> 
Akses akan Kadaluarsa dalam <?php echo $selisih; ?> Hari (<?php echo $waktu; ?>). <br>                    
</font>
</div>
<?php } else { ?>
    <div class="alert alert-danger">
<font color="black">
<strong>Failed: </strong> <br />
Data Gagal ditambahkan , Ulang lagi
<?php echo $send; ?>
</font>
</div>
<?php } }
    } else if ($jenis == "jumlah"){
        if (!$akses){ ?>
            <div class="alert alert-danger">
            <font color="black">
            <strong>Failed: </strong> <br />
            Jumlah akses kosong, Isi jumlah terlebih dahulu.
            </font>
            </div>
            <?php } else {
        $send = mysqli_query($konek,"INSERT INTO user (id, rfid, nama, tanggal,expiry,berlaku,stat)
    VALUES (NULL, '$uid', '$nama','$date','infinite','$akses','TAkses')");

if ($send){ ?>
    <div class="alert alert-success">
<font color="black">
<strong>Success: </strong> <br />
Kartu berhasil di registrasi<br>
UID : <?php echo $uid; ?><br>
Nama : <?php echo $nama; ?><br>
Sisa Akses adalah <?php echo $akses; ?> kali                   
</font>
</div>
<?php } else { ?>
    <div class="alert alert-danger">
<font color="black">
<strong>Failed: </strong> <br />
Data Gagal ditambahkan , Ulang lagi
<?php echo $send; ?>
</font>
</div>
<?php } }
    }
    } else {
    $send = mysqli_query($konek,"INSERT INTO user (id, rfid, nama, tanggal,expiry,berlaku,stat)
    VALUES (NULL, '$uid', '$nama','$date','infinite','infinite','Permanent')");

if ($send){ ?>
    <div class="alert alert-success">
<font color="black">
<strong>Success: </strong> <br />
Kartu berhasil di registrasi<br>
UID : <?php echo $uid; ?><br>
Nama : <?php echo $nama; ?><br>                       
</font>
</div>
<?php } else { ?>
    <div class="alert alert-danger">
<font color="black">
<strong>Failed: </strong> <br />
Data Gagal ditambahkan , Ulang lagi
<?php echo $send; ?>
</font>
</div>
<?php }

}  } ?>