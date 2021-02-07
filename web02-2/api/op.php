<?php
include_once "../base.php";
$que=$Que->find(['id'=>$_GET['id']]);
if($que['sh']==1){
    $que['sh']=0;
    $Que->save($que);
}else{
    $que['sh']=1;
    $Que->save($que);
}