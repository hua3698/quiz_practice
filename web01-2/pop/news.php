<h2 class="cent">新增動態文字廣告</h2>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <table style="margin:auto">
        <tr>
            <td>動態文字廣告：</td>
            <td><input type="text" name="text" id=""></td>
        </tr>
        <tr>
            <td><input type="submit" value="新增"><input type="reset"></td>
            <td><input type="hidden" name="table" value="<?=$_GET['table'];?>"></td>
        </tr>
    </table>
</form>