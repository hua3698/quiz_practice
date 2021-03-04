<input class="ct" type="button" value="新增管理員" onclick="lof('?do=add_admin')">
<table class="all ct">
    <tr class="tt">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php
    $all = $Admin->all();
    foreach ($all as $a) {
    ?>
        <tr class="pp">
            <td><?= $a['acc']; ?></td>
            <td><?= str_repeat("*", strlen($a['pw'])); ?></td>
            <td>
                <?php
                if ($a['acc'] == 'admin') echo "此帳號為最高權限";
                else {
                ?>
                    <input type="button" value="修改" onclick="lof('?do=edit_admin&id=<?= $a['id']; ?>')">
                    <input type="button" value="刪除" onclick="del(<?= $a['id']; ?>)">
                <?php
                }
                ?>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><input type="button" value="返回" onclick="lof('index.php')"></div>
<script>
    function del(id) {
        $.post("api/del.php?db=admin", {
            id
        }, function() {
            location.href = "?do=admin";
        })
    }
</script>