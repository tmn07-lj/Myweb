$(function(){
	$('.view-comments').css({'min-height': $(window).height()});
	$('#check_button').bind("click",function(){
		$.post(window.location.href,{
			"db_host":$("#db_host").val(),
			"db_user":$("#db_user").val(),
			"db_pwd":$("#db_pwd").val(),
			"ceshi":1
		},function(data){
			alert(data);
		})
	})
	$('#install_button').bind("click",function(){

		$.post("../php/mysql_init.php",{
			"db_host":$("#db_host").val(),
			"db_user":$("#db_user").val(),
			"db_pwd":$("#db_pwd").val(),
			"db_name":$("#db_name").val(),
			"submit":1
		},function(data,status){
			alert(data+"若不能跳转请手动回到首页");
			window.location.href="../";
		})

})
})