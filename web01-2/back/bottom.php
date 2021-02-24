<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post" action="api/edit.php">
        <table width="50%" style="margin:auto">
            <tbody>
            <?php
            $all=$Bottom->find(1);
            ?>
                <tr>
                    <td class="yel" width="50%">頁尾版權資料</td>
                    <td><input type="text" name="bottom" value="<?=$all['bottom'];?>"></td>
                    <td><input type="hidden" name="table" value="<?=$do;?>"></td>
                    <td><input type="hidden" name="id[]" value="1"></td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>