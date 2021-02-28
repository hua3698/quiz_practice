<div class="ct"><a href="?do=add_admin"><input type="button" value="新增管理員"></a></div>
<table class="all ct">
    <tr class="tt">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php
    $admin=$Admin->all();
    foreach($admin as $a){
    ?>
    <tr class="pp">
        <td><?=$a['acc'];?></td>
        <td><?=str_repeat("*",strlen($a['pw']));?></td>
        <td>
            <?php
                if($a['acc']=='admin'){
                    echo "此帳號為最高權限";
                }else{
                    ?>
                    <input type="button" value="修改" onclick="javascript:location.href='?do=edit_admin&id=<?=$a['id'];?>'">
                    <button onclick="del('admin',<?=$a['id'];?>)">刪除</button>
                    <?php
                }
            ?>
        </td>
    </tr>
    <?php
        }
    ?>
</table>
<div class="ct"><a href="index.php"><input type="button" value="返回"></a></div>
