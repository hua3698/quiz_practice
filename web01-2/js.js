// JavaScript Document
$(document).ready(function(e) {
    $(".mainmu").mouseover(
		function()
		{
			$(this).find(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function ()
		{
			$(this).find(".mw").hide()
		}
	)
});
function lo(x)
{
	location.replace(x)
}
function op(x,y,url)
{
	$(x).fadeIn()
	if(y)
	$(y).fadeIn()
	if(y&&url)
	$(y).load(url)
}
function cl(x)
{
	$(x).fadeOut();
}