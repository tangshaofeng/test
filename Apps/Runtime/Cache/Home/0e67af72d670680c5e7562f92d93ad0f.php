<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title><?php echo ($meta_title); ?></title>
<meta name="keywords" content="<?php echo ($meta_keywords); ?>">
<meta name="description" content="<?php echo ($meta_description); ?>">
<link rel="stylesheet" href="/Public/Home/css/common.css">
<link rel="stylesheet" href="/Public/Home/css/cssreset.css">
<link rel="stylesheet" href="/Public/Home/css/style.css">
<script src="/Public/Home/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    var qcloud={};
    $('[_t_nav]').hover(function(){
        var _nav = $(this).attr('_t_nav');
        clearTimeout( qcloud[ _nav + '_timer' ] );
        qcloud[ _nav + '_timer' ] = setTimeout(function(){
        $('[_t_nav]').each(function(){
        $(this)[ _nav == $(this).attr('_t_nav') ? 'addClass':'removeClass' ]('nav-up-selected');
        });
        $('#'+_nav).stop(true,true).slideDown(200);
        }, 150);
    },function(){
        var _nav = $(this).attr('_t_nav');
        clearTimeout( qcloud[ _nav + '_timer' ] );
        qcloud[ _nav + '_timer' ] = setTimeout(function(){
        $('[_t_nav]').removeClass('nav-up-selected');
        $('#'+_nav).stop(true,true).slideUp(200);
        }, 150);
    });
});
</script>
</head>
<body>
<!--header start-->
<div class="header wrap">
    <div class="top wrap">
    <div class="w"><a href="/en/">English</a>|<a href="/">简体中文</a>|<a href="<?php echo U('Pages/index/catid/7');?>">联系我们</a></div>
    </div>
    <div class="head w">
        <div class="logo left"><a href="/" title="<?php echo ($meta_title); ?>"><img src="/Public/Home/images/logo.png" alt="<?php echo ($meta_title); ?>"></a></div>
        <div class="nav right">
            <div>
                <ul>
                    <li><a href="/">首页</a></li>
                    <?php if(is_array($NAVS)): $i = 0; $__LIST__ = $NAVS;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(($vo['active']) == "1"): ?>class="active"<?php endif; ?>><a href="<?php echo ($vo['url']); ?>"  _t_nav="NAVSB<?php echo ($i); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="navigation-down">
            <div id="NAVSB1" class="nav-down-menu menu-1" style="display:none;" _t_nav="NAVSB1">
            <div class="navigation-down-inner">
            <?php if(is_array($ads_service_nav)): $i = 0; $__LIST__ = $ads_service_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="nav-ads-img"><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['image'],276,192);?>" alt="<?php echo ($vo['alt']); ?>"></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
            <dl style="width:605px;margin-right:0px;margin-left:-30px;">
            <?php if(is_array($service_nav)): $i = 0; $__LIST__ = $service_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dt style="float:left;margin-left:60px;width:135px;text-align:center;font-size:14px;margin-bottom:15px;"><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            </div>
            </div>
            <div id="NAVSB2" class="nav-down-menu menu-1" style="display: none;" _t_nav="NAVSB2">
            <div class="navigation-down-inner">
            <?php if(is_array($ads_solution_nav)): $i = 0; $__LIST__ = $ads_solution_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="nav-ads-img"><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['image'],276,192);?>" alt="<?php echo ($vo['alt']); ?>"></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
            <dl style="width:605px;margin-right:0px;">
            <?php if(is_array($solution_nav)): $i = 0; $__LIST__ = $solution_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dt style="float:left;font-size:14px;margin-left:20px;margin-bottom:15px;"><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            </div>
            </div>
            <div id="NAVSB3" class="nav-down-menu menu-1" style="display: none;" _t_nav="NAVSB3">
            <div class="navigation-down-inner">
            <?php if(is_array($ads_product_nav)): $i = 0; $__LIST__ = $ads_product_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="nav-ads-img"><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['image'],276,192);?>" alt="<?php echo ($vo['alt']); ?>"></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php if(is_array($product_nav)): $i = 0; $__LIST__ = $product_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl style="margin-left: 15px;width:100px;margin-right:20px;">
                <dt style="text-align:center;color:#e60000;border-bottom:1px solid #e60000;"><?php echo ($vo['title']); ?></dt>
                <?php $_result=category_tree2($vo['id']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><dd>
                    <a href="<?php echo U('Product/index',array('catid'=>$val['id']));?>">· <?php echo ($val['title']); ?></a>
                </dd><?php endforeach; endif; else: echo "" ;endif; ?>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            </div>
            <div id="NAVSB4" class="nav-down-menu menu-1" style="display: none;" _t_nav="NAVSB4">
            <div class="navigation-down-inner">
            <?php if(is_array($ads_support_nav)): $i = 0; $__LIST__ = $ads_support_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="nav-ads-img"><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['image'],276,192);?>" alt="<?php echo ($vo['alt']); ?>"></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
            <dl style="width:605px;margin:0px;">
            <?php if(is_array($support_nav)): $i = 0; $__LIST__ = $support_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dt style="float:left;font-size:14px;margin-left:20px;margin-bottom:15px;padding:0px 15px;line-height:40px;"><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            </div>
            </div>
            <div id="NAVSB5" class="nav-down-menu menu-1" style="display: none;" _t_nav="NAVSB5">
            <div class="navigation-down-inner">
            <?php if(is_array($ads_about_nav)): $i = 0; $__LIST__ = $ads_about_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="nav-ads-img"><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['image'],276,192);?>" alt="<?php echo ($vo['alt']); ?>"></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
            <dl style="width:605px;margin:0px;">
            <?php if(is_array($about_nav)): $i = 0; $__LIST__ = $about_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dt style="float:left;font-size:14px;margin-left:20px;margin-bottom:15px;padding:0px 15px;line-height:40px;"><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            </div>
            </div>

            </div>
        </div>
    </div>
</div>

<div class="slide-page">
    <img src="<?php echo thumb($topinfo['image'],1920,400);?>">
</div>
<div class="w container">
    <div class="h2_ze"><h2><?php echo ($category['title']); ?></h2><small><?php echo ($category['english']); ?></small></div>
    <ul class="solution-ul">
    <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
            <a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['thumb'],307,241);?>" width="357" height="280" alt="<?php echo ($vo['title']); ?>"></a>
            <span><a href="<?php echo ($vo['url']); ?>"><?php echo msubstr($vo['title'],0,15);?></a></span>
            <p><?php echo msubstr($vo['description'],0,48);?></p>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<div class="clh20"></div>
<!-- <div class="w container">
    <div class="h2_ze"><h2>服务案例</h2><small>Service case</small></div>
    <ul class="case-ul">
<div class="ml fl">
            <div id="js" class="js">
            <?php if(is_array($service_case)): $i = 0; $__LIST__ = $service_case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="aa"><a href="<?php echo ($vo['url']); ?>"><img class="imgb" src="<?php echo thumb($vo['thumb'],280,99);?>" alt="<?php echo ($vo['title']); ?>" width="280" height="99"></a><span><a href="<?php echo ($vo['url']); ?>">· <?php echo ($vo['title']); ?></a></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <div id="jsNav" class="jsNav">
            <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a class="trigger <?php if(($i) == "1"): ?>xz<?php endif; ?>" href="<?php echo ($vo['url']); ?>">· <?php echo ($vo['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            <a id="next" class="nextBtn" href="javascript:void(0)"></a>
                <a id="prev" class="prevBtn" href="javascript:void(0)"></a>
                <div class="clear"></div>
            </div>
            </ul> 
            <script>
                service_case('js','jsNav','next','prev',4000);
            </script>
        </div>
        </div> -->
<div class="w container">
    <div class="h2_ze"><h2>服务案例</h2><small>Service case</small></div>

<div id="colee_left" style="overflow:hidden;width:100%;">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td id="colee_left1" valign="top" align="center">
<table cellpadding="2" cellspacing="0" border="0">
<tr align="center">
<?php if(is_array($service_case)): $i = 0; $__LIST__ = $service_case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td><p><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['thumb'],280,99);?>" alt="<?php echo ($vo['title']); ?>" width="280" height="99"></a><span><a href="<?php echo ($vo['url']); ?>">· <?php echo ($vo['title']); ?></a></span></p></td><?php endforeach; endif; else: echo "" ;endif; ?>
</tr>
</table>
</td>
<td id="colee_left2" valign="top"></td>
</tr>
</table>
</div>
</div>
<script>
//使用div时，请保证colee_left2与colee_left1是在同一行上.
var speed=30//速度数值越大速度越慢
var colee_left2=document.getElementById("colee_left2");
var colee_left1=document.getElementById("colee_left1");
var colee_left=document.getElementById("colee_left");
colee_left2.innerHTML=colee_left1.innerHTML
function Marquee3(){
if(colee_left2.offsetWidth-colee_left.scrollLeft<=0)//offsetWidth 是对象的可见宽度
colee_left.scrollLeft-=colee_left1.offsetWidth//scrollWidth 是对象的实际内容的宽，不包边线宽度
else{
colee_left.scrollLeft++
}
}
var MyMar3=setInterval(Marquee3,speed)
colee_left.onmouseover=function() {clearInterval(MyMar3)}
colee_left.onmouseout=function() {MyMar3=setInterval(Marquee3,speed)}
</script>
<!-- <div class="w container">
    <div class="h2_ze"><h2>服务案例</h2><small>Service case</small></div>
    <ul class="case-ul">
    <?php if(is_array($service_case)): $i = 0; $__LIST__ = $service_case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['thumb'],280,99);?>" alt="<?php echo ($vo['title']); ?>" width="280" height="99"></a><span><a href="<?php echo ($vo['url']); ?>">· <?php echo ($vo['title']); ?></a></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div> -->
<div class="clh20"></div>

<!--footer start-->
<div class="footer wrap">
    <div class="footer-box w">
        <ul>
            <span>客户案例</span>
            <li><a href="">系统集成</a></li>
            <li><a href="">运维/维保</a></li>
        </ul>
        <ul>
            <span>新闻中心</span>
            <?php $_result=category_tree(6);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('News/index/catid/'.$vo['id']);?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <ul>
            <span>关于我们</span>
            <?php $_result=category_tree(5);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Pages/index/catid/'.$vo['id']);?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <ul>
            <span>合作伙伴</span>
            <?php if(is_array($parents)): $i = 0; $__LIST__ = $parents;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>" target="_blank"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="right">
        <?php if(is_array($wxcode)): $i = 0; $__LIST__ = $wxcode;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span><img src="<?php echo thumb($vo['image'],100,100);?>" alt="<?php echo ($vo['alt']); ?>"><br/><?php echo ($vo['title']); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
<div class="bottom wrap">
    <div class="w">
    <div class="left"><a href="<?php echo U('Pages/index/catid/7');?>">联系我们</a>|<a href="<?php echo U('Pages/index/catid/40');?>">网站地图</a>|<a href="<?php echo U('Pages/index/catid/41');?>">人才招聘</a>|<a href="<?php echo U('Pages/index/catid/42');?>">隐私条约</a></div>
    <div class="right copyright"><?php echo ($config['content']); ?></div>
    </div>
</div>
</body>
</html>