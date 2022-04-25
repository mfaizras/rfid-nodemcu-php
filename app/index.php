<?php
require_once("config.php");

$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>
    <?php include_once "assets/header.php"; ?>

    <div class="container mt-3">
    <div class="d-flex justify-content-center">
        <h1>SMART DOOR LOCK</h1>
    </div>
    <div class="col mt-2">
       <div class="row">
          <button type="button" class="btn col m-1 btn-primary" href="javascript:;" onclick="buka('panel/user');" >Periksa User</button>
        <button type="button" class="btn col m-1 btn-primary" href="javascript:;" onclick="buka('panel/registrasi');">Registrasi Kartu</button>
        <button type="button" class="btn col m-1 btn-primary" href="javascript:;" onclick="buka('panel/history');">Lihat History</button>
        <button type="button" class="btn col m-1 btn-primary" href="javascript:;" onclick="buka('panel/manual');">Panduan Pengunaan</button>
     </div>
     </div>

     <div class="col-lg mt-4 index-home"  id="indexhome">
        <div class="card card-color panel-primary">
            <div class="card-header"> 
                <h3 class="panel-title">Information</h3> 
            </div> 
        <div class="card-body">
                <div class="alert alert-info" role="alert">
                <p>Website konfigurasi untuk alat Smart Door Lock</p> 

              </div>          
            
              
            </div> 
        </div>
    </div>

    </div>
    <?php include_once "assets/bottom.php"; ?>
    <?php include_once "assets/script.php"; ?>