<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table style="width: 90%; margin:auto" class="ct">
        <tr>
            <th width="10%">編號</th>
            <th width="55%">問卷題目</th>
            <th width="15%">投票總數</th>
            <th width="10%">結果</th>
            <th>狀態</th>
        </tr>
        <?php
        $all = $Que->all(['parent'=>0]);
        foreach ($all as $key => $a) {
        ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $a['que']; ?></td>
                <td><?= $a['count']; ?></td>
                <td><a href="?do=result&id=<?=$a['id'];?>">結果</a></td>
                <td>
                    <?php
                    if (!empty($_SESSION['login'])) {
                        echo "<a href='?do=vote&id={$a['id']}'>參與投票</a>";
                    } else {
                        echo "請先登入";
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</fieldset>
