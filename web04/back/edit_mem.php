<h1 class="ct">編輯會員資料</h1>
<form action="api/edit_mem.php" method="post">
<table class="all">
    <tr>
        <td class="ct tt">帳號</td>
        <td class="pp"><?=$a['acc'];?></td>
    </tr>
    <tr>
        <td class="ct tt">密碼</td>
        <td class="pp"><?=$a['pw'];?></td>
    </tr>
    <tr>
        <td class="ct tt">累積交易額</td>
        <td class="pp"><?=$a['total'];?></td>
    </tr>
    <tr>
        <td class="ct tt">姓名</td>
        <td class="pp"><input type="text" name="name" value="<?=$a['name'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">電子信箱</td>
        <td class="pp"><input type="text" name="email" value="<?=$a['email'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">地址</td>
        <td class="pp"><input type="text" name="addr" value="<?=$a['addr'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">電話</td>
        <td class="pp"><input type="text" name="tel" value="<?=$a['tel'];?>"></td>
    </tr>
</table>
<div class="ct"><input type="submit" value="編輯"><input type="reset" value="重置"><input type="button" value="取消"></div>
</form>