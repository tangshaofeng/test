<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="off">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>云栈互联内容管理系统</title>
<link rel="shortcut icon" href="/Public/Yunzhansystem/images/favicon.ico">
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet" type="text/css" />
<link href="/Public/Yunzhansystem/css/system.css" rel="stylesheet" type="text/css" />
<link href="/Public/Yunzhansystem/font/iconfont.css" rel="stylesheet">
<script language="javascript" type="text/javascript" src="/Public/Yunzhansystem/js/jquery.min2.js"></script>
<script src="/Public/Yunzhansystem/layer/layer.js" type="text/javascript" charset="utf-8"></script>
<style>
html{overflow-y:hidden;}
</style>
</head>
<body scroll="no" style="min-width:1200px;">
<div class="header">
    <div class="logo lf"><a href="<?php echo U('index');?>" alt="云栈互联内容管理系统" title="云栈互联内容管理系统"><span class="invisible">云栈互联内容管理系统</span></a></div>
    <div class="rt">
        <div class="headerLi headerLi1">
            <div class="headerInfo">
            <img src="/Public/Yunzhansystem/images/y.jpg" class="radius-circle rotate-hover" alt="" height="35"> <span><?php echo get_username();?>，欢迎您！</span>
            <a href="javascript:;" onclick="Logout();"><img src="/Public/Yunzhansystem/images/logout.png" alt="" width="25"> 安全退出</a>
            </div>
        </div>
        <div class="style_but"></div>
    </div>
    <div class="col-auto lf" style="overflow: visible">
        <ul class="nav white" id="top_menu">
        <?php if(is_array($nav_menu)): $i = 0; $__LIST__ = $nav_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li id="<?php echo ($val['nav_id']); ?>" class="<?php if(($i) == "1"): ?>on<?php endif; ?> top_menu" <?php if(($i) == "1"): ?>style="padding-left:0px;"<?php endif; ?>><a href="javascript:_M(<?php echo ($val['id']); ?>,'#');" hidefocus="true" style="outline:none;">
        <img height="36" alt="<?php echo ($val['menu_name']); ?>" src="/Public/Yunzhansystem/images/<?php echo ($val['nav_img']); ?>">
        <span><?php echo ($val['menu_name']); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        <li  class="top_menu"><a href="<?php echo U('Home/Index/index');?>" target="_blank"  hidefocus="true" style="outline:none;">
        <img width="36" height="36" alt="站点预览" src="/Public/Yunzhansystem/images/home.png"><span>站点预览</span></a></li>
        </ul>
    </div>
</div>
<div id="content">
    <div class="col-left left_menu">
        <div id="leftMain">
        </div>
    </div>
    <div class="col-auto">
       
            <div class="col-1">
                <div class="content" style="position:relative; overflow:hidden">
                    <iframe name="right" id="rightMain" src="<?php echo U('Yunzhansystem/Index/indexs');?>" frameborder="false" scrolling="auto" style="overflow-x:hidden;border:none;" width="100%" height="auto" allowtransparency="true"></iframe>
                   
                </div>
            </div>
        </div>
</div>
<script type="text/javascript"> 
//clientHeight-0; 空白值 iframe自适应高度
function windowW(){
    if($(window).width()<980){
            $('.header').css('width',980+'px');
            $('#content').css('width',980+'px');
            $('body').attr('scroll','');
            $('body').css('overflow','');
    }
}
windowW();
$(window).resize(function(){
    if($(window).width()<980){
        windowW();
    }else{
        $('.header').css('width','auto');
        $('#content').css('width','auto');
        $('body').attr('scroll','no');
        $('body').css('overflow','hidden');
        
    }
});
window.onresize = function(){
    var heights = document.documentElement.clientHeight-80;
    if (IsPC() == false){
      document.getElementById('rightMain').height = $(window).height()+20;
    }else{
      document.getElementById('rightMain').height = heights-25;
    }

    var openClose = $("#rightMain").height()+39;
    $('#center_frame').height(openClose+9);
    $("#openClose").height(openClose+30);   
}
window.onresize();
//站点下拉菜单
$(function(){
    //默认载入左侧菜单
    $("#leftMain").load('<?php echo U("Yunzhansystem/Public/menu");?>');
    $(".headerLi1").click(function(){
            $(".centerLogout").slideToggle(300);
    });
})

//左侧开关
$("#openClose").click(function(){
    if($(this).data('clicknum')==1) {
        $("html").removeClass("on");
        $(".left_menu").removeClass("left_menu_on");
        $(this).removeClass("close");
        $(this).data('clicknum', 0);
    } else {
        $(".left_menu").addClass("left_menu_on");
        $(this).addClass("close");
        $("html").addClass("on");
        $(this).data('clicknum', 1);
    }
    return false;
});
function _M(menuid,targetUrl) {
    $("#leftMain").load('<?php echo U("Yunzhansystem/Public/menu?mid=");?>'+menuid);
    $('.top_menu').removeClass("on");
    $('#_M'+menuid).addClass("on");

    //当点击顶部菜单后，隐藏中间的框架
    $('#display_center_id').css('display','none');
    //显示左侧菜单，当点击顶部时，展开左侧
    $(".left_menu").removeClass("left_menu_on");
    $("#openClose").removeClass("close");
    $("html").removeClass("on");
}
function _MP(menuid,targetUrl) {
    $("#rightMain").attr('src', targetUrl);
    $('.menu-item').removeClass("on fb blue");
    $('#_MP'+menuid).addClass("on fb blue");
    $.get("current_pos_"+menuid+".html", function(data){
        $("#current_pos").html(data+'<span id="current_pos_attr"></span>');
    });
    $("#current_pos").data('clicknum', 1);
}

function _MPS(targetUrl) {
    $("#rightMain").attr('src', targetUrl);
}
function IsPC() {
    var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone",
                "SymbianOS", "Windows Phone",
                "iPad", "iPod"];
    var flag = true;
    for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
            flag = false;
            break;
        }
    }
    return flag;
}
function Logout(){
    //询问框
    layer.confirm('您确定要退出吗？', {
        btn: ['确定','取消'] //按钮
    }, function(){
        location.href = "<?php echo U('Public/logout');?>";
        layer.msg('您已退出内容管理系统');
    }, function(){
       
    });
}
</script>
</body>
</html>