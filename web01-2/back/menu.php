<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="30%">主選單名稱</td>
                    <td width="30%">主選單連結網址</td>
                    <td width="15%">次選單數</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                    $all=$Menu->all(['parent'=>0]);
                    foreach($all as $a){
                        ?>
                        <tr class="cent">
                            <td><input type="text" name="text[]" value="<?=$a['text'];?>"></td>
                            <td><input type="text" name="href[]" value="<?=$a['href'];?>"></td>
                            <td><?=$Menu->count(['parent'=>$a['id']]);?></td>
                            <td><input type="checkbox" name="sh[]" value="<?=$a['id'];?>" <?=($a['sh']==1)?'checked':'';?>></td>
                            <td><input type="checkbox" name="del[]" value="<?=$a['id'];?>"></td>
                            <td><input type="button" value="編輯次選單" onclick="op('#cover','#cvr','pop/edit_sub.php?parent=<?=$a['id'];?>')"></td>
                            <td><input type="hidden" name="table" value="<?=$do;?>"></td>
                            <td><input type="hidden" name="id[]" value="<?=$a['id'];?>"></td>
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
                            onclick="op('#cover','#cvr','pop/<?=$do;?>.php?table=<?=$do;?>')" value="新增主選單">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>