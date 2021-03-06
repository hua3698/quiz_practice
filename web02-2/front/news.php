<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table style="width: 90%; margin:auto" class="ct">
        <tr>
            <th width="40%">標題</th>
            <th width="40%">內容</th>
            <th></th>
        </tr>
        <?php
        $per = 5;
        $pages = ceil($News->count() / $per);
        $now = $_GET['p'] ?? '1';
        $start = ($now - 1) * $per;
        $all = $News->all(['sh'=>1]," limit $start,$per");
        foreach ($all as $key => $a) {
        ?>
            <tr>
                <td class="ar" style="background:#eee;padding:10px"><?= $a['title']; ?></td>
                <td>
                    <span><?= mb_substr($a['text'],0,10); ?>...</span>
                    <span style="display: none;"><pre><?= $a['text']; ?></pre></span>
                </td>
                <td>
                    <?php
                    if(!empty($_SESSION['login'])){
                        $chk=$Log->find(['acc'=>$_SESSION['login'],'news'=>$a['id']]);
                        if($chk){
                            echo "<a id='t{$a['id']}' class='gd' href='#'>收回讚</a>";
                        }else{
                            echo "<a id='t{$a['id']}' class='gd' href='#'>讚</a>";
                        }
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
            echo "<a href='?do=news&p='" . ($now - 1) . "><</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $font = ($i == $now) ? '2rem' : '1rem';
            echo "<a href='?do=news&p=$i' style='padding:5px;font-size:$font'>$i</a>";
        }
        if ($now < $pages) {
            echo "<a href='?do=news&p='" . ($now + 1) . ">></a>";
        }
        ?>
    </div>
</fieldset>

<script>
    $(".ar").on("click",function(){
        $(this).next().children("span").toggle();
    })

    $(".gd").on("click",function(){
        let id=$(this).attr("id").replace("t",'');
        $.post("api/f_news.php",{id},function(){
            location.reload();
        })
    })
</script>