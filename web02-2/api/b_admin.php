<?php
include_once "../base.php";
if(isset($_POST['del'])){
    foreach($_POST['del'] as $d){
        $Member->del($d);
    }
}

to("../backend.php?do=admin");
?>