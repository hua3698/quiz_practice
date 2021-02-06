<p>目前位置：首頁 > 分類網誌 > <span id="fun">健康新知</span></p>
<div style="display: flex; width:80%; margin:auto;justify-content:center">
    <fieldset style="width: 20%;padding:20px;">
        <legend>分類網誌</legend>
        <div><a href="#" id="t1" onclick="article(this)">健康新知</a></div>
        <div><a href="#" id="t2" onclick="article(this)">菸害防治</a></div>
        <div><a href="#" id="t3" onclick="article(this)">癌症防治</a></div>
        <div><a href="#" id="t4" onclick="article(this)">慢性病防治</a></div>
    </fieldset>
    <fieldset style="width: 60%;padding:30px">
        <legend>文章列表</legend>
        <div id="art">
            
        </div>
    </fieldset>
</div>

<script>
    getarti(1)
    function article(a){
        let fun=$(a).html();
        $("#fun").html(fun)
        let id=$(a).attr("id").replace("t","");
        getarti(id);
    }

    function getarti(num){
        $.get("api/f_po.php",{case:1,num},function(re){
            $("#art").html(re)
        })
    }
    function getNews(id){
        $.get("api/f_po.php",{case:2,id},function(r){
            $("#art").html(r)
        })
    }
</script>