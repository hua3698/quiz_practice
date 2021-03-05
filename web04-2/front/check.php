<?php
$a = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<h2 class="ct">填寫資料</h2>
<form action="api/check.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">登入帳號</td>
            <td class="pp" colspan="4"><?= $_SESSION['mem']; ?></td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp" colspan="4"><input type="text" name="name" value="<?= $a['name']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">墊子信箱</td>
            <td class="pp" colspan="4"><input type="text" name="email" value="<?= $a['email']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡地址</td>
            <td class="pp" colspan="4"><input type="text" name="addr" value="<?= $a['addr']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">連絡電話</td>
            <td class="pp" colspan="4"><input type="text" name="tel" value="<?= $a['tel']; ?>"></td>
        </tr>
        <tr>
            <td class="ct tt">商品名稱</td>
            <td class="ct tt">編號</td>
            <td class="ct tt">數量</td>
            <td class="ct tt">單價</td>
            <td class="ct tt">小計</td>
        </tr>
        <?php
        $sum = 0;
        foreach ($_SESSION['cart'] as $id => $qt) {
            $a = $Goods->find($id);
        ?>
            <tr>
                <td class="pp"><?= $a['name']; ?></td>
                <td class="pp"><?= $a['no']; ?></td>
                <td class="pp"><?= $qt; ?></td>
                <td class="pp"><?= $a['price']; ?></td>
                <td class="pp"><?= $a['price'] * $qt; ?></td>
            </tr>
        <?php
            $sum += $a['price'] * $qt;
        }
        ?>
        <tr>
            <td class="tt ct" colspan="5">總價:<?= $sum; ?></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="total" value="<?=$sum;?>">
        <input type="submit" value="確定送出">
        <input type="button" value="返回修改訂單" onclick="history.go(-1)">
    </div>
</form>