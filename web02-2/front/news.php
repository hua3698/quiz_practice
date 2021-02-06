<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table width="100%">
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
            <th width="10%"></th>
            
        </tr>
        <?php
        $per = 5;
        $pages = ceil(($News->count()) / $per);
        $now = (isset($_GET['p'])) ? $_GET['p'] : 1;
        $start = ($now - 1) * $per;
        $news = $News->all(" limit $start,$per");
        foreach ($news as $n) {
        ?>
            <tr>
                <td class="header" style="background:#eee"><?= $n['title']; ?></td>
                <td>
                    <span><?= mb_substr($n['text'], 0, 15); ?>...</span>
                    <span class="art" style="display:none"><?= $n['text']; ?></span>
                </td>
                <td>
                <?php
                if(isset($_SESSION['login'])){
                    $chk=$Log->count(['news'=>$n['id'],'acc'=>$_SESSION['login']]);
                    if($chk) echo "<a href='#' id='{$n['id']}' onclick='good(this)'>收回讚</a>";
                    else echo "<a href='#' id='{$n['id']}' onclick='good(this)'>讚</a>";
                }
                ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        if ($now > 1) {
            echo "<a href='?do=news&p=" . ($now - 1) . "'><</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($i == $now) ? '2rem' : '1rem';
            echo "<a href='?do=news&p=$i' style='font-size:$fontsize'>$i</a>";
        }
        if ($now < $pages) {
            echo "<a href='?do=news&p=" . ($now + 1) . "'>></a>";
        }
        ?>
    </div>
</fieldset>

<script>
$(".header").on("click",function(){
    $(this).next().children(".art").toggle()
})

function good(w){
    let word=$(w).html()
    let id=$(w).attr('id')
    if(word=='讚') $(w).html("收回讚")
    else $(w).html("讚")
    $.get("api/good.php",{id})
}

</script>