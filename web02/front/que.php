<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table width="100%" style="margin: auto;text-align:center">
        <tr>
            <th width="10%">編號</th>
            <th width="60%">問卷題目</th>
            <th width="10%">投票總數</th>
            <th width="10%">結果</th>
            <th width="10%">狀態</th>
        </tr>
        <?php
        $que=$Que->all(['subject'=>0]);
        foreach($que as $key => $q){
        ?>
        <tr>
            <td><?=$key+1;?></td>
            <td><?=$q['que'];?></td>
            <td><?=$q['count'];?></td>
            <td><a href="?do=result&id=<?=$q['id'];?>">結果</a></td>
            <td>
                <?php
                if(!empty($_SESSION['login'])) echo "<a href='?do=vote&id=".$q['id']."'>參與投票</a>";
                else echo "請先登入";
                ?>
            </td>
            
        </tr>
        <?php
        }
        ?>
    </table>
</fieldset>