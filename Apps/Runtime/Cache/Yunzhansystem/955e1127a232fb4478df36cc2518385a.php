<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link rel="stylesheet" href="/Public/Yunzhansystem/css/style.css?v=3">
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<script src="/Public/Yunzhansystem/js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/Public/Yunzhansystem/js/highcharts.js" type="text/javascript" charset="utf-8"></script>
<style>
    #container{width:98%;}#container_area{width:98%;}
    .remarks{width:100%; padding-top:20px; background:#ffffff;line-height:30px; min-height:100px;}
    .remarks dl{padding:20px;width:100%;}
    .margin-10{overflow:hidden; margin:10px;}
</style>
</head>
<body>
<div class="margin-10">

<div class="col-tab">
    <ul class="tabBut cu-li">
    <li onclick="SwapTab('setting','on','',6,1);" class="on" id="tab_setting_1">综合访问量</li>
    <li onclick="SwapTab('setting','on','',6,2);" id="tab_setting_2">地域分析图</li>
    </ul>
    <!--{div_setting_1}-->
    <div class="contentList" id="div_setting_1" style="background:#ffffff;">
        <div style="height:20px; background:#ffffff;"></div>
        <div id="container"></div>
    </div>
    <!--{div_setting_2}-->
    <div class="contentList hidden" id="div_setting_2" style="background:#ffffff;">
        <div style="height:20px; background:#ffffff;"></div>
        <div id="container_area"></div>
    </div>

</div>

<div class="remarks">
        <dl>
        <dt>注：统计数据仅供SEO网站优化参考,默认显示一周之内统计数据</dt>
        <dt>注：统计数据默认存活周期为一个月，将会定期删除历史统计数据</dt>
        </dl>
</div>

</div>
<script type="text/javascript" charset="utf-8">
    $(function () {
    $('#container').highcharts({
        title: {
            text: '网站综合访问量统计分析图',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: [<?php echo ($time_str); ?>]
        },
        yAxis: {
            title: {
                text: 'Page view'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: 'PV'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Page view',
            data: [<?php echo ($scount_str); ?>]
        },{
            name: 'IP',
            data: [<?php echo ($icount_str); ?>]
        }]
    });

    $('#container_area').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '网站访问量地域分析图'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Geographical distribution',
            data: [
            <?php if(is_array($area_fenbu)): $i = 0; $__LIST__ = $area_fenbu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>[<?php echo ($val); ?>],<?php endforeach; endif; else: echo "" ;endif; ?>
            ]
        }]
    });
});
                

</script>
<script>
    window.top.$('#display_center_id').css('display','none');
    function SwapTab(name,cls_show,cls_hide,cnt,cur){
        for(i=1;i<=cnt;i++){
            if(i==cur){
                 $('#div_'+name+'_'+i).show();
                 $('#tab_'+name+'_'+i).attr('class',cls_show);
            }else{
                 $('#div_'+name+'_'+i).hide();
                 $('#tab_'+name+'_'+i).attr('class',cls_hide);
            }
        }
    }

</script>
</body>
</html>