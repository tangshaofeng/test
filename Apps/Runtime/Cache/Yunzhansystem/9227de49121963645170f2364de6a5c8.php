<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<script src="/Public/Yunzhansystem/js/jquery.min.js" type="text/javascript" language="javascript"></script>
<script src="/Public/Yunzhansystem/js/admin_common.js" type="text/javascript" language="javascript"></script>
</head>
<body>
<div class="pad-10">
<div class="explain-col">友情提示:删除栏目分类的时候，栏目下级的文章也会随之删除，请谨慎操作！</div>

<form name="myform" id="myform" action="" method="post">
<div class="quick_btn clearfix">
<div class="pad-20">
       <span class="l_f">
       <label for="check_box">全选/取消</label>
        <a class="btn-warning " title="排序" href="javascript:void(0);" onclick="myform.action='<?php echo U('Yunzhansystem/Category/more_del?status=1');?>';myform.submit();">排序</a>
        <?php if(($session_system_level) == "1"): ?><a class="btn-danger" title="批量删除" href="javascript:void(0)" onclick="myform.action='<?php echo U('Yunzhansystem/Category/more_del?status=2');?>';myform.submit();">批量删除</a>
        <a class="btn-warning " title="添加信息" href="<?php echo U('Yunzhansystem/Category/add');?>" >添加栏目</a><?php endif; ?>
       </span>
       <span class="r_f">共：<b> <?php echo ($M_count); ?> </b> 条信息</span>
</div>
</div>

<div class="table-list">
<div class="main_head">
<h6>
<div class="fl">栏目列表</div>
<div class="fr">
</div>
</h6>
</div>
<table width="100%">
        <thead>
            <tr>
             <th width="5%"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
            <th width="10%">排序</th>
            <th width="10%">catid</th>
            <th>栏目名称</th>
            <th width="10%">所属模型</th>
            <th width="10%">是否启用</th>
            <th width="10%">导航显示</th>
            <th width="15%">管理操作</th>
            </tr>
        </thead>
<tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
            <td width="5%" align="center"><input type="checkbox" class="inputcheckbox " name="id[]" id="id[]" value="<?php echo ($val['id']); ?>"></td>
            <td width="10%" align="center"><input type="text" name="sort[<?php echo ($val['id']); ?>]" size="3" value="<?php echo ($val['sort']); ?>" class="input-text-c input-text"></td>
            <td width="10%" align="center"><?php echo ($val['id']); ?></td>
            <td><?php echo ($val['title']); ?></td>
            <td width="10%" align="center"><?php echo ($val['type']); ?></td>
            <td width="10%" align="center"><?php echo ($val['display']); ?></td>
            <td width="10%" align="center"><?php echo ($val['nav_display']); ?></td>
            <td width="15%" align="center">
            <?php if($val['is_lower'] == 1 and $val['level'] != 2): ?><a href="<?php echo U('Yunzhansystem/Category/add?catid='.$val['id']);?>">添加下级</a><?php endif; ?>
            <a href="<?php echo U('Yunzhansystem/Category/edit?id='.$val['id']);?>">修改</a>
            <?php if(($val['is_delete'] == 1) and ($val['pid'] != 0)): ?><a href="<?php echo U('Yunzhansystem/Category/del?id='.$val['id']);?>">删除</a><?php endif; ?>
            </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
             </tbody>
     </table>

</div>
</form>
</div>
</body>
</html>