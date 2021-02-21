<?php include_once "../base.php";?>
<h3 class="cent">新增校園映像資料圖片</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <table style="margin: auto;">
        <tr>
            <td>校園映像資料圖片：</td>
            <td><input type="file" name="img" id=""></td>
        </tr>
        <tr class="cent">
            <td><input type="submit" value="新增"><input type="reset"></td>
            <td><input type="hidden" name="table" value="<?=$_GET['table'];?>"></td>
        </tr>
    </table>
</form>