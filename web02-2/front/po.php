<h4>目前位置：首頁 > 分類網誌 > <span id="t"></span></h4>
<div style="display: flex; justify-content:center">
<fieldset style=" width:20%">
    <legend>分類網誌</legend>
    <div><a href="#" id="t1" onclick="get_title(1)">健康新知</a></div>
    <div><a href="#" id="t2" onclick="get_title(2)">菸害防治</a></div>
    <div><a href="#" id="t3" onclick="get_title(3)">癌症防治</a></div>
    <div><a href="#" id="t4" onclick="get_title(4)">慢性病防治</a></div>
</fieldset>
<fieldset style=" width:60%">
    <legend>文章列表</legend>
    <div class="art"></div>
</fieldset>
</div>

<script>
    get_title(1);
    function get_title(id){
        let tt=$(`#t${id}`).html()
        let type=id;
        $("#t").html(tt)
        $.post("api/f_po.php?do=title",{type},function(r){
            $(".art").html(r);
        })
    }
    function get_text(id){
        $.post("api/f_po.php?do=text",{id},function(r){
            $(".art").html(r);
        })
    }
</script>