<?php
require_once("../config.php");
?>
<div class="card card-color panel-primary">
            <div class="card-header"> 
                <h3 class="panel-title">Panduan Pengunaan</h3> 
            </div> 
        <div class="card-body">
            <?php 
        $pesan = file_get_contents('../manual.txt');
        echo $pesan;
        ?>
            </div> 
        </div>