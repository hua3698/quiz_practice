<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">最新消息資料</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                $per = 4;
                $pages = ceil($News->count() / $per);
                $now = (isset($_GET['p'])) ? $_GET['p'] : 1;
                $start = ($now - 1) * $per;
                $all = $News->all(" limit $start,$per");
                foreach ($all as $a) {
                ?>
                    <tr>
                        <td><textarea name="text[]" style="width: 95%;height:50px"><?= $a['text']; ?></textarea></td>
                        <td><input type="checkbox" name="sh[]" value="<?= $a['id']; ?>" <?= ($a['sh'] == 1) ? 'checked' : ''; ?>></td>
                        <td><input type="checkbox" name="del[]" value="<?= $a['id']; ?>"></td>
                        <td><input type="hidden" name="id[]" value="<?= $a['id']; ?>"></td>
                        <td><input type="hidden" name="table" value="<?= $do; ?>"></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="cent">
            <?php
                if($now>1){
                    ?>
                    <a href="?do=news&p=<?=($now-1);?>"><</a>
                    <?php
                }
                for($i=1;$i<=$pages;$i++){
                    $font=($i==$now)?'2rem':'1rem';
                    ?>
                    <a href="?do=news&p=<?=$i;?>" style="padding:5px;font-size:<?=$font;?>"><?=$i;?></a>
                    <?php
                }
                if($now<$pages){
                    ?>
                    <a href="?do=news&p=<?=($now+1);?>">></a>
                    <?php
                }
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','pop/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增最新消息資料">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>