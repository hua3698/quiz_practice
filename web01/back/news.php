<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="api/edit.php?table=<?=$do;?>">
        <table width="100%">
            <tbody class="cent">
                <tr class="yel">
                    <td width="80%">最新消息資料內容</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                $per=4;
                $pages=ceil($News->count()/$per);
                $now=(isset($_GET['p']))?$_GET['p']:1;
                $start=($now-1)*$per;
                $news=$News->all(" limit $start,$per");
                foreach($news as $t){
                ?>
                <tr>
                    <td><textarea name="text[]" style="width: 85%;height:50px"><?=$t['text'];?></textarea></td>
                    <td><input type="checkbox" name="sh[]" value="<?=$t['id'];?>" <?=($t['sh']==1)?'checked':'';?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$t['id'];?>"></td>
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
                echo "<a href='?do=news&p=".($now-1)."'><</a>";
            }
            for($i=1;$i<=$pages;$i++){
                $font=($now==$i)?'2rem':'1rem';
                echo "<a href='?do=news&p=".$i."' style='font-size: $font;'>".$i."</a>";
            }
            if($now<$pages){
                echo "<a href='?do=news&p=".($now+1)."'>></a>";
            }
        ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button"
                            onclick="op('#cover','#cvr','./pop/<?=$do;?>.php?table=<?=$do;?>')" value="新增最新消息資料"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>