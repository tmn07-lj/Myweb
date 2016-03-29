

// 各种侧边栏
$(function() {
	$('#dowebok').simplerSidebar({
		opener: '.toggle-sidebar',
		sidebar: {
			align: 'left',
			width: 200
		}
	});
		$('#ce2').simplerSidebar({
		opener: '#ce2opener',
		sidebar: {
			align: 'left',
			width: 200
		}
	});
	$('#ce3').simplerSidebar({
		opener: '#ce3opener',
		sidebar: {
			align: 'left',
			width: 200
		}
	});
	$('#ce4').simplerSidebar({
		opener: '.ce4opener',
		sidebar: {
			align: 'left',
			width: 200
		}
	});
  $('#ce5').simplerSidebar({
    opener: '.selfopener',
    sidebar: {
      align: 'left',
      width: 200
    }
  });


});

$(function() {
	//$('.panel').css({'height': $(window).height()});
	$('.gray-section').css({'height': $(window).height()});
	$('.commit-div').css({'height': $(window).height()});
	$('.green-section').css({'height': $(window).height()-80});
	$('#banner').css({'height': $(window).height()});
	$('.main-view').css({'min-height': $(window).height()-50});
	$('.view-comments').css({'min-height': $(window).height()-50});
	$.scrollify({
		section: '.panel',
		scrollbars: false
	});
});
// 评论功能
       KindEditor.ready(function(K) {//评论表单提交。
               window.editor = K.create('.editor_id');

               
               $("#comform .submit").bind("click",function(){
               	var subject = $(".main-subject").html();
               	var comment = editor.html();
                var name = $("#comform [name ='name']").val();

                comment=comment.replace(/\n/g,'');
                name = name.replace(/\n/g,'');
                 if(  Trim (comment)==""||Trim(name)=="")
                  {
                 alert('不能为空！');
                  } 
              else{
                $.post("php/ajax/comajax.php",{
                    "submit":1,
                    "subject" :subject,
                    "name":name,
                    "comment":comment
                  },function(data){//这里。。。没必要用json返回其实吧。。


                    $(".abs .commited").html($("#comform [name ='name']").val()+"提交了评论："+
                            editor.html());
                  
                    editor.html("");
                  })
                }
            })
       });      
// 登陆时的表单验证，，，，需改进
function check(){
	var username = $(".logform:eq(1) :input:eq(0)").val();
	var password1 = $(".logform:eq(1) :input:eq(1)").val();
	var password2 = $(".logform:eq(1) :input:eq(2)").val();
	if(username.length == 0 ||password1.length==0||password2.length==0){
		alert("不能为空！");
	}
	else{
		if(password2!=password1){
			alert("两次密码不同！");
		}
	}
}

function Trim(str) {
     for (var i=0; (str.charAt(i)==' ') && i<str.length; i++);
     if (i == str.length) return ''; //whole string is space
     var newstr = str.substr(i);
     for (var i=newstr.length-1; newstr.charAt(i)==' ' && i>=0; i--);
     newstr = newstr.substr(0,i+1);
     return newstr;
} 

$(function(){
$(".logicon").bind("click",function(){
  $(".log:eq(0)").css({"display":"none"});
    $(".log:eq(1)").css({"display":"none"});
})
	// 登陆时的显示
$("#login").bind("click",function(){
	$(".log:eq(0)").css({"display":"block"});
  $(".log:eq(1)").css({"display":"none"});
})

//注册时的显示。。
$("#register").bind("click",function(){
	$(".log:eq(1)").css({"display":"block"});
    $(".log:eq(0)").css({"display":"none"});

})

//跳转到view.php.....
$("#ce3opener").bind("click",function(){

	$.post("php/ajax/ran_ajax.php",function(data){
		var obj = JSON.parse(data);
		$("#random a").attr("href","view.php?id="+obj.id);
	})


	$(".view a").attr("href","view.php?id="+$(".main-subject").attr("id"));
})


// 修改操作
$("#xiugai").bind("click",function(){
	$("#xiugai").css({"display":"none"});
    $(".addbutton").css({"display":"none"});
  var wriname = $(".username").html();
  if(wriname != $(".logname").html()&&$("#pri").val()!=1)
  {
    alert("无修改权限");
  }
  else{
    var id = $(".main-subject").attr("id");
  var sub =$(".main-subject").html();
  var cla = $(".post-sub a").attr("id");
  //var clanum = $("#catnav a:last").attr("id");
  var body = $(".main-entry").html();


  var list ="<select name = 'cat'>";

   $.post("php/ajax/catview_ajax.php",function(data){
      var obj = JSON.parse(data);
      for(var i=1 ;i<=obj.num;i++)
      {
        if(typeof(obj[i])=="undefined") continue;
        list+= "<option value = "+i;
        if(i == cla){
          list+=" selected";
        }
        list+=">"+obj[i]+"</option>";
      }
      list+="</select>";
      // alert(list);
      $(".post-sub").html(list);
   })

  // for (var i = 0 ; i < 19; i++) {
  //   if($("#catnav a:eq("+i+")").html()=="")
  //   {
  //     continue;
  //   }
  //   list += "<option value = "+i;
  //   if(i == cla){
  //     list += " selected";
  //   }
  //   list +=">"+$("#catnav a:eq("+i+")").html()+"</option>";
  // };
  // list += "</select>"
  // $(".post-sub").html(list);



  $(".main-subject").html("<input type = 'text' name = 'subject' value = '"+sub+"'>");
  $(".main-subject").attr("href","#1");

  $(".main-entry").html('<textarea class="editor_id_xiugai" name="content" style="width:700px;height:300px;"></textarea>');
  $(".icon-group").css({"display":"none"});
       KindEditor.ready(function(K) {//评论表单提交。
               editor_xiugai = K.create('.editor_id_xiugai');
               editor_xiugai.html(body);

})
       $(".ke-container:eq(0)").css({"margin": "auto"});
       if($('.xgbutton').length==0){
        $("#xiugaiform").append("<p></p><input type='button' class='xgbutton' value = 'submit' name = 'xiugai'>");
       }
        else
      {
        $(".xgbutton").css("display","inline-block");
      }
       
 
       $("#xiugaiform .xgbutton").unbind("click").bind("click",function(){

    var sub = $("#xiugaiform [name = 'subject']").val();

    var body = editor_xiugai.html();
                sub=sub.replace(/\n/g,'');
                body = body.replace(/\n/g,'');
                 if(  Trim (sub)==""||Trim(body)=="")
                  {
                 alert('不能为空！');
                  } 

                  else{
            $.post("php/ajax/xiugai_ajax.php",{
                    "submit":1,
                  "yuan":id,
                  "subject":sub,
                  "cat_id":$("#xiugaiform [name = 'cat']").val(),
                  "body":body
                  },function(data){
                    //alert(data);
                    alert("修改成功");
                  })
                  }

})
  }
	
})
//添加操作
$("#add").bind("click",function(){
	$(".xgbutton").css({"display":"none"});
	$("#xiugai").css({"display":"none"});

	$(".main-subject").html("<input type = 'text' name = 'subject' >");
  $(".main-subject").attr("href","#1");
	//var clanum = $("#catnav a:last").attr("id");
	 var list ="<select name = 'cat'>";

   $.post("php/ajax/catview_ajax.php",function(data){
      var obj = JSON.parse(data);
      for(var i=1 ;i<=obj.num;i++)
      {
        if(typeof(obj[i])=="undefined") continue;
        list+= "<option value = "+i+">"+obj[i]+"</option>";
      }
      list+="</select>";
      // alert(list);
      $(".post-sub").html(list);
   })
	// for (var i = 0 ; i <19 ; i++) {
 //    if($("#catnav a:eq("+i+")").html()=="")
 //    {
 //      continue;
 //    }
	// 	list += "<option value = "+i+">"+$("#catnav a:eq("+i+")").html()+"</option>";
	// };
	// list += "</select>";


	$(".main-entry").html('<textarea class="editor_id_add" name="content" style="width:700px;height:300px;"></textarea>');
	$(".icon-group").css({"display":"none"});
       KindEditor.ready(function(K) {//评论表单提交。
               editor_add = K.create('.editor_id_add');
})
       $(".ke-container:eq(0)").css({"margin": "auto"});
       	if($(".addbutton").length==0){
		 $("#xiugaiform").append("<p></p><input type='button' class='addbutton' value = 'submit' name = 'add'>");
	}
	else
      {
      	$(".addbutton").css("display","inline-block");
      }
     
      $("#xiugaiform .addbutton").unbind("click").bind("click",function(){
		var sub = $("#xiugaiform [name = 'subject']").val();

    var body = editor_add.html();
                sub=sub.replace(/\n/g,'');
                body = body.replace(/\n/g,'');
                 if(  Trim (sub)==""||Trim(body)=="")
                  {
                 alert('不能为空！');
                  } 
                  else{
                  $.post("php/ajax/add_ajax.php",{
                    "submit":1,
                "subject":sub,
                "cat_id":$("#xiugaiform [name = 'cat']").val(),
            "body":body
                  },function(data){
                    // alert(data);
                    alert("添加成功");
                  })
                  }

       })
})

//删除操作
$("#del a").bind("click",function(){

  var wriname = $(".username").html();
  if(wriname != $(".logname").html()&&$("#pri").val()!=1)
  {
    alert("无删除权限");
    // alert(pri);
  }
  else{
    var delcommand = prompt("真的要删除吗？请输入delete","delete");

  if(delcommand == "delete")
  {
    $.post("php/ajax/del_ajax.php",{
      "submit":1,
      "blog_id":$(".main-subject").attr("id")
    },function(data){
      alert(data);
    })
  }
  else if(delcommand=="lz"){
    alert("发现新大陆！！");
  }
  else{
    alert("无效指令");
  }
  }

	

})
// 归档。。。
$("#gui").bind("click",function(){
	$.post("php/ajax/gui_ajax.php",function(data){
		var obj = JSON.parse(data);
      	$("#ce4 .nav").html("");
      	for (var i = obj.num ; i > 0; i--) {
      		$("#ce4 .nav").append("<li><a title = "+obj[i].dateposted+">"+obj[i].subject+"</a></li>");
	}


        $("#entnav a").each(function(){

            $(this).bind("click",function(){
                //alert("click");

            $.post("php/ajax/cat_ajax.php",{
                "sub": $(this).html()
            },function(data){
                $(".icon-group").css({"display":"block"});//...
                $(".xgbutton").css({"display":"none"});
                $(".addbutton").css({"display":"none"});
                $("#xiugai").css({"display":"block"});
                var obj = JSON.parse(data);

                $(".wrapper a:first").html(obj.subject);
                $(".wrapper a:first").attr("id",obj.blog_id);
                $(".wrapper .sub-heading").html(obj.post);
                $(".wrapper .main-entry").html(obj.body);
                $("h2 .view").attr("href","view.php?id="+$(".main-subject").attr("id"));
                $(".wrapper .icon-group :eq(1)").html("评论："+obj.comnum);
                $(".wrapper .icon-group :eq(0)").html("点赞："+obj.good);

                if(obj.comnum>=2)
                {
                    $(".test-section .sub-heading:first").html("by "+obj.com1name);
                    $(".test-section .com1").html(obj.com1com);
                    $(".test-section .h2").html("第一条评论");
                    $(".test-section .sub-heading:last").html("by "+obj.com2name);
                    $(".test-section .com2").html(obj.com2com);
                    //alert(obj.com1com);
                }
                if(obj.comnum==1)
                {
                    $(".test-section .sub-heading:first").html("by "+obj.com1name);
                    $(".test-section .com1").html(obj.com1com);

                    $(".test-section .h2").html("然后就");
                    $(".test-section .sub-heading:last").html("没有评论了");
                    $(".test-section .com2").html('么么哒');

                }
                if(obj.comnum==0)
                {
                    $(".test-section .sub-heading:first").html("这里空荡荡的");
                    $(".test-section .com1").html("亲，写评论呗！");
                    $(".test-section .h2").html("");
                    $(".test-section .sub-heading:last").html("");
                    $(".test-section .com2").html("");
				}

				})

			})

		})

	})

})

//分类中选择文章，更新评论
$("#catnav a").each(function(){$(this).bind("click",function(){

            $.post("php/ajax/ajax2.php",{
                "id":$(this).attr("id")
            },function(data){
                var obj = JSON.parse(data);
                $("#ce4 .nav").html("");
                for (var i = obj.num ; i > 0; i--) {
                    $("#ce4 .nav").append("<li><a>"+obj[i]+"</a></li>");
                };
                if($("#ce4 .nav li a").length==0)
                {
                  $("#ce4 .nav").append("这个分类下没东西诶！");
                }


        $("#entnav a").each(function(){

            $(this).bind("click",function(){
                //alert("click");

            $.post("php/ajax/cat_ajax.php",{
                "sub": $(this).html()
            },function(data){
                $(".icon-group").css({"display":"block"});//...
                $(".xgbutton").css({"display":"none"});
                $(".addbutton").css({"display":"none"});
                $("#xiugai").css({"display":"block"});
                var obj = JSON.parse(data);

                $(".wrapper a:first").html(obj.subject);
                $(".wrapper a:first").attr("id",obj.blog_id);
                $("h2 .view").attr("href","view.php?id="+$(".main-subject").attr("id"));
                $(".wrapper .sub-heading").html(obj.post);
                $(".wrapper .main-entry").html(obj.body);
                $(".wrapper .icon-group :eq(1)").html("评论："+obj.comnum);
                $(".wrapper .icon-group :eq(0)").html("点赞："+obj.good);

                if(obj.comnum>=2)
                {
                    $(".test-section .sub-heading:first").html("by "+obj.com1name);
                    $(".test-section .com1").html(obj.com1com);
                    $(".test-section .h2").html("第一条评论");
                    $(".test-section .sub-heading:last").html("by "+obj.com2name);
                    $(".test-section .com2").html(obj.com2com);
                    //alert(obj.com1com);
                }
                if(obj.comnum==1)
                {
                    $(".test-section .sub-heading:first").html("by "+obj.com1name);
                    $(".test-section .com1").html(obj.com1com);

                    $(".test-section .h2").html("然后就");
                    $(".test-section .sub-heading:last").html("没有评论了");
                    $(".test-section .com2").html('么么哒');

                }
                if(obj.comnum==0)
                {
                    $(".test-section .sub-heading:first").html("这里空荡荡的");
                    $(".test-section .com1").html("亲，写评论呗！");
                    $(".test-section .h2").html("");
                    $(".test-section .sub-heading:last").html("");
                    $(".test-section .com2").html("");
				}

				})

			})

		})

	})

})

})

//模糊搜索...............
$("#search").bind("click",function(){
	var keyword = prompt("输入搜索关键词:");
	if(keyword!=""&&keyword!=null)
	{
		$.post("php/ajax/search_ajax.php",{
		"keyword":keyword,
		"submit":1
	},function(data){
		var obj = JSON.parse(data);
		
		if(obj.id!=null)
		{
			self.location='view.php?id='+obj.id; 
		}
		else{
			
			alert("查无此文");
		}
	})
	}
	else{

		alert('无效指令');
	}
	
})
//分类添删
$("#cat_xiugai").bind("click",function(){
  var command = prompt("输入分类名（存在则删除，不存在则添加）:");
  if(command!=''&&command!=null)
  {
    $.post('php/ajax/catxg_ajax.php',{
      "submit":1,
      "cat":command
    },function(data){
      alert("操作成功");
    })
  }
  else{
    alert('无效指令');
  }
})

// 修改密码
$('#xiugai_pass').bind("click",function(){
  var command = prompt("输入新的密码：");
    if(command!=''&&command!=null)
  {
    $.post('php/ajax/mmxg_ajax.php',{
      "submit":1,
      "new":command
    },function(data){
      alert("操作成功");
    })
  }
  else{
    alert('无效指令');
  }
})



$("#ce2opener").bind("click",function(){
  

   $.post("php/ajax/catview_ajax.php",function(data){
     var obj = JSON.parse(data);
     //alert(data);

     for (var i = 1; i<=19 ; i++) {
        var str = "#ce2 .nav a:eq("+i.toString()+")";
        //alert(str);
          $(str).html("");
          $(str).attr("id",i);
          $(str).html(obj[i]);
         //$("#ce2 .nav").append("<li><a class = 'ce4opener' id ='"+i+"'>"+obj[i]+"</a></li>");
     };
   });


});


// 实名认证推送
$("#rz").bind("click",function(){
    var tel = prompt("输入手机号码：");

    var username = $(".logname").html();

     $.post("php/ajax/rz_ajax.php",{
        "username":username,
        "tel":tel
     },function(data){
        alert(data);
   })
});


document.body.style.overflow='';

$("h2 .view").attr("href","view.php?id="+$(".main-subject").attr("id"));


$("#comform input:eq(0)").attr("value",$(".logname").html());
})




// $(function(){
// $(".sub-heading .tit").bind("click",function(){
            // $.post("php/ajax/ajax2.php",{
                // "id":$(this).attr("id")
            // },function(data){
                // var obj = JSON.parse(data);
                // $("#ce4 .nav").html("");
                // for (var i = obj.num ; i > 0; i--) {
                    // $("#ce4 .nav").append("<li><a>"+obj[i]+"</a></li>");
                // };
            // });
        // });
// });
