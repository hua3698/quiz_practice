<?php
include_once "../base.php";
switch ($_GET['do']) {
    case 'title':
        $id = $_POST['id'];
        $news = $News->all(['type' => $id]);
        foreach ($news as $n) {
            echo "<div><a href='#' onclick='newcon({$n['id']})'>{$n['title']}</a></div>";
        }
        break;
    case 'content':
        $id = $_POST['id'];
        $news = $News->find(['id' => $id]);
        echo "{$news['text']}";
        break;
}
