<div>目前位置：首頁 > 分類網誌 > <span id="tt">健康新知</span></div>
<div style="display: flex;justify-content:center;margin:20px 0;">
    <fieldset style="width: 20%;">
        <legend>分類網誌</legend>
        <div><a type="button" id="t1" onclick="nav(this)">健康新知</a></div>
        <div><a type="button" id="t2" onclick="nav(this)">菸害防制</a></div>
        <div><a type="button" id="t3" onclick="nav(this)">癌症防治</a></div>
        <div><a type="button" id="t4" onclick="nav(this)">慢性病防治</a></div>
    </fieldset>

    <fieldset style="width: 60%;">
        <legend>文章列表</legend>
        <div class="ti"></div>
    </fieldset>
</div>

<script>
    getTitle(1);
    function nav(tt){
        let tit=$(tt).text();
        $("#tt").text(tit)
        let type=$(tt).attr("id").replace("t","");
        getTitle(type)
    }
    function getTitle(type){
        $.get("api/f_po.php",{case:1,type},function(re){
            $(".ti").html(re)
        })
    }
    function getNews(id){
        $.get("api/f_po.php",{case:2,id},function(r){
            $(".ti").html(r)
        })
    }
</script>