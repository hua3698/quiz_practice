<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="api/edit.php?table=<?=$do;?>">
        <table width="100%">
            <tbody class="cent">
                <tr class="yel">
                    <td width="30%">主選單名稱</td>
                    <td width="30%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="5%">顯示</td>
                    <td width="5%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $menu=$Menu->all();
                foreach($menu as $t){
                ?>
                <tr>
                    <td><input type="text" name="text[]" value="<?=$t['text'];?>" style="width:90%"></td>
                    <td><input type="text" name="href[]" value="<?=$t['href'];?>" style="width:90%"></td>
                    <td><?=$Menu->count(['parent'=>$t['id']]);?></td>
                    <td><input type="checkbox" name="sh[]" value="<?=$t['id'];?>" <?=($t['sh']==1)?'checked':'';?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$t['id'];?>"></td>
                    <td><input type="button" value="編輯次選單" onclick="op('#cover','#cvr','./pop/submenu.php?table=<?=$do;?>&id=<?=$t['id'];?>')"></td>
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
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./pop/<?=$do;?>.php?table=<?=$do;?>')" value="新增主選單"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>