<?php
return array(
	//'配置项'=>'配置值'
    /* URL大小写区分 */
    'URL_CASE_INSENSITIVE'  =>  true,
    'URL_MODEL' => 2, //0:普通模式,1:PATHINFO模式,2:REWRITE模式,3:兼容模式

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__COMMON__' => __ROOT__ . '/Public/Common/',
        '__HOME__'   => __ROOT__ . '/Public/' . MODULE_NAME . '/',
        '__MOBILE__'   => __ROOT__ . '/Public/' . MODULE_NAME . '/',
    ),
    /* 开启路由 */
    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
    ),
);