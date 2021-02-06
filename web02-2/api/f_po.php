<?php
include_once "../base.php";
switch($_GET['case']){
    case 1:
        $a=$News->all(['type'=>$_GET['num']]);
        foreach($a as $a){
            echo "<div><a href='javascript:getNews({$a['id']})'>{$a['title']}</a></div>";
        }
        break;
    case 2:
        $news=$News->find(['id'=>$_GET['id']]);
        echo "<pre>{$news['text']}</pre>";
        break;
}
?>
