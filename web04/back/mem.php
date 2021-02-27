<h1 class="ct">會員管理</h1>
<table class="all">
    <tr class="ct tt">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?php
    $all=$Member->all();
    foreach($all as $a){
    ?>
    <tr class="pp">
        <td><?=$a['name'];?></td>
        <td><?=$a['acc'];?></td>
        <td><?=$a['pw'];?></td>
        <td>
            <a href="?do=edit_mem"><input type="button" value="修改"></a>
            <input type="button" value="刪除">
        </td>
    </tr>
    <?php
        }
    ?>
</table>