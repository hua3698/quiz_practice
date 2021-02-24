<?php
$str=[1=>'標題區圖片',2=>'動畫圖片',3=>'校園印象資料圖片'];
?>
<h2 class="cent">更新<?=$str[$_GET['str']];?></h2>
<hr>
<form action="api/upload.php" method="post" enctype="multipart/form-data">
    <table style="margin:auto">
        <tr>
            <td>圖片：</td>
            <td><input type="file" name="img" id=""></td>
        </tr>
        <tr>
            <td><input type="submit" value="新增"><input type="reset"></td>
            <td><input type="hidden" name="table" value="<?=$_GET['table'];?>"></td>
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        </tr>
    </table>
</form>