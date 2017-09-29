<?php if (!defined('THINK_PATH')) exit(); if(is_array($tree_list)): $i = 0; $__LIST__ = $tree_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><h3 class="f14"><i class="iconfont"></i><?php echo ($val['menu_name']); ?></h3>
<ul>
<?php $_result=menu_tree($val['id']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li id="_MP<?php echo ($v['id']); ?>" class="menu-item"><a href="javascript:_MP('<?php echo ($v['id']); ?>','<?php echo U($v['url']);?>');" hidefocus="true" style="outline:none;"><i class='iconfont'>&#xe63f;</i> <span><?php echo ($v['menu_name']); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul><?php endforeach; endif; else: echo "" ;endif; ?>
<script type="text/javascript">
$(function(){
//绑定单击事件
$("#leftMain h3").click(function(){
if ($(this).next('ul').is(":hidden")) {
    $(this).next('ul').slideDown();
} else {
    $(this).next('ul').slideUp();
}
})
})
</script>