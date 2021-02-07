<?php
include_once "../base.php";
$id=$_POST['del'];
foreach($id as $m){
        $Mem->del($m);
}
to("../backend.php?do=admin");
?>
