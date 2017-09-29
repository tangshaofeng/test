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
<div class="category_tree pdlr15">
    <div class="catename"><?php echo ($topinfo['title']); ?></div>
    <ul>
       <?php if(is_array($service_tree)): $i = 0; $__LIST__ = $service_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(($vo['id']) == $info['id']): ?>class="active"<?php endif; ?>><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<div class="w container">
<div class="service_view_box">
        <h4 class="h4_bt"><span>概括</span></h4>
        <div class="art_con"><?php echo ($info['content']); ?></div>
        <h4 class="h4_bt"><span>服务项目</span></h4>
        <div class="art_con"><?php echo ($info['content1']); ?></div>
        <h4 class="h4_bt"><span>服务优势</span></h4>
        <div class="art_con"><?php echo ($info['content2']); ?></div>
        <h4 class="h4_bt"><span>服务支撑</span></h4>
        <div class="art_con"><?php echo ($info['content3']); ?></div>
        <h4 class="h4_bt"><span>我们的客户</span></h4>
        <div class="art_con"><?php echo ($info['content4']); ?></div>
</div>
</div>
<div class="clh20"></div>

<div class="bottom wrap">
    <div class="right copyright"><?php echo ($config['content']); ?></div>
</div>
</div>

<section class="sidebar">
  <ul>
    <li><a href="<?php echo U('Mobile/index/index');?>">首页</a></li>
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