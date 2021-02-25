<?php
include_once "../base.php";
print_r($_POST);
if(isset($_POST['id'])){
    foreach($_POST['id'] as $key=> $id){
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
            $Menu->del($id);
        }else{
            $sub=$Menu->find($id);
            $sub['text']=$_POST['text'][$key];
            $sub['href']=$_POST['href'][$key];
            $Menu->save($sub);
        }
    }
}
if(isset($_POST['text2'])){
    foreach($_POST['text2'] as $key=> $t){
        $row=[];
        $row['text']=$t;
        $row['href']=$_POST['href2'][$key];
        $row['parent']=$_POST['parent'];
        $row['sh']=1;
        $Menu->save($row);
    }
}
to("../backend.php?do=menu");
