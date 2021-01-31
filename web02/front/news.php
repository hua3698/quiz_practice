<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table width="80%" style="margin:auto">
        <tr style="text-align: center;">
            <th width="30%">標題</th>
            <th width="60%">內容</th>
            <th width="10%"></th>
        </tr>
        <?php
        $count = $News->count();
        $per = 5;
        $pages = ceil($count / $per);
        $now = (isset($_GET['p'])) ? $_GET['p'] : 1;
        $start = ($now - 1) * $per;

        $news = $News->all(['sh' => 1], " limit $start,$per");
        foreach ($news as $n) {
        ?>
            <tr style="text-align: left;">
                <td class="header" style="background-color: #eee;"><a id="t<?=$n['id'];?>" onclick=""><?=$n['title'];?></a></td>
                <td>
                    <span><?=mb_substr($n['text'],0,10);?>...</span>
                    <span id="text" style="display:none"><pre><?=$n['text'];?></pre></span>
                </td>
                <td>
                    <?php
                    if(!empty($_SESSION['login'])){
                        $chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$n['id']]);
                        if($chk){
                            ?>
                            <a href="#" class="gd" id="news<?=$n['id'];?>">收回讚</a>
                            <?php
                        }else{
                            ?>
                            <a href="#" class="gd" id="news<?=$n['id'];?>">讚</a>
                            <?php
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
    if($now>1){
        echo "<a href='?do=news&p=".($now-1)."'><</a>";
    }
    for($i=1;$i<=$pages;$i++){
        $fontsize=($i==$now)?"2rem":"1rem";
        echo "<a href='?do=news&p=".$i."' style='font-size:$fontsize;'>$i</a>";
    }
    if($now<$pages){
        echo "<a href='?do=news&p=".($now+1)."'>></a>";
    }
    ?>
</fieldset>

<script>
    $(".header").on("click",function(){
        $(this).next().children('#text').toggle()
    })

    $(".gd").on("click",function(){
        let id=$(this).attr("id").replace("news",""),text=$(this).text();
        if(text=='讚') $(this).text("收回讚")
        else $(this).text('讚')
        $.get("api/good.php",{id})
    })
</script>