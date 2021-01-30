
<fieldset>
    <form action="api/b_news.php" method="post">
        <table style="width: 90%; margin:auto;text-align:center">
            <tr>
                <th width="20%">編號</th>
                <th width="40%">標題</th>
                <th width="20%">顯示</th>
                <th width="20%">刪除</th>
            </tr>
            <?php
            $count=$News->count();
            $per=3;
            $pages=ceil($count/$per);
            $now=(isset($_GET['p']))?$_GET['p']:1;
            $start=($now-1)*$per;

            $news=$News->all(" limit $start,$per");
            foreach($news as $id => $n){
            $checked=($n['sh']==1)?"checked":"";
                ?>
            <tr>
                <td style="background-color: #eee;"><?=$start+$id+1;?></td>
                <td><?=$n['title'];?></td>
                <td><input type="checkbox" name="sh[]" value="<?=$n['id'];?>" <?=$checked;?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$n['id'];?>"></td>
                <input type="hidden" name="id[]" value="<?=$n['id'];?>">
            </tr>
        <?php
        }
        ?>
        </table>
        
        <div class="ct">
            
            <?php
            if($now>1){
                echo "<a href='backend.php?do=news&p=".($now-1)."'><</a>";
            }
            for($i=1;$i<=$pages;$i++){
                $fontsize=($i==$now)?"2rem":"1rem";
                echo "<a href='backend.php?do=news&p=".$i."' style='font-size:$fontsize;'>$i</a>";
            }
            if($now<$pages){
                echo "<a href='backend.php?do=news&p=".($now+1)."'>></a>";
            }
            ?>
        </div>
        <div class="ct">
        <input type="submit" value="確定修改">
        </div>
    </form>
</fieldset>