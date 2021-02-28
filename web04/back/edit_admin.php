<h1 class="ct">修改管理員權限</h1>
<form action="api/add_admin.php" method="post">
    <table class="all">
    <?php
    $admin=$Admin->find($_GET['id']);
    $admin['pr']=unserialize($admin['pr']);
    // print_r($admin);
    ?>
        <tr>
            <td class="ct tt">帳號</td>
            <td class="pp"><input type="text" name="acc" value="<?=$admin['acc'];?>"></td>
        </tr>
        <tr>
            <td class="ct tt">密碼</td>
            <td class="pp"><input type="password" name="pw" value="<?=$admin['pw'];?>"></td>
        </tr>
        <tr>
            <td class="ct tt">權限</td>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" value="1" <?=(in_array(1,$admin['pr']))?'checked':'';?>>商品分類與管理</div>
                <div><input type="checkbox" name="pr[]" value="2" <?=(in_array(2,$admin['pr']))?'checked':'';?>>訂單管理</div>
                <div><input type="checkbox" name="pr[]" value="3" <?=(in_array(3,$admin['pr']))?'checked':'';?>>會員管理</div>
                <div><input type="checkbox" name="pr[]" value="4" <?=(in_array(4,$admin['pr']))?'checked':'';?>>葉偉版權區管理</div>
                <div><input type="checkbox" name="pr[]" value="5" <?=(in_array(5,$admin['pr']))?'checked':'';?>>最新消息管理</div>
            </td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>