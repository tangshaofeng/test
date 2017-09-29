<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/style.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/laydate.css" rel="stylesheet"/>
<script src="/Public/Yunzhansystem/js/jquery.min.js" type="text/javascript" language="javascript"></script>
<script src="/Public/Yunzhansystem/js/admin_common.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="/Public/Yunzhansystem/js/laydate.js"></script>
</head>
<body>
<div class="pad-10">
<form name="myform" id="myform" action="" method="post">
<div class="quick_btn clearfix">
<div class="pad-20">
       <span class="l_f">
       <label for="check_box">全选/取消</label>
        <a class="btn-warning " title="排序" href="javascript:void(0);" onclick="myform.action='<?php echo U('Yunzhansystem/Service/more_del?status=1');?>';myform.submit();">排序</a>
        <a class="btn-danger" title="批量删除" href="javascript:void(0)" onclick="myform.action='<?php echo U('Yunzhansystem/Service/more_del?status=2');?>';myform.submit();">批量删除</a>
        <a class="btn-warning " title="添加信息" href="<?php echo U('Yunzhansystem/Service/add');?>" >添加信息</a>
       </span>
       <span class="r_f">共：<b> <?php echo ($M_count); ?> </b> 条信息</span>
</div>
</div>

<div class="table-list">


<table width="100%">
<thead>
<tr>
    <th width="26" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
    <th width="47" align="center">排序</th>
    <th width="100" align="center">ID</th>
    <th>标题</th>
    <th width="100">分类</th>
    <th width="80">审核</th>
    <th width="118">更新时间</th>
    <th width="100">管理操作</th>
</tr>
</thead>
<tbody>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        <td width="26" align="center"><input type="checkbox" class="inputcheckbox " name="id[]" id="id[]" value="<?php echo ($val['id']); ?>"></td>
        <td width="47" align="center"><input type="text" name="listorders[<?php echo ($val['id']); ?>]" size="3" value="<?php echo ($val['sort']); ?>" class="input-text-c input-text"></td>
        <td width="100" align="center"><?php echo ($val['id']); ?></td>
        <td>
        <a href="<?php echo U('Yunzhansystem/Service/edit?id='.$val['id']);?>"><span><?php echo ($val['title']); ?></span></a>
        <?php if($val['thumb'] != ''): ?>&nbsp;&nbsp;<span class="blue">[图]</span><?php endif; ?>
        </td>
        <td width="100" align="center"><a href="<?php echo U('Yunzhansystem/Service/index?catid='.$val['catid']);?>"><?php echo ($category[$val['catid']]['title']); ?></a></td>
        <td width="80" align="center"><?php if($val['status'] == 1): ?>已审核<?php else: ?><span class="red">未审核</span><?php endif; ?></td>
        <td width="118" align="center"><?php echo date('Y-m-d h:i',$val['create_time']);?></td>
        <td width="100" align="center">
        <a href="<?php echo U('Yunzhansystem/Service/edit?id='.$val['id']);?>">修改</a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
             </tbody>
     </table>
<div id="pages"><?php echo ($page); ?></div>
<div style="clear:both;"></div>     
</div>
</form>

</div>
</body>
</html>