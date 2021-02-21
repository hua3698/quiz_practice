<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="api/edit.php?table=<?=$do;?>">
        <table width="100%">
            <tbody class="cent">
                <tr class="yel">
                    <td width="40%">校園映像資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $per=3;
                $pages=ceil($Image->count()/$per);
                $now=(isset($_GET['p']))?$_GET['p']:1;
                $start=($now-1)*$per;
                $image=$Image->all(" limit $start,$per");
                foreach($image as $t){
                ?>
                <tr>
                    <td><img src="img/<?=$t['img'];?>" style="width:100px;height:68px;"></td>
                    <td><input type="checkbox" name="sh[]" value="<?=$t['id'];?>" <?=($t['sh']==1)?'checked':'';?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$t['id'];?>"></td>
                    <td><input type="button" value="更新圖片" onclick="op('#cover','#cvr','./pop/upload.php?table=<?=$do;?>&id=<?=$t['id'];?>')"></td>
                    <input type="hidden" name="id[]" value="<?=$t['id'];?>">
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="cent">
        <?php
            if($now>1){
                echo "<a href='?do=image&p=($now-1)'><</a>";
            }
            for($i=1;$i<=$pages;$i++){
                $font=($now==$i)?'2rem':'1rem';
                echo "<a href='?do=image&p=".$i."' style='font-size: $font;'>".$i."</a>";
            }
            if($now<$pages){
                echo "<a href='?do=image&p=".($now+1)."'>></a>";
            }
        ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./pop/<?=$do;?>.php?table=<?=$do;?>')" value="新增校園映像資料圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>