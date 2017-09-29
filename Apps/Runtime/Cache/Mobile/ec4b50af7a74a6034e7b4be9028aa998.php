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
   <?php $_result=get_category($top_catid);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(($vo['id']) == $catid): ?>class="active"<?php endif; ?>><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
<div class="h4_bt"><span><?php echo ($category['title']); ?></span></div>
<div class="news-list">
  <ul>
  <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i <= 2): ?><li class="first"><a href="<?php echo ($vo['url']); ?>" title="<?php echo ($vo['title']); ?>"><img src="<?php echo thumb($vo['thumb'],302,220);?>" width="302" height="220" alt="<?php echo ($vo['title']); ?>"><span><em><?php echo date('m-d',$vo['create_time']);?></em><?php echo ($vo['title']); ?></span></a></li>
      <?php if(($i) == "2"): ?><div class="clear"></div><?php endif; ?>
  <?php else: ?>
      <li><a href="<?php echo ($vo['url']); ?>" title="<?php echo ($vo['title']); ?>">· <?php echo ($vo['title']); ?></a><span><?php echo date('Y/m/d',$vo['create_time']);?></span></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
  </ul>
  <div class="clear"></div>
  <div class="paging"><?php echo ($page); ?></div>
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