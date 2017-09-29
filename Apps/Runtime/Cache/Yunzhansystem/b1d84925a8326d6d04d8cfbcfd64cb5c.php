<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>提示信息</title>
<style>
body{background:#f1f1f1;}
.error {color:#666666; margin-top: 100px;margin-left:50px;}
.error span{font-family: "微软雅黑"; color: #333;font-size:36px; display:block; line-height:50px; height:60px;}
.error span img{margin-right:10px;}
</style>
</head>
<body>
<div class="error">
    <span> <!--:)--><img src="/Public/Yunzhansystem/images/select_ts.png" width="50" alt="" align="left"> <?php echo $message;?></span>
    页面自动  跳转  等待时间：<b id="wait"> <?php echo($waitSecond); ?> </b><a id="href" href="<?php echo($jumpUrl); ?>">手动跳转</a>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait');
var href = document.getElementById('href').href;
var interval = setInterval(function(){
  var time = --wait.innerHTML;
  if(time <= 0) {
    location.href = href;
    clearInterval(interval);
  };
}, 1000);
})();
</script>
</body>
</html>