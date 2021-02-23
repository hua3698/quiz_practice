<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動畫圖片管理</p>
    <form method="post" action="api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="55%">動畫圖片</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                    $all=$Mvim->all();
                    foreach($all as $a){
                        ?>
                        <tr class="cent">
                            <td><img src="img/<?=$a['img'];?>" style="width:150px;height:60px"></td>
                            <td><input type="checkbox" name="sh[]" value="<?=$a['id'];?>" <?=($a['sh']==1)?'checked':'';?>></td>
                            <td><input type="checkbox" name="del[]" value="<?=$a['id'];?>"></td>
                            <td><input type="button" value="更新動畫" onclick="op('#cover','#cvr','pop/upload.php?table=<?=$do;?>&id=<?=$a['id'];?>&str=1')"></td>
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
                            onclick="op('#cover','#cvr','pop/<?=$do;?>.php?table=<?=$do;?>')" value="新增動畫圖片">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>