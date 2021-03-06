<?php
$timo = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $timo['que']; ?></legend>
    <h3><b><?= $timo['que']; ?></b></h3>
    <form action="api/vote.php" method="post">
        <?php
        $op = $Que->all(['parent' => $_GET['id']]);
        foreach ($op as $o) {
        ?>
            <div><input type="radio" name="op" value="<?= $o['id']; ?>"><?= $o['que']; ?></div>
        <?php
        }
        ?>
        <input type="hidden" name="timo" value="<?=$_GET['id'];?>">
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>