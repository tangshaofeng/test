<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link rel="stylesheet" href="/Public/Yunzhansystem/css/style.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="/Public/Yunzhansystem/js/admin_common.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/Validform_v5.3.2.js"></script>
</head>
<body>
<div class="pad-10">
<div class="table-list">
<div class="main_head">
<h6>
<div class="fl">管理员列表</div>
<div class="fr">
<a href="<?php echo U('Yunzhansystem/Admin/add');?>"><em>添加管理员</em></a>
</div>
</h6>
</div>
<table width="100%">
        <thead>
            <tr>
            <th width="5%">序号</th>
            <th>用户名</th>
            <th width="15%">添加时间</th>
            <th width="20%">操作</th>
            </tr>
        </thead>
    <tbody>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        <td align="center" width="5%"><?php echo ($val['id']); ?></td>
        <td align="center" width=""><?php echo ($val['username']); ?></td>
        <td align="center" width="15%"><?php echo date('Y-m-d H:i:s',$val['create_time']);?></td>
        <td align="center" width="10%">
        <a href="<?php echo U('Yunzhansystem/Admin/edit?id='.$val['id']);?>">修改</a> 
        <?php if($_SESSION['system_level']== 1): ?>| <a href="<?php echo U('Yunzhansystem/Admin/root?id='.$val['id']);?>">分配权限</a><?php endif; ?>
        <?php if($val['level'] != 0): ?>| <a href="javascript:confirmurl('<?php echo U('Yunzhansystem/Admin/del?id='.$val['id']);?>','确认要删除 『 {<?php echo ($val['username']); ?>} 』 吗？')">删除</a><?php endif; ?>
        </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
     </tbody>
     </table>
</div>
 <div id="pages" style="padding:0px; margin-right:20px;"></div>
</div> 
</body>
</html>