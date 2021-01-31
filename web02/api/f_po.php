<?php include_once "../base.php";
switch ($_GET['case']) {
    case 1:
        $a = $News->all(['type' => $_GET['type']]);
        // print_r($a);
        foreach ($a as $a) {
            echo "<div><a href='javascript:getNews({$a['id']})'>{$a['title']}</a></div>";
        }
    break;
    case 2:
        $article=$News->find($_GET['id']);
        echo "<pre>{$article['text']}</pre>";
        break;
}
