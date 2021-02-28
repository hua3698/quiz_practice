// JavaScript Document
function lof(x)
{
	location.href=x
}
function del(table,id){
	console.log(table);
	$.post("api/del.php",{table,id},function(){
		location.reload();
	})
}