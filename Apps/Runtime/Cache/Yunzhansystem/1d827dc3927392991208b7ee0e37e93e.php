<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link rel="stylesheet" href="/Public/Yunzhansystem/css/style.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/Validform_v5.3.2.js"></script>
</head>
<body>
<div class="pad-10">
<form method="post" action="" name="myform">
<div class="quick_btn clearfix">
<div class="pad-20">
       <span class="l_f">
       <label for="check_box">全选/取消</label>
        <a class="btn-warning " title="排序" href="javascript:void(0);" onclick="myform.action='<?php echo U('Yunzhansystem/Links/more_del?action=1&catid='.$catid);?>';myform.submit();">排序</a>
        <a class="btn-danger" title="批量删除" href="javascript:void(0)" onclick="myform.action='<?php echo U('Yunzhansystem/Links/more_del?action=2&catid='.$catid);?>';myform.submit();">批量删除</a>
        <a class="btn-warning " title="添加信息" href="<?php echo U('Yunzhansystem/Links/add');?>" >添加信息</a>
       </span>
</div>
</div>

<div class="table-list">
<div class="main_head">
<h6>
<div class="fl">友链列表</div>
<div class="fr"></div>
</h6>
</div>
    <table class="contentWrap" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th align="center" width="30"><input onclick="selectall('id[]');" id="check_box" value="" type="checkbox"></th>
            <th width="35">ID</th>
            <th width="70">排序</th>
            <th align="center">友链标题</th>
            <th align="center" width="200">所属版位</th>
            <th align="center" width="110">管理操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
    <td align="center">
    <input value="<?php echo ($val['id']); ?>" name="id[]" type="checkbox">
    </td>
    <td align="center"><?php echo ($val['id']); ?></td>
    <td width="70"><input class="input-text-c input-text" value="<?php echo ($val['sort']); ?>" size="3" name="listorders[<?php echo ($val['id']); ?>]" type="text"></td>
    <td><?php echo ($val['title']); ?></td>
    <td align="center">
    <?php echo get_row('友链',$val['catid'],'title');?></td>
    <td align="center"><a href="<?php echo U('Yunzhansystem/Links/edit?id='.$val['id'].'&catid='.$val['catid']);?>">修改</a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
    </table>
    <div id="pages"><?php echo ($page); ?></div>
    <div style="clear:both;"></div>  
</form>
</div>
</div>
</body>
</html>