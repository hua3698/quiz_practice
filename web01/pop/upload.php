<?php include_once "../base.php";?>
<h3 class="cent">更新標題區圖片</h3>
<hr>
<form action="api/upload.php" method="post" enctype="multipart/form-data">
    <table style="margin: auto;">
        <tr>
            <td>標題區圖片：</td>
            <td><input type="file" name="img" id=""></td>
        </tr>
        <tr class="cent">
            <td><input type="submit" value="新增"><input type="reset"></td>
            <td><input type="hidden" name="table" value="<?=$_GET['table'];?>"></td>
            <td><input type="hidden" name="id" value="<?=$_GET['id'];?>"></td>
        </tr>
    </table>
</form>