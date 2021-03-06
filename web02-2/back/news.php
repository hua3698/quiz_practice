<fieldset>
    <form action="api/b_news.php" method="post">
        <table style="width: 90%; margin:auto" class="ct">
            <tr>
                <th width="15%">編號</th>
                <th width="55%">標題</th>
                <th width="15%">顯示</th>
                <th width="15%">刪除</th>
            </tr>
            <?php
            $per=3;
            $pages=ceil($News->count()/$per);
            $now=$_GET['p']??'1';
            $start=($now-1)*$per;
            $all = $News->all(" limit $start,$per");
            foreach($all as $key=> $a){
            ?>
            <tr>
                <td><?=$key+$start+1;?></td>
                <td><?=$a['title'];?></td>
                <input type="hidden" name="id[]" value="<?=$a['id'];?>">
                <td><input type="checkbox" name="sh[]" value="<?=$a['id'];?>" <?=($a['sh']==1)?'checked':'';?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$a['id'];?>"></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <div class="ct">
            <?php
                if($now>1){
                    echo "<a href='?do=news&p='".($now-1)."><</a>";
                }
                for($i=1;$i<=$pages;$i++){
                    $font=($i==$now)?'2rem':'1rem';
                    echo "<a href='?do=news&p=$i' style='padding:5px;font-size:$font'>$i</a>";
                }
                if($now<$pages){
                    echo "<a href='?do=news&p='".($now+1).">></a>";
                }
            ?>
        </div>
        <div class="ct">
            <input type="submit" value="確定修改">
        </div>
    </form>
</fieldset>