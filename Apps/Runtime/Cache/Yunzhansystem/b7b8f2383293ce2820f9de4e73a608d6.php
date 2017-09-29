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
<div class="fl">留言列表</div>
<div class="fr">
</div>
</h6>
</div>

<table width="100%">
        <thead>
            <tr>
            <th width="26" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
            <th width="100" align="center">ID</th>
            <th>姓名/公司名称</th>
            <th width="100">手机号码</th>
            <!--<th width="100">QQ号码</th>-->
            <th width="120">留言时间</th>
            <th width="100">管理操作</th>
            </tr>
        </thead>
<tbody>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        <td width="26" align="center"><input type="checkbox" class="inputcheckbox " name="id[]" id="id[]" value="<?php echo ($val['id']); ?>"></td>
       
        <td width="100" align="center"><?php echo ($val['id']); ?></td>
        <td>
        <a href="javascript:;"><span><?php echo ($val['company_title']); ?></span></a>
        </td>
        <td width="100" align="center"><?php echo ($val['company_mobile']); ?></td>
        <!--<td width="200" align="center"><?php echo ($val['company_qq']); ?></td>-->
        <td width="200" align="center"><?php echo date('Y-m-d h:i',$val['create_time']);?></td>
        <td width="100" align="center">
        <a href="<?php echo U('Yunzhansystem/Message/edit?id='.$val['id']);?>">查看</a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
             </tbody>
     </table>
    <div style="height:50px;"></div>
    <div style="position:fixed; bottom:0px; width:100%; left:0px;" class="btn">
    <div style="float:left;">
         <label for="check_box">全选/取消</label>
        <input type="hidden" id="method" value="" name="method">
        <input type="button" class="button" value="删除" onclick="myform.action='<?php echo U('Yunzhansystem/Message/more_del?status=1');?>';myform.submit();">
        
        </div>
            <div style="padding:0px; margin-right:20px;" id="pages"><?php echo ($page); ?></div>
<div style="clear:both;"></div>     
            </div>
</div>
</form>
</div>
</body>
</html>