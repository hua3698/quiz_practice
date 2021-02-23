<?php
include_once "../base.php";
print_r($_POST);
if(!empty($_POST['id'])){
    foreach($_POST['id'] as $key=> $id){
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
            $Menu->del($id);
        }else{
            $data=$Menu->find($id);
            $data['text']=$_POST['text'][$key];
            $data['href']=$_POST['href'][$key];
            $Menu->save($data);
        }
    }
}
if(!empty($_POST['text2'])){
    foreach($_POST['text2'] as $key=> $t){
        $data=[];
        $data['text']=$_POST['text2'][$key];
        $data['href']=$_POST['href2'][$key];
        $data['sh']=1;
        $data['parent']=$_POST['parent'];
        $Menu->save($data);
    }
}
to("../backend.php?do=menu");
?>