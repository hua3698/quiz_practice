<div style="height:32px; display:block;">
<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    <?php
    $m=$Ad->all(['sh'=>1]);
    foreach($m as $m){
        echo $m['id'].".";
        echo $m['text'];
    }
    ?>
</marquee>
</div>
<!--正中央-->
<script>
    var lin = new Array();
    <?php
    $mvim=$Mvim->all(['sh'=>1]);
    foreach($mvim as $m){
        echo "lin.push('img/{$m['img']}');";
    }
    ?>
    var now = 0;
    ww();
    if (lin.length > 1) {
        setInterval("ww()", 3000);
        now = 1;
    }
    function ww() {
        $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
        //$("#mwww").attr("src",lin[now])
        now++;
        if (now >= lin.length) now = 0;
    }
</script>
<div style="width:100%; padding:2px; height:290px;">
    <div id="mwww" loop="true" style="width:100%; height:100%;">
        <embed src="img/01C05.gif" loop=true style="width:99%; height:100%;">
        <!-- <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div> -->
    </div>
</div>
<div style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
    <span class="t botli">最新消息區
        <?php
        if($News->count(['sh'=>1])>5){
            echo "<span style='float: right;'><a href='?do=news'>More...</a></span>";
        }
        ?>
    </span>
    <ul class="ssaa" style="list-style-type:decimal;">
    <?php
        $per=5;
        $pages=ceil($News->count()/$per);
        $now=(isset($_GET['p']))?$_GET['p']:1;
        $start=($now-1)*$per;
        $news=$News->all(['sh'=>1]," limit 5");
        foreach($news as $t){
            echo "<li>".mb_substr($t['text'],0,10)."<div class='all' style='display:none'>{$t['text']}</div></li>";
        }
    ?>
    </ul>
    <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
    <script>
        $(".ssaa li").hover(
            function() {
                $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
                $("#altt").show()
            }
        )
        $(".ssaa li").mouseout(
            function() {
                $("#altt").hide()
            }
        )
    </script>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
    $(".sswww").hover(
        function() {
            $("#alt").html("" + $(this).children(".all").html() + "").css({
                "top": $(this).offset().top - 50
            })
            $("#alt").show()
        }
    )
    $(".sswww").mouseout(
        function() {
            $("#alt").hide()
        }
    )
</script>