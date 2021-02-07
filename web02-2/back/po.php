    <button><a href="?do=po_add">新增文章</a></button>
    <form action="api/b_po.php" method="POST">
        <table width="80%" style="margin: auto;text-align:center">
            <tr>
                <th>編號</th>
                <th>標題</th>
                <th>顯示</th>
                <th>刪除</th>
            </tr>
            <?php
            $per=3;
            $pages=ceil($News->count()/$per);
            $now=(isset($_GET['p']))?$_GET['p']:1;
            $start=($now-1)*$per;
            $news=$News->all(" limit $start,$per");
            foreach($news as $key=> $n){
            ?>
            <tr>
                <td><?=$key+$start+1;?></td>
                <td><?=$n['title'];?></td>
                <td><input type="checkbox" name="sh[]" value="<?=$n['id'];?>" <?=($n['sh']==1)?'checked':'';?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$n['id'];?>"></td>
            </tr>
            <input type="hidden" name="id[]" value="<?=$n['id'];?>">
            <?php
        }
    ?>
    
        </table>
        <div class="ct">
            <?php
            if($now>1){
                echo "<a href='?do=po&p=".($now-1)."'><</a>";
            }
            for($i=1;$i<=$pages;$i++){
                $font=($i==$now)?'2rem':'1rem';
                echo "<a href='?do=po&p=$i' style='font-size:$font'>$i</a>";
            }
            if($now<$pages){
                echo "<a href='?do=po&p=".($now+1)."'>></a>";
            }
            ?>
        </div>
        <div class="ct">
            <input type="submit" value="確定修改">
        </div>
    </form>