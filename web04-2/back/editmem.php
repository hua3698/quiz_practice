<?php
$a = $Mem->find($_GET['id']);
?>
<h1 class="ct">編輯會員資料</h1>
<form action="api/editmem.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><?= $a['acc']; ?></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><?= $a['pw']; ?></td>
        </tr>
        <tr>
            <td class="tt ct">累積交易額</td>
            <td class="pp"><?= $a['total']; ?>元</td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?= $a['name']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?= $a['email']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">地址</td>
            <td class="pp"><input type="text" name="addr" value="<?= $a['addr']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="tel" value="<?= $a['tel']; ?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$a['id']?>">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
        <input type="button" value="取消" onclick="history.go(-1)">
    </div>
</form>