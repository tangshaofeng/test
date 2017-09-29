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

<script src="/Public/Home/js/jquery.reslider.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.SuperSlide.js"></script>
<!--banner start-->
<div class="banner">
  <!-- slider-->
  <div class="slider">
    <div class="jquery-reslider">
    <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="slider-block" data-url="<?php echo thumb($vo['image']);?>"><a href="<?php echo ($vo['url']); ?>" title="<?php echo ($vo['alt']); ?>"></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
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
    <h1>主要业务板块</h1>
    <div class="service-box">
    <?php if(is_array($service)): $i = 0; $__LIST__ = $service;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="box<?php echo ($i); ?>"><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['image']);?>" alt="<?php echo ($vo['title']); ?>"><br/><?php echo ($vo['title']); ?></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<!--news start-->
<div class="news-section w">
    <h1>新闻中心</h1>
    <div class="news-box">
        <!---->
        <div class="leftLoop">
        <a class="next"></a>
        <a class="prev"></a>
        <div class="bd">
        <ul class="picList">
        <?php if(is_array($index_news)): $i = 0; $__LIST__ = $index_news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span><?php echo date('Y-m-d',$vo['create_time']);?></span><a href="<?php echo ($vo['url']); ?>"><img src="<?php echo thumb($vo['thumb'],303,144);?>" alt="<?php echo ($vo['alt']); ?>"></a><b><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></b><p><?php echo ($vo['description']); ?></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        </div>
        </div>
        <script type="text/javascript">jQuery(".leftLoop").slide({ mainCell:".bd ul",effect:"leftLoop",vis:3,scroll:3,autoPlay:true});</script>
        <!---->
    </div>
</div>
<div class="clh20"></div>
<!--customer start-->
<div class="customer-section w">
    <h1>我们的客户</h1>
    <div class="customer-box">
        <ul id="m_btn">
        <?php if(is_array($my_map)): $i = 0; $__LIST__ = $my_map;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(!empty($beijing_customer)): ?><li id="beijing" data-type="beijing" class="position_a"></li><?php endif; ?>
        <?php if(!empty($zhejiang_customer)): ?><li id="zhejiang" data-type="zhejiang" class="position_a"></li><?php endif; ?>
        <?php if(!empty($jiangsu_customer)): ?><li id="jiangsu" data-type="jiangsu" class="position_a"></li><?php endif; ?>
        <?php if(!empty($chongqing_customer)): ?><li id="chongqing" data-type="chongqing" class="position_a"></li><?php endif; ?>
        <?php if(!empty($shanghai_customer)): ?><li id="shanghai" data-type="shanghai" class="position_a"></li><?php endif; ?>
        <?php if(!empty($jiangxi_customer)): ?><li id="jiangxi" data-type="jiangxi" class="position_a"></li><?php endif; ?>
        <?php if(!empty($shanxi_customer)): ?><li id="shanxi" data-type="shanxi" class="position_a"></li><?php endif; ?>
        <?php if(!empty($shandong_customer)): ?><li id="shandong" data-type="shandong" class="position_a"></li><?php endif; ?>
        <?php if(!empty($liaoning_customer)): ?><li id="liaoning" data-type="liaoning" class="position_a"></li><?php endif; ?>
        <?php if(!empty($hebei_customer)): ?><li id="hebei" data-type="hebei" class="position_a"></li><?php endif; ?>
        <?php if(!empty($jilin_customer)): ?><li id="jilin" data-type="jilin" class="position_a"></li><?php endif; ?>
        <?php if(!empty($heilongjiang_customer)): ?><li id="heilongjiang" data-type="heilongjiang" class="position_a"></li><?php endif; ?>
        <?php if(!empty($henan_customer)): ?><li id="henan" data-type="henan" class="position_a"></li><?php endif; ?>
        <?php if(!empty($neimenggu_customer)): ?><li id="neimenggu" data-type="neimenggu" class="position_a"></li><?php endif; ?>
        <?php if(!empty($fujian_customer)): ?><li id="fujian" data-type="fujian" class="position_a"></li><?php endif; ?>
        <?php if(!empty($guangdong_customer)): ?><li id="guangdong" data-type="guangdong" class="position_a"></li><?php endif; ?>
        <?php if(!empty($ningxia_customer)): ?><li id="ningxia" data-type="ningxia" class="position_a"></li><?php endif; ?>
        <?php if(!empty($shanxi_A_customer)): ?><li id="name="shanxi_A" data-type="name="shanxi_A" class="position_a"></li><?php endif; ?>
        <?php if(!empty($anhui_customer)): ?><li id="anhui" data-type="anhui" class="position_a"></li><?php endif; ?>
        <?php if(!empty($hunan_customer)): ?><li id="hunan" data-type="hunan" class="position_a"></li><?php endif; ?>
        <?php if(!empty($hubei_customer)): ?><li id="hubei" data-type="hubei" class="position_a"></li><?php endif; ?>
        <?php if(!empty($xianggang_customer)): ?><li id="xianggang" data-type="xianggang" class="position_a"></li><?php endif; ?>
        <?php if(!empty($aomen_customer)): ?><li id="aomen" data-type="aomen" class="position_a"></li><?php endif; ?>
        <?php if(!empty($taiwan_customer)): ?><li id="taiwan" data-type="taiwan" class="position_a"></li><?php endif; ?>
        <?php if(!empty($guangxi_customer)): ?><li id="guangxi" data-type="guangxi" class="position_a"></li><?php endif; ?>
        <?php if(!empty($guizhou_customer)): ?><li id="guizhou" data-type="guizhou" class="position_a"></li><?php endif; ?>
        <?php if(!empty($sichuan_customer)): ?><li id="sichuan" data-type="sichuan" class="position_a"></li><?php endif; ?>
        <?php if(!empty($yunnan_customer)): ?><li id="yunnan" data-type="yunnan" class="position_a"></li><?php endif; ?>
        <?php if(!empty($xizang_customer)): ?><li id="xizang" data-type="xizang" class="position_a"></li><?php endif; ?>
        <?php if(!empty($gansu_customer)): ?><li id="gansu" data-type="gansu" class="position_a"></li><?php endif; ?>
        <?php if(!empty($qinghai_customer)): ?><li id="qinghai" data-type="qinghai" class="position_a"></li><?php endif; ?>
        <?php if(!empty($xinjiang_customer)): ?><li id="xinjiang" data-type="xinjiang" class="position_a"></li><?php endif; ?>
        <?php if(!empty($hainan_customer)): ?><li id="hainan" data-type="hainan" class="position_a"></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="e_map_info">
        <?php if(is_array($my_map)): $i = 0; $__LIST__ = $my_map;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="m_content m_<?php echo ($vo['pinyin']); ?> hide" data-panel="<?php echo ($vo['pinyin']); ?>">
          <i></i>
          <h4><?php echo ($vo['title']); ?></h4>
          <ul>
              <li><a href="javascript:;"><img src="<?php echo thumb($vo['image'],218,84);?>"  width="218" height="84"></a></li>
              <?php if(($vo['pinyin']) == "beijing"): if(is_array($beijing_customer)): $i = 0; $__LIST__ = $beijing_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "hebei"): if(is_array($hebei_customer)): $i = 0; $__LIST__ = $hebei_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "liaoning"): if(is_array($liaoning_customer)): $i = 0; $__LIST__ = $liaoning_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "shandong"): if(is_array($shandong_customer)): $i = 0; $__LIST__ = $shandong_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "shanxi"): if(is_array($shanxi_customer)): $i = 0; $__LIST__ = $shanxi_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "chongqing"): if(is_array($chongqing_customer)): $i = 0; $__LIST__ = $chongqing_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "jiangxi"): if(is_array($jiangxi_customer)): $i = 0; $__LIST__ = $jiangxi_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "jiangsu"): if(is_array($jiangsu_customer)): $i = 0; $__LIST__ = $jiangsu_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "shanghai"): if(is_array($shanghai_customer)): $i = 0; $__LIST__ = $shanghai_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "zhejiang"): if(is_array($zhejiang_customer)): $i = 0; $__LIST__ = $zhejiang_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
               <?php if(($vo['pinyin']) == "jilin"): if(is_array($jilin_customer)): $i = 0; $__LIST__ = $jilin_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
               <?php if(($vo['pinyin']) == "heilongjiang"): if(is_array($heilongjiang_customer)): $i = 0; $__LIST__ = $heilongjiang_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "neimenggu"): if(is_array($neimenggu_customer)): $i = 0; $__LIST__ = $neimenggu_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "guangdong"): if(is_array($guangdong_customer)): $i = 0; $__LIST__ = $guangdong_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
               <?php if(($vo['pinyin']) == "ningxia"): if(is_array($ningxia_customer)): $i = 0; $__LIST__ = $ningxia_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "shanxi_A"): if(is_array($shanxi_A_customer)): $i = 0; $__LIST__ = $shanxi_A_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "henan"): if(is_array($henan_customer)): $i = 0; $__LIST__ = $henan_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "anhui"): if(is_array($anhui_customer)): $i = 0; $__LIST__ = $anhui_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "hunan"): if(is_array($hunan_customer)): $i = 0; $__LIST__ = $hunan_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "hubei"): if(is_array($hubei_customer)): $i = 0; $__LIST__ = $hubei_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "xianggang"): if(is_array($xianggang_customer)): $i = 0; $__LIST__ = $xianggang_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "aomen"): if(is_array($aomen_customer)): $i = 0; $__LIST__ = $aomen_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "taiwan"): if(is_array($taiwan_customer)): $i = 0; $__LIST__ = $taiwan_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "guangxi"): if(is_array($guangxi_customer)): $i = 0; $__LIST__ = $guangxi_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "guizhou"): if(is_array($guizhou_customer)): $i = 0; $__LIST__ = $guizhou_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "sichuan"): if(is_array($sichuan_customer)): $i = 0; $__LIST__ = $sichuan_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "yunnan"): if(is_array($yunnan_customer)): $i = 0; $__LIST__ = $yunnan_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "xizang"): if(is_array($xizang_customer)): $i = 0; $__LIST__ = $xizang_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
              <?php if(($vo['pinyin']) == "gansu"): if(is_array($gansu_customer)): $i = 0; $__LIST__ = $gansu_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
               <?php if(($vo['pinyin']) == "qinghai"): if(is_array($qinghai_customer)): $i = 0; $__LIST__ = $qinghai_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
               <?php if(($vo['pinyin']) == "xinjiang"): if(is_array($xinjiang_customer)): $i = 0; $__LIST__ = $xinjiang_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
               <?php if(($vo['pinyin']) == "hainan"): if(is_array($hainan_customer)): $i = 0; $__LIST__ = $hainan_customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
          </ul>
          </ul>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    
    var timer = {};

    $('#m_btn').delegate('.position_a', 'mouseenter', function(){
        var self = $(this);
        var tp = self.attr('data-type');
        clearTimeout(timer[tp]);
        timer[tp] = setTimeout(function(){
            self.addClass('hover');
            $('div[data-panel=' + tp + ']').removeClass('hide');
        },100);
    }).delegate('li', 'mouseleave', function(){
        var self = $(this);
        var tp = self.attr('data-type');
        clearTimeout(timer[tp])
        timer[tp] = setTimeout(function(){
            self.removeClass('hover');
            $('div[data-panel=' + tp + ']').addClass('hide');
        },100);
    });
    
    $(document.body).delegate('div.m_content', 'mouseenter', function(){
        clearTimeout(timer[$(this).attr('data-panel')]);
    }).delegate('div.m_content', 'mouseleave', function(){
        $(this).addClass('hide');
        $('li[data-type='+ $(this).attr('data-panel') +']').removeClass('hover');
    });
    
});
</script>

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