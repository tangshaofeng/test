<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="target-densitydpi=device-dpi, width=640px, user-scalable=no">
<title><?php echo ($meta_title); ?></title>
<meta name="keywords" content="<?php echo ($meta_keywords); ?>">
<meta name="description" content="<?php echo ($meta_description); ?>">
<link rel="stylesheet" href="/Public/Mobile/css/common.css">
<link rel="stylesheet" href="/Public/Mobile/css/cssreset.css">
<link rel="stylesheet" href="/Public/Mobile/css/style.css">
<script src="/Public/Mobile/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/Mobile/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/jquery.simplesidebar.js"></script>
</head>
<body class="drawer drawer-right">
<div class="w">
<div class="head">
        <div class="logo pull_left"><a href="<?php echo U('Mobile/index/index');?>" title="<?php echo ($meta_title); ?>"><img src="/Public/Mobile/images/logo.png" alt="<?php echo ($meta_title); ?>"></a></div> 
        <div class="toolbar pull_right"><span id="open-sb"></span></div>
</div>
<div class="clear"></div>

<div class="crumbs2"><?php echo catpos($catid);?></div>
<div class="h4_bt"><span><?php echo ($category['title']); ?></span></div>
<ul class="service-ul">
    <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
            <a href="<?php echo ($vo['url']); ?>" title="<?php echo ($vo['title']); ?>"><img src="<?php echo thumb($vo['thumb'],287,225);?>" alt="<?php echo ($vo['title']); ?>"></a>
            <span><a href="<?php echo ($vo['url']); ?>"><?php echo msubstr($vo['title'],0,10);?></a></span>
            <p><?php echo msubstr($vo['description'],0,50);?></p>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>

<div class="bottom wrap">
    <div class="right copyright"><?php echo ($config['content']); ?></div>
</div>
</div>

<section class="sidebar">
  <ul>
    <li><a href="<?php echo U('Mobile/index/index');?>">首页</a></li>
    <?php if(is_array($NAVS)): $i = 0; $__LIST__ = $NAVS;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="subNav"><h6><?php echo ($vo['title']); ?></h6><em></em></li>
    <?php if($vo['id'] == 1): ?><dl class="navContent">
    <?php if(is_array($nav_service_tree)): $i = 0; $__LIST__ = $nav_service_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dt><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
    <?php elseif($name == 2): ?>
    <dl class="navContent">
    <dt><a href="#">咖啡文化</a></dt>
    <dt><a href="#">星巴克甄选咖啡</a></dt>
    <dt><a href="#">如何冲泡咖啡</a></dt>
    </dl>
    <?php else: ?>
    <dl class="navContent">
    <dt><a href="#">咖啡文化</a></dt>
    <dt><a href="#">星巴克甄选咖啡</a></dt>
    <dt><a href="#">如何冲泡咖啡</a></dt>
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