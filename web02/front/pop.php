<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table width="80%" style="margin:auto">
        <tr style="text-align: center;">
            <th width="30%">標題</th>
            <th width="40%">內容</th>
            <th width="15%">人氣</th>
            <th width="10%"></th>
        </tr>
        <?php
        $count = $News->count();
        $per = 5;
        $pages = ceil($count / $per);
        $now = (isset($_GET['p'])) ? $_GET['p'] : 1;
        $start = ($now - 1) * $per;

        $news = $News->all(['sh' => 1], " order by good desc limit $start,$per");
        foreach ($news as $n) {
        ?>
            <tr style="text-align: left;">
                <td class="header" style="background-color: #eee;position:relative"><a id="t<?=$n['id'];?>" onclick=""><?=$n['title'];?></a></td>
                <td>
                    <span id="subtitle"><?=mb_substr($n['text'],0,10);?>...</span>
                    <span class="alerr">
                        <h3><?=$n['title'];?></h3>
                        <pre><?=$n['text'];?></pre>
                    </span>
                </td>
                <td><?=$n['good'];?>個人說<img src="img/02B03.jpg" style="width:20px;"></td>
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
        echo "<a href='?do=pop&p=".$i."' style='font-size:$fontsize;'>$i</a>";
    }
    if($now<$pages){
        echo "<a href='?do=pop&p=".($now+1)."'>></a>";
    }
    ?>
</fieldset>
<script>
    $(".header").hover(function(){
        $(this).next().children(".alerr").toggle()
    })

    $(".gd").on("click",function(){
        let id=$(this).attr("id").replace("news",""),text=$(this).text();
        if(text=='讚') $(this).text("收回讚")
        else $(this).text('讚')
        $.get("api/good.php",{id},function(){
            location.reload()
        })
    })
</script>