<fieldset>
    <form action="api/b_po.php" method="POST">
        <table width="80%" style="text-align:center;margin:auto">
            <tr>
                <td width="15%">編號</td>
                <td width="55%">標題</td>
                <td width="15%">顯示</td>
                <td width="15%">刪除</td>
            </tr>
            <?php
            $per=3;
            $pages=ceil(($News->count())/$per);
            $now=(isset($_GET['p']))?$_GET['p']:1;
            $start=($now-1)*$per;
            $news = $News->all(" limit $start,$per");
            foreach ($news as $key=> $n) {
            ?>
                <tr>
                    <td><?= $key+$start+1; ?></td>
                    <td><?= $n['title']; ?></td>
                    <td><input type="checkbox" name="sh[]" value="<?= $n['id']; ?>" <?=($n['sh']=='1')?'checked':'';?>></td>
                    <td><input type="checkbox" name="del[]" value="<?= $n['id']; ?>"></td>
                    <input type="hidden" name="id" value="<?= $n['id']; ?>">
                </tr>
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
                $fontsize=($i==$now)?'2rem':'1rem';
                echo "<a href='?do=po&p=$i' style='font-size:$fontsize'>$i</a>";
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
</fieldset>