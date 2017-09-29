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
            <ul>
                <li><a href="/">首页</a></li>
                <?php if(is_array($NAVS)): $i = 0; $__LIST__ = $NAVS;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(($vo['active']) == "1"): ?>class="active"<?php endif; ?>><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>

<div class="slide-page">
    <img src="<?php echo thumb($topinfo['image'],1440,400);?>">
</div>
<div class="w container">
    <div class="h2_ze"><h2><?php echo ($category['title']); ?></h2><small><?php echo ($category['english']); ?></small></div>
    <ul class="case-ul">
    <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['thumb'],280,99);?>" alt="<?php echo ($vo['title']); ?>" width="280" height="99"></a><span><a href="<?php echo ($vo['url']); ?>">· <?php echo ($vo['title']); ?></a></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
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