<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="target-densitydpi=device-dpi, width=640px, user-scalable=no">
<title><?php echo ($meta_title); ?></title>
<meta name="keywords" content="<?php echo ($meta_keywords); ?>">
<meta name="description" content="<?php echo ($meta_description); ?>">
<link rel="stylesheet" href="/Public/Wap/css/common.css">
<link rel="stylesheet" href="/Public/Wap/css/cssreset.css">
<link rel="stylesheet" href="/Public/Wap/css/style.css">
<script src="/Public/Wap/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/Wap/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/Public/Wap/js/jquery.simplesidebar.js"></script>
</head>
<body class="drawer drawer-right">
<div class="w">
<div class="head">
        <div class="logo pull_left"><a href="<?php echo U('Wap/index/index');?>" title="<?php echo ($meta_title); ?>"><img src="/Public/Wap/images/logo.png" alt="<?php echo ($meta_title); ?>"></a></div> 
        <div class="toolbar pull_right"><span id="open-sb"></span></div>
</div>
<div class="clear"></div>

<script src="/Public/Wap/js/jquery.reslider.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/Wap/js/jquery.SuperSlide.js"></script>
<!--banner start-->
<div class="banner">
  <!-- slider-->
  <div class="slider">
    <div class="jquery-reslider">
    <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="slider-block" ><a href="<?php echo ($vo['url']); ?>" title="<?php echo ($vo['alt']); ?>"><img src="<?php echo thumb($vo['image']);?>" alt=""></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
      <div class="slider-direction slider-direction-next"></div>
      <div class="slider-direction slider-direction-prev"></div>
      <div class="slider-dots"><ul></ul></div>
    </div>
  </div>
  <script>
    $(function(){
        $('.jquery-reslider').reSlider({
            speed:1000,//设置轮播的高度
            delay:5000,//设置轮播的延迟时间
            imgCount:3,//设置轮播的图片数
            dots:true,//设置轮播的序号点
            autoPlay:true//设置轮播是否自动播放
        });
    });
</script> 
</div>
<!--service start-->
<div class="service-section w">
    <div class="catename">主要业务板块</div>
    <div class="service-box" style="height:650px;">
    <?php if(is_array($service)): $i = 0; $__LIST__ = $service;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="box<?php echo ($i); ?>">
        <div class="img"><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['image']);?>" alt="<?php echo ($vo['title']); ?>"></div>
        <span><?php echo ($vo['title']); ?></span></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<!--news start-->
<div class="news-section w" >
    <div class="catename">新闻中心</div>
    <div class="customer-box">
    <div class="news-box">
    <!---->
    <ul class="picList">
    <?php if(is_array($index_news)): $i = 0; $__LIST__ = $index_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['thumb'],303,144);?>" alt="<?php echo ($vo['alt']); ?>"></a><b><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></b><p><?php echo ($vo['description']); ?></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <!---->
    </div>
    </div>
</div>

<div class="clear"></div>
<!--customer start-->
<div class="customer-section w">
    <div class="catename">我们的客户</div>
    <div class="customer-box">
        <img src="/Public/Wap/images/12_02.jpg" alt="" style="width:100%;">
    </div>
</div>

<div class="bottom wrap">
    <div class="right copyright"><?php echo ($config['content']); ?></div>
</div>
</div>

<section class="sidebar">
  <ul>
    <li><a href="<?php echo U('Wap/index/index');?>">首页</a></li>
    <?php if(is_array($NAVS)): $i = 0; $__LIST__ = $NAVS;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="subNav"><h6><?php echo ($vo['title']); ?></h6><em></em></li>
    <?php if($vo['id'] == 1): ?><dl class="navContent">
    <?php if(is_array($nav_service_tree)): $i = 0; $__LIST__ = $nav_service_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><dt><a href="<?php echo ($val['url']); ?>"><?php echo ($val['title']); ?></a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
    <?php elseif($vo['id'] == 2): ?>
    <dl class="navContent">
    <?php if(is_array($nav_solution_tree)): $i = 0; $__LIST__ = $nav_solution_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><dt><a href="<?php echo ($val['url']); ?>"><?php echo ($val['title']); ?></a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
    <?php elseif($vo['id'] == 3): ?>
    <dl class="navContent">
    <?php $_result=category_tree(47);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><dt><a href="<?php echo U('Product/index',array('catid'=>$val['id']));?>"><?php echo ($val['title']); ?></a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
    <?php else: ?>
    <dl class="navContent">
    <?php $_result=category_tree($vo['id']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><dt><a href="<?php echo U('Support/index',array('catid'=>$val['id']));?>"><?php echo ($val['title']); ?></a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl><?php endif; endforeach; endif; else: echo "" ;endif; ?>
  </ul>
</section>

<script type="text/javascript">
$( document ).ready(function() {
  $( '.sidebar' ).simpleSidebar({
    settings: {
      opener: '#open-sb',
      wrapper: '.wrapper',
      animation: {
        duration: 500,
        easing: 'easeOutQuint'
      }
    },
    sidebar: {
      align: 'right',
      width: 420,
      closingLinks: 'a',
    }
  });
});
</script>

<script type="text/javascript">
$(function(){
$(".subNav").click(function(){
  var display =$(this).next(".navContent").css('display');
  if(display == 'none'){
    $(this).addClass('active');
    $(this).next(".navContent").slideDown(200);
  }else{
    $(this).removeClass('active');
    $(this).next(".navContent").slideUp(200);
  }
      // 修改数字控制速度， slideUp(500)控制卷起速度
      //$(this).next(".navContent").slideToggle(200);
  })  
})
</script>
</body>
</html>