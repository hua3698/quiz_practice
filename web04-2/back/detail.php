<?php
$a = $Ord->find(['no'=>$_GET['no']]);
?>
<h1 class="ct">訂單編號<span style="color:red"><?= $a['no']; ?></span>的詳細資料</h1>
<table class="all ct">
    <tr>
        <td class="tt">會員帳號</td>
        <td colspan="4" class="pp"><?= $a['acc']; ?></td>
    </tr>
    <tr>
        <td class="tt">姓名</td>
        <td colspan="4" class="pp"><?= $a['name']; ?></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td colspan="4" class="pp"><?= $a['email']; ?></td>
    </tr>
    <tr>
        <td class="tt">聯絡地址</td>
        <td colspan="4" class="pp"><?= $a['addr']; ?></td>
    </tr>
    <tr>
        <td class="tt">聯絡電話</td>
        <td colspan="4" class="pp"><?= $a['tel']; ?></td>
    </tr>
    <tr class="tt">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    $sum=0;
    $cart=unserialize($a['cart']);
    foreach ($cart as $id => $qt) {
        $good = $Goods->find($id);
    ?>
        <tr class="pp">
            <td><?= $good['name']; ?></td>
            <td><?= $good['no']; ?></td>
            <td><?= $qt; ?></td>
            <td><?= $good['price']; ?></td>
            <td><?= $good['price']*$qt; ?></td>
        </tr>
        <?php
        $sum+=$good['price']*$qt;
    }
    ?>
    <tr>
        <td class="tt" colspan="5">總價:<?=$sum;?></td>
    </tr>
</table>
<div class="ct"><input type="button" value="返回" onclick="history.go(-1)"></div>