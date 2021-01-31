<?php
$title = $Que->find($_GET['id'])['que'];
$op = $Que->all(['subject' => $_GET['id']]);
?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $title; ?></legend>
    <form action="api/vote.php" method="POST">
        <h3><?= $title; ?></h3>
        <?php
        foreach ($op as $o) {
            echo "<div><input type='radio' name='vote' value={$o['id']}>{$o['que']}</div>";
        }
        ?>
        <input type="hidden" name="id" value="<?=$o['subject'];?>">
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>