<?php
include 'config.php';
    
	$UIDresult=$_POST["UIDresult"];
	$Write="<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);

	$data = mysqli_query($konek,"SELECT * FROM user WHERE rfid = '$UIDresult'");
	$data_count = mysqli_num_rows($data);

	if($data_count !== 0) {
		$info_data = mysqli_fetch_array($data);
		$nama_data = $info_data['nama'];
		$status = $info_data['stat'];
		$waktu = $info_data['expiry'];
		$akses = $info_data['berlaku'];
		$str1 = strtotime($waktu);
    	$str2 = strtotime($date);
    	$selisih = $str1-$str2;
		if($status == "TWaktu" && $selisih < 0){ //Expiration
			echo "akses_ditolak";
			
		} else if($status == "TAkses"){
			if($akses == 1){
			echo "akses_diterima";
			mysqli_query($konek,"DELETE FROM user WHERE rfid = '$UIDresult'");
			
			} else if($akses <= 0){
				echo "akses_ditolak";
				mysqli_query($konek,"DELETE FROM user WHERE rfid = '$UIDresult'");
			} else if($akses > 0){
			$baru = $akses-1;
			$send = mysqli_query($konek,"UPDATE user SET berlaku = $baru WHERE rfid = '$UIDresult'");
			$send = mysqli_query($konek,"INSERT INTO history (id, rfid, nama, tanggal,waktu)
        VALUES (NULL, '$UIDresult', '$nama_data','$date','$time')");
			if($send){
			echo "akses_diterima";
			} else {
			echo "akses_ditolak";
			}	
			
		} } else {
		$send = mysqli_query($konek,"INSERT INTO history (id, rfid, nama, tanggal,waktu)
        VALUES (NULL, '$UIDresult', '$nama_data','$date','$time')");
		echo "akses_diterima";
	} } else {
		echo "akses_ditolak";
	}
?>