<?php
$timu = $Que->find(['id' => $_GET['id']]);
$ques = $Que->all(['subject' => $_GET['id']]);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span><?= $timu['que']; ?></span></legend>
    <form action="api/vote.php" method="post">
        <div style="font-weight: 700;"><?= $timu['que']; ?></div>
        <?php
        foreach ($ques as $q) {
        ?>
            <div><input type="radio" name="id" value="<?= $q['id']; ?>"><?= $q['que']; ?></div>
        <?php
        }
        ?>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>