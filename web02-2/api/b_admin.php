<?php
include_once "../base.php";
print_r($_POST);
foreach($_POST['id'] as $id){
    if(in_array($id,$_POST['del'])){
        $Member->del($id);
    }
}
to("../backend.php?do=admin");
?>