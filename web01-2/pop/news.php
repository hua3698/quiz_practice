<h2 class="cent">新增最新資料</h2>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <table style="margin:auto">
        <tr>
            <td>最新資料：</td>
            <td><textarea name="text" style="width: 95%;height:50px"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="新增"><input type="reset"></td>
            <td><input type="hidden" name="table" value="<?=$_GET['table'];?>"></td>
        </tr>
    </table>
</form>