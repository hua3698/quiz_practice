<?php
$timu = $Que->find($_GET['timu']);
$ques = $Que->all(['subject' => $timu['id']]);
// print_r($ques);
?>
<form action="api/vote.php" method="POST">
    <fieldset>
        <legend>目前位置：首頁 > 問卷調查 > <span><?= $timu['que']; ?></span></legend>
        <h3><?= $timu['que']; ?></h3>
        <?php
        foreach ($ques as $q) {
        ?>
            <div><input type="radio" name="option" value="<?= $q['id']; ?>"><?=$q['que'];?></div>
        <?php
        }
        ?>
        <input type="hidden" name="timu" value="<?=$timu['id'];?>">
        <div class="ct"><input type="submit" value="我要投票"></div>
    </fieldset>
</form>