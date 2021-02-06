<?php
include_once "../base.php";
if(!empty($_POST)){
    $title=$_POST['title'];
    $Que->save(['subject'=>0,'que'=>$title,'count'=>0,'sh'=>1]);
    $timu=$Que->find(['que'=>$title]);
    foreach($_POST['option'] as $o){
        $Que->save(['subject'=>$timu['id'],'que'=>$o,'count'=>0,'sh'=>1]);
    }
}else{
    //$_GET
    $que=$Que->find($_GET['id']);
    ($que['sh']==1)?$que['sh']=0:$que['sh']=1;
    print_r($que);
    $Que->save($que);
}

to("../backend.php?do=que");
?>