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

<div class="crumbs2"><?php echo catpos($catid);?> > <?php echo ($info['title']); ?></div>

<div class="art_head">
    <div class="title"><?php echo ($info['title']); ?></div>
    <div class="small"><?php echo date('Y-m-d H:i:s',$info['create_time']);?></div>
</div>
<div class="art_con"><?php echo ($info['content']); ?></div>
<div class="clh20"></div>

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