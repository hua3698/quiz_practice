<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動態文字廣告管理</p>
    <form method="post" action="api/edit.php?table=<?=$do;?>">
        <table width="100%">
            <tbody class="cent">
                <tr class="yel">
                    <td width="80%">動態文字廣告</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                $ad=$Ad->all();
                foreach($ad as $t){
                ?>
                <tr>
                    <td><input type="text" name="text[]" value="<?=$t['text'];?>" style="width: 95%;"></td>
                    <td><input type="checkbox" name="sh[]" value="<?=$t['id'];?>" <?=($t['sh']==1)?'checked':'';?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$t['id'];?>"></td>
                    <input type="hidden" name="id[]" value="<?=$t['id'];?>">
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./pop/<?=$do;?>.php?table=<?=$do;?>')" value="新增動態文字廣告"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>