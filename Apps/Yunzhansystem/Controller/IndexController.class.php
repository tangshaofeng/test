<?php
namespace Yunzhansystem\Controller;
use Think\Controller;
class IndexController extends Controller {


     /* 初始化 */
    public function _initialize () {
        check_login();
    }




    public function index(){
        /*获取栏目*/
        $nav_menu = M('Menu')->where('pid=0 and display=1 ')->order('sort asc,id asc')->select();
        $this->assign('nav_menu',$nav_menu);
        $this->display('Layout/main');
    }

    public function indexs(){
    $safe_error_tit = $safe_error_msg ='';$error_Arr=array();
    $Config = M('Config')->find(1);
    $this->assign('Config',$Config);
    $new_article = M('article')->order('sort asc,create_time desc,id desc')->limit(7)->select();
    $this->assign('new_article',$new_article);
    $ip2addr = geoip(session('last_login_ip'));
    $ip2addr = unserialize($ip2addr);
    $ip2addr = $ip2addr[0].$ip2addr[1].$ip2addr[2];
    $this->assign('ip2addr',$ip2addr);
    $this->assign('error_Arr',$error_Arr);
    $this->display();
    }


}