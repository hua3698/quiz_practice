<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table width="80%" style="margin: auto;text-align:center;">
        <tr>
            <th>編號</th>
            <th>問卷題目</th>
            <th>投票總數</th>
            <th>結果</th>
            <th>狀態</th>
        </tr>
        <?php
        $que = $Que->all(['subject'=>0,'sh'=>1]);
        foreach ($que as $key=> $q) {
        ?>
            <tr>
                <td><?=$key+1;?></td>
                <td><?=$q['que'];?></td>
                <td><?=$q['count'];?></td>
                <td><a href="?do=result&timu=<?=$q['id'];?>">結果</a></td>
                <td>
                    <?php
                    if(!empty($_SESSION['login'])){
                        echo "<a href='?do=vote&timu={$q['id']}'>參與投票</a>";
                    }else{
                        echo "<a href='?do=login'>請先登入</a>";
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</fieldset>