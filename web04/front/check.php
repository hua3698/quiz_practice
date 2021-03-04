<h2 class="ct">填寫資料</h2>
<form action="api/order.php" method="post">
    <table class="ct all">
        <?php
        $mem = $Member->find(['acc' => $_SESSION['member']]);
        foreach ($_SESSION['cart'] as $id => $qt) {
            $g = $Goods->find($id);
        ?>
            <tr>
                <td class="tt">登入帳號</td>
                <td class="pp"><?= $mem['acc']; ?></td>
            </tr>
            <tr>
                <td class="tt">姓名</td>
                <td class="pp"><input type="text" name="name" value="<?= $mem['name']; ?>"></td>
            </tr>
            <tr>
                <td class="tt">墊子信箱</td>
                <td class="pp"><input type="text" name="email" value="<?= $mem['email']; ?>"></td>
            </tr>
            <tr>
                <td class="tt">聯絡地址</td>
                <td class="pp"><input type="text" name="addr" value="<?= $mem['addr']; ?>"></td>
            </tr>
            <tr>
                <td class="tt">連絡電話</td>
                <td class="pp"><input type="text" name="tel" value="<?= $mem['tel']; ?>"></td>
            </tr>
    </table>
    <table class="ct all">
        <tr class="tt">
            <td>商品名稱</td>
            <td>訂單編號</td>
            <td>數量</td>
            <td>單價</td>
            <td>小計</td>
        </tr>
        <tr class="pp">
            <td><?= $g['name']; ?></td>
            <td><?= $g['no']; ?></a></td>
            <td><?= $qt; ?></td>
            <td><?= $g['price']; ?></td>
            <td><?= $g['price'] * $qt; ?></td>
        </tr>
    <?php
        }
    ?>
    </table>
    <div class="ct">
        <input type="hidden" name="acc" value="<?=$mem['acc'];?>">
        <input type="hidden" name="total" value="<?=$g['price'] * $qt;?>">
        <input type="hidden" name="ord_time" value="<?=date("Ymd");?>">
        <input type="submit" value="確定送出">
        <input type="button" value="返回修改訂單" onclick="history.go(-1)">
    </div>
</form>
