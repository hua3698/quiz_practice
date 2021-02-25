<?php include_once "../base.php"; ?>
<h2 class="cent">編輯次選單</h2>
<hr>
<form action="api/edit_sub.php" method="post" enctype="multipart/form-data">
    <table style="margin:auto">
        <tr>
            <td>次選單名稱：</td>
            <td>次選單連結網址：</td>
            <td>刪除</td>
        </tr>
        <?php
        $sub = $Menu->all(['parent' => $_GET['parent']]);
        foreach ($sub as $s) {
        ?>
            <tr>
                <td><input type="text" name="text[]" value="<?= $s['text']; ?>"></td>
                <td><input type="text" name="href[]" value="<?= $s['href']; ?>"></td>
                <td><input type="checkbox" name="del[]" value="<?= $s['id']; ?>"></td>
                <td><input type="hidden" name="id[]" value="<?= $s['id']; ?>"></td>
            </tr>
        <?php
        }
        ?>
        <tr class="cent mm">
            <td><input type="submit" value="新增"><input type="reset"><input type="button" value="更多次選單" onclick="more()"></td>
            <td><input type="hidden" name="parent" value="<?= $_GET['parent']; ?>"></td>
        </tr>
    </table>
</form>

<script>
    function more() {
        $(".mm").before(`
        <tr>
            <td><input type="text" name="text2[]" value=""></td>
            <td><input type="text" name="href2[]" value=""></td>
            <td></td>
        </tr>
    `)
    }
</script>