<h2 class="cent">新增管理者帳號</h2>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <table style="margin:auto">
        <tr>
            <td>帳號：</td>
            <td><input type="text" name="acc" id=""></td>
        </tr>
        <tr>
            <td>密碼：</td>
            <td><input type="text" name="pw" id=""></td>
        </tr>
        <tr>
            <td>確認密碼：</td>
            <td><input type="text" name="pw2" id=""></td>
        </tr>
        <tr>
            <td><input type="submit" value="新增"><input type="reset"></td>
            <td><input type="hidden" name="table" value="<?=$_GET['table'];?>"></td>
        </tr>
    </table>
</form>