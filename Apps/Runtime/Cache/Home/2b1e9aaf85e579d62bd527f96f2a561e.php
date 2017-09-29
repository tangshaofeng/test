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
</head>
<body>
<!--header start-->
<div class="header wrap">
    <div class="top wrap">
    <div class="w"><a href="">English</a>|<a href="">简体中文</a>|<a href="">联系我们</a></div>
    </div>
    <div class="head w">
        <div class="logo left"><a href="/" title="<?php echo ($meta_title); ?>"><img src="/Public/Home/images/logo.png" alt="<?php echo ($meta_title); ?>"></a></div>
        <div class="nav right">
            <ul>
                <li><a href="/">首页</a></li>
                <?php if(is_array($NAVS)): $i = 0; $__LIST__ = $NAVS;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>

<div class="slide-page">
    <img src="<?php echo thumb($topinfo['image'],1440,400);?>">
</div>
<div class="crumbs wrap">
    <div class="w"><?php echo catpos($catid);?></div>
</div>
<div class="w container">
    <div class="left menu-tree">
        <h3><?php echo ($topinfo['title']); ?></h3>
        <ul>
          <?php $_result=get_category($top_catid);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="right">
      <div class="news-list">
          <ul>
          <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i <= 3): ?><li class="first" <?php if(($$i) == ""): ?>style="margin-left:0px;"<?php endif; ?>><a href="<?php echo ($vo['url']); ?>" title="<?php echo ($vo['title']); ?>"><img src="/Public/Home/images/news-img2.gif" alt="<?php echo ($vo['title']); ?>"><span><em><?php echo date('m-d',$vo['create_time']);?></em><?php echo ($vo['title']); ?></span></a></li><?php endif; ?>
              <li><a href="<?php echo ($vo['url']); ?>" title="<?php echo ($vo['title']); ?>">· <?php echo ($vo['title']); ?></a><span><?php echo date('Y/m/d',$vo['create_time']);?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
          <div class="clh20"></div>
          <div class="paging"><?php echo ($page); ?></div>
      </div>
    </div>
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
            <li><a href="">系统集成</a></li>
            <li><a href="">运维/维保</a></li>
        </ul>
        <ul>
            <span>关于我们</span>
            <li><a href="">系统集成</a></li>
            <li><a href="">运维/维保</a></li>
        </ul>
        <ul>
            <span>合作伙伴</span>
            <li><a href="">系统集成</a></li>
            <li><a href="">运维/维保</a></li>
        </ul>
        <div class="right">
            <span><img src="/Public/Home/images/wxcode.gif" alt=""><br/>官方微博</span>
            <span><img src="/Public/Home/images/wxcode.gif" alt=""><br/>官方微博</span>
        </div>
    </div>
</div>
<div class="bottom wrap">
    <div class="w">
    <div class="left"><a href="">联系我们</a>|<a href="">网站地图</a>|<a href="">人才招聘</a>|<a href="">隐私条约</a></div>
    <div class="right copyright">版权所有：北京中智国华信息技术有限公司  ICP备案号：XXXXXXX</div>
    </div>
</div>
</body>
</html>