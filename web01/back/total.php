<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">進站總人數管理</p>
    <form method="post" action="api/edit.php?table=<?=$do;?>">
        <table width="60%" style="margin: auto;">
            <tbody class="cent">
                <?php
                $total=$Total->find(1)['total'];
                ?>
                <tr>
                    <td class="yel" width="45%">進站總人數</td>
                    <td><input type="number" name="total" value="<?=$total;?>" style="width:100%"></td>
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