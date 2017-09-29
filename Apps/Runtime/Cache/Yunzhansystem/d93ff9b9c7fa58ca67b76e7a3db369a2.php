<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link rel="stylesheet" href="/Public/Yunzhansystem/css/style.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/style.css" rel="stylesheet"/>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/Validform_v5.3.2.js"></script>
<script src="/Public/Yunzhansystem/js/admin_common.js" type="text/javascript" language="javascript"></script>
</head>
<body>
<div class="pad-10">
<div class="explain-col">友情提示:删除广告版块的时候，版块下级的广告位也会随之删除，请谨慎操作！</div>
<form name="myform" action="<?php echo U('Yunzhansystem/Adstype/more_del');?>" method="post" id="myform">
<div class="quick_btn clearfix">
<div class="pad-20">
       <span class="l_f">
       <label for="check_box">全选/取消</label>
       <?php if(($session_system_level) == "1"): ?><a class="btn-danger" title="批量删除" href="javascript:void(0)" onclick="return confirm('确认要删除 『 选中的分类 』 吗？删除广告版块的时候，版块下级的广告位也会随之删除，请谨慎操作！');myform.submit();">批量删除</a>
        <a class="btn-warning " title="添加信息" href="<?php echo U('Yunzhansystem/Adstype/add');?>" >添加版位</a><?php endif; ?>
       </span>
       <span class="r_f">共：<b> <?php echo ($M_count); ?> </b> 条信息</span>
</div>
</div>
<div class="table-list">
<div class="main_head">
<h6>
<div class="fl">版位列表</div>
<div class="fr">
</div>
</h6>
</div>
    <table cellspacing="0" width="100%">
        <thead>
            <tr>
            <th align="center" width="6%"><input value="" id="check_box" onclick="selectall('spaceid[]');" type="checkbox"></th>
            <th >版位名称</th>
            <th align="center" width="10%">版位尺寸</th>
            <th align="center" width="10%">广告数</th>
            <th align="center" width="20%">版位描述</th>
            <th align="center" width="28%">管理操作</th>
            </tr>
        </thead>
    <tbody>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
    <td align="center">
    <input name="spaceid[]" id="spaceid[]" value="<?php echo ($val['id']); ?>" type="checkbox">
    </td>
    <td><?php echo ($val['title']); ?></td>
    <td align="center"><?php echo ($val['width']); ?>*<?php echo ($val['height']); ?></td>
    <td align="center"><?php echo total_count('版位',$val['id']);?></td>
    <td align="center"><?php echo ($val['description']); ?></td>
    <td align="center">
    <a href="<?php echo U('Yunzhansystem/Ads/index?catid='.$val['id']);?>">广告列表</a> | 
    <a href="<?php echo U('Yunzhansystem/Adstype/edit?id='.$val['id']);?>" title="修改">修改</a>
    <?php if(($val['is_del']) == "1"): ?>| 
    <a href="<?php echo U('Yunzhansystem/Adstype/del?id='.$val['id']);?>" onclick="return confirm('确认要删除 『 <?php echo ($val['title']); ?> 』 吗？删除广告版块的时候，版块下级的广告位也会随之删除，请谨慎操作！')">删除</a><?php endif; ?>
    <?php if(($val['is_lower']) == "1"): ?>| <a href="<?php echo U('Yunzhansystem/Ads/add?catid='.$val['id']);?>">添加广告</a><?php endif; ?>
    </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
    </table>
<div id="pages"><?php echo ($page); ?></div> 
</div></form>
</div>
</body></html>