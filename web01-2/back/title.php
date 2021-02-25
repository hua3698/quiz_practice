<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站標題管理</p>
    <form method="post" target="back" action="?do=tii">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $all=$Title->all();
                foreach($all as $a){
                    ?>
                    <tr>
                        <td><img src="img/<?=$a['img'];?>" style="width:300px;height:30px"></td>
                        <td><input type="text" name="text[]" value="<?=$a['text'];?>"></td>
                        <td><input type="radio" name="sh" value="<?=$a['id'];?>" <?=($a['sh']==1)?'checked':'';?>></td>
                        <td><input type="checkbox" name="del[]" value="<?=$a['id'];?>"></td>
                        <td><input type="button" value="更新圖片" onclick="op('#cover','#cvr','pop/upload.php?t=1&id=<?=$a['id'];?>')"></td>
                        <input type="hidden" name="id[]" value="<?=$a['id'];?>">
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
                            onclick="op('#cover','#cvr','pop/<?=$do;?>.php?table=<?=$do;?>')" value="新增網站標題圖片">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>