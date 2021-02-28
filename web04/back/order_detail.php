<h2 class="ct">訂單編號<span style="color:red"><?=$_GET['id'];?></span>的詳細資料</h2>
<table class="all">
    <tr>
        <td class="tt">會員帳號</td>
        <td class="pp"><?=$a['acc'];?></td>
    </tr>
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><?=$a['name'];?></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><?=$a['email'];?></td>
    </tr>
    <tr>
        <td class="tt">聯絡地址</td>
        <td class="pp"><?=$a['addr'];?></td>
    </tr>
    <tr>
        <td class="tt">連絡電話</td>
        <td class="pp"><?=$a['tel'];?></td>
    </tr>
    <tr class="tt">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <tr class="pp">
        <td><?=$a[''];?></td>
        <td><?=$a[''];?></td>
        <td><?=$a[''];?></td>
        <td><?=$a[''];?></td>
        <td><?=$a[''];?></td>
    </tr>
    <tr>
        <td></td>
    </tr>
</table>
<div class="ct"><input type="button" value="返回" onclick="history.go(-1)"></div>