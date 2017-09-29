<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="/Public/Yunzhansystem/js/calendar/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Yunzhansystem/js/calendar/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Yunzhansystem/js/calendar/win2k.css"/>
<script src="/Public/Yunzhansystem/js/jquery.min.js" type="text/javascript" language="javascript"></script>
<script src="/Public/Yunzhansystem/js/admin_common.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="/Public/Yunzhansystem/js/calendar/calendar.js"></script>
<script type="text/javascript" src="/Public/Yunzhansystem/js/calendar/lang/en.js"></script>
</head>
<body>
<div class="pad-10">
 
<form name="myform" id="myform" action="" method="post">
<div class="table-list">
<div class="main_head">
<h6>
<div class="fl">单页列表</div>
<div class="fr">
</div>
</h6>
</div>

<table width="100%">
        <thead>
            <tr>
            <th width="100" align="center">ID</th>
            <th>标题</th>
            <th width="100">管理操作</th>
            </tr>
        </thead>
<tbody>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if($val['type'] == 'Pages'): ?><tr>
        <td width="100" align="center"><?php echo ($val['id']); ?></td>
        <td><a href="javascript:;"><span><?php echo ($val['title']); ?></span></a></td>
        <td width="100" align="center">
        <a href="<?php echo U('Yunzhansystem/Pages/edit?id='.$val['id']);?>">修改</a></td>
    </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>

             </tbody>
     </table>
     <div style="height:50px;"></div>
    <div style="position:fixed; bottom:0px; width:100%; left:0px;" class="btn">
    <div style="float:left;">
        </div>
            <div style="padding:0px; margin-right:20px;" id="pages"><?php echo ($page); ?></div>
        <div style="clear:both;"></div>     
            </div>
</div>
</form>
</div>
</body>
</html>