<?php
include_once "../base.php";
$chk=$Mem->count(['acc'=>$_POST['acc']]);
echo $chk;
?>