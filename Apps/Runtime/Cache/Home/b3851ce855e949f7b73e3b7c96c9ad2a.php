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
<script src="/Public/Home/js/tab.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Home/js/jquery.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.flexslider-min.js"></script>
<script src="/Public/Home/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/Public/Home/js/scroll.js" type="text/javascript"></script>
</head>
<body>
<div id="waps">
  <div class="header">
    <div class="top">
      <script type="text/javascript">
      $(function(){
        $("#showEwm").hover(
        function(){
          $("#bigewm").show();
        },
        function(){
          $("#bigewm").hide();
        }
        );
      });
      </script>
      <div class="top_1">
        <div id="showEwm"><img src="/Public/Home/images/wx_ico.png" style="margin-top:-8px;" align="middle">  关注识习网微信
        <span id="bigewm">
        <?php if(is_array($wxcode)): $i = 0; $__LIST__ = $wxcode;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="<?php echo thumb($vo['image']);?>" alt="<?php echo ($vo['title']); ?>" title="<?php echo ($vo['alt']); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
        </span>
        </div>
        <p><i>欢迎来到识习网，全国党建和廉政课程精准化对接查询平台！</i></p>
      </div>

    </div>
  <div class="head_1">
    <div class="wd1100">
      <div class="logo left"><a href="/"><img src="/Public/Home/images/logo.png" alt="识习网"></a></div>
    <!--搜索-->
    <div class="right">
      <div class="option">
      <script>
      $(function(){
        $("#s").change(function(){
          var thval=$(this).val();
          var txt="";
          if(thval==2){mid=2;txt="请输入专家姓名";}
          if(thval==3){mid=3;txt="请输入课程名称";}
          if(thval==4){mid=4;txt="请输入关键词";}
          $("#mid").val(mid);
          $("#search-keyword").val(txt);
        });
        /*清空搜索内容*/
        $("#search-keyword").focus(function(){
        $("#search-keyword").val("");
        });
      });



      function check(){
        if($("#s").val()==1){
          alert("请选择搜索类型！");
          return false;
        }
        return true;
      }
      </script>
      <select name="option" size="1" id="s" class="opheig">
        <option value="1" disabled="" selected="">请选择搜索类型</option>
        <option value="2">按专家姓名查询</option>
        <option value="3">按课程名称查询</option>
        <option value="4">按关键词搜索查询</option>
      </select>
      </div>
    <div class="search">
      <div class="form">  
        <form name="formsearch" id="myForm" action="<?php echo U('search');?>" method="post" onsubmit="return check();">
        <input name="mid" id="mid" type="hidden">
        <input name="q" class="search-keyword" id="search-keyword" value="" type="text">
        <input value="搜索" class="search-submit" type="submit">
        </form>
      </div>
    </div>
    </div>
    <!--搜索结束-->
    </div>
  </div>
  </div>
  <div id="nav">
    <div class="nav_1">
    <ul>
    <li class="li_0"><a href="/">首 页</a></li>
    <?php if(is_array($NAVS)): $i = 0; $__LIST__ = $NAVS;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="li_2"><a href="<?php echo ($vo['url']); ?>" <?php if(($vo['action']) == "1"): ?>class="styly_a"<?php endif; ?>><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <p><img src="/Public/Home/images/telphone.png" alt="" style="margin-top:13px;"></p>
    </div>
  </div>
  <div style="clear:both;"></div>
  <div class="hot-section">
    <div class="wd1100">热词：
    <?php if(is_array($hot_key)): $i = 0; $__LIST__ = $hot_key;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['title']); ?></a>|<?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
  
<div id="container">
   <div id="demo01" class="slides-section">
    <ul class="slides">
        <li><div class="img"><img src="<?php echo thumb($topinfo['image']);?>"></div></li>
    </ul>
    </div>
</div>
<div class="middle">
    <div class="wd1100 bgwrite teacher-section">
        <ul class="teacher-box-ul">
        <?php if(is_array($childs)): $i = 0; $__LIST__ = $childs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if($i <= 2): ?><li <?php if(($i) == "2"): ?>style="float:right;"<?php endif; ?>><a href="<?php echo ($val['url']); ?>"><img src="<?php echo thumb($val['image'],540,200);?>" alt="<?php echo ($i); ?>" width="540" height="200"></a></li>
        <?php else: ?>
            <li class="t-li"><a href="<?php echo ($val['url']); ?>"><?php echo ($val['title']); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>

  <div class="bottom">
    <div class="bottom_1">
    <?php echo (html_entity_decode($config['content'])); ?>
    </div>
  </div>
</div>
    <script>
    window.onload = function() {
    var oDiv = document.getElementById("tab");
    var oLi = oDiv.getElementsByTagName("div")[0].getElementsByTagName("li");
    var aCon = oDiv.getElementsByTagName("div")[1].getElementsByTagName("div");
    var timer = null;
    for (var i = 0; i < oLi.length; i++) {
      oLi[i].index = i;
      oLi[i].onmouseover = function() {
          show(this.index);
      }
    }
    function show(a) {
      index = a;
      var alpha = 0;
      for (var j = 0; j < oLi.length; j++) {
          oLi[j].className = "";
          aCon[j].className = "";
          aCon[j].style.opacity = 0;
          aCon[j].style.filter = "alpha(opacity=0)";
      }
      oLi[index].className = "cur";
      clearInterval(timer);
      timer = setInterval(function() {
          alpha += 2;
          alpha > 100 && (alpha = 100);
          aCon[index].style.opacity = alpha / 100;
          aCon[index].style.filter = "alpha(opacity=" + alpha + ")";
          alpha == 100 && clearInterval(timer);
      },
      5)
    }
    }
    </script>
</body>
</html>