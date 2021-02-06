<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table width="80%">
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td></td>
        </tr>
        <?php
        $per = 5;
        $pages = ceil(($News->count()) / $per);
        $now = (isset($_GET['p'])) ? $_GET['p'] : 1;
        $start = ($now - 1) * $per;
        $news = $News->all();
        foreach ($news as $n) {
        ?>
            <tr>
                <td class="header" style="background:#eee;"><?= $n['title']; ?></td>
                <td>
                    <span><?= mb_substr($n['text'], 0, 10); ?></span>
                    <span style="display:none"><?= $n['text']; ?></span>
                </td>
                <td>

                    <?php
                    if (isset($_SESSION['login'])) {
                        $chk = $Log->count(['acc' => $_SESSION['login'], 'news' => $n['id']]);
                        if ($chk) {
                            echo "<a href='#' class='gd' id='{$n['id']}'>收回讚</a>";
                        } else {
                            echo "<a href='#' class='gd' id='{$n['id']}'>讚</a>";
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</fieldset>

<script>
    $(".gd").on("click", function() {
        let word = $(this).html();
        let id = $(this).attr("id");
        if (word == '讚') $(this).text("收回讚");
        else $(this).text("讚")
        $.post("api/good.php",{id})
    })

    $(".header").on("click", function() {
        $(this).next().children("span").toggle()
    })
</script>