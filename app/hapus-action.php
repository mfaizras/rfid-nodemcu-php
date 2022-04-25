<?php
require_once("config.php");
$id = $_GET['id'];

if($id == "historyall"){
    $proses = mysqli_query($konek,"DELETE FROM history");
} else {
$proses = mysqli_query($konek,"DELETE FROM user WHERE id = '$id'");
}

if($proses){
    echo 'Data Berhasil Dihapus, Akan Dikembalikan kehalaman utama dalam 2 Detik';
echo "<meta http-equiv='refresh' content='2; url=index.php'>";
} else {
    echo '<script language="javascript" type="text/javascript">
alert("Data Gagal Dihapus, Akan dikembalikan Kehalaman Utama dalam 2 detik");</script>';
echo "<meta http-equiv='refresh' content='2; url=index.php'>";
}
