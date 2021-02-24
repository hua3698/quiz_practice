<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">管理者帳號管理</p>
    <form method="post" action="api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">帳號</td>
                    <td width="45%">密碼</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                    $all=$Admin->all(" where `acc` not in ('admin')");
                    foreach($all as $a){
                        ?>
                        <tr>
                            <td><input type="text" name="acc[]" value="<?=$a['acc'];?>" style="width: 95%;"></td>
                            <td><input type="text" name="pw[]" value="<?=$a['pw'];?>" style="width: 95%;"></td>
                            <td><input type="checkbox" name="del[]" value="<?=$a['id'];?>"></td>
                            <td><input type="hidden" name="id[]" value="<?=$a['id'];?>"></td>
                            <td><input type="hidden" name="table" value="<?=$do;?>"></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button"
                            onclick="op('#cover','#cvr','pop/<?=$do;?>.php?table=<?=$do;?>')" value="新增管理者帳號">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>