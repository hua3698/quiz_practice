<?php
include_once "../base.php";
print_r($_POST);
foreach($_POST['id'] as $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $News->del($id);
    }else{
        $n=$News->find($id);
        $n['sh']=(in_array($id,$_POST['sh']) && isset($_POST['sh']))?1:0;
        $News->save($n);
    }
}
to("../backend.php?do=news");
?>