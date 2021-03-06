<?php
include_once "../base.php";
if ($_GET['do'] == 'title') {
    $new = $News->all(['type' => $_POST['type']]);
    foreach ($new as $n) {
        echo "<div><a href='#' onclick='get_text({$n['id']})'>{$n['title']}</a></div>";
    }
} else {
    $text=$News->find($_POST['id']);
    echo "<pre>{$text['title']}</pre>";
    echo "<pre>{$text['text']}</pre>";
}

