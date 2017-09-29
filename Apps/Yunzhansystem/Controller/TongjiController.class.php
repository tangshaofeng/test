<?php
namespace Yunzhansystem\Controller;
use Think\Controller;
class TongjiController extends Controller {


     /* 初始化 */
    public function _initialize () {
        check_login();
        $this->StatsModel=D('Stats');
    }

    public function index(){
        $time_str = $scount_str = $icount_str ='';
        
        for($i=7;$i>=1;$i--){
            $ip_list = $area_list = $area_array = array();
            $time = date('m-d',strtotime('-'.$i.' day'));
            $timestart = strtotime(date('Y-m-d 00:00:00',strtotime('-'.$i.' day')));
            $timeend = strtotime(date('Y-m-d 23:59:59',strtotime('-'.$i.' day')));
            $time_str .="'".$time."'".',';
            $condition =array();
            $condition['access_time']  = array('BETWEEN',array($timestart,$timeend));
            $list = $this->StatsModel->where($condition)->field('ip_address,area')->select();
            $area = array();
            foreach ($list as $val){
                $val['area'] = unserialize($val['area']);
                $lists [] = $val;
                $ip_list [$val['ip_address']][] = $val;
            }
            /*地区统计*/
            foreach ($lists as $val){
               array_push($area_array,$val['area'][1]);
            }
            $icount = count($ip_list);
            $scount = count($list);
            $scount_str .=$scount.',';
            $icount_str .=$icount.',';

        }
        $b = array_count_values($area_array);
        foreach ($b as $key=>$val){
            $total += $val;
        }
        foreach ($b as $key=>$val){
             $area_fenbu[]="'".$key."'".",".round(($val/$total)*100);
        }

        $time_str = substr($time_str,0,strlen($time_str)-1); 
        $scount_str = substr($scount_str,0,strlen($scount_str)-1); 
        $icount_str = substr($icount_str,0,strlen($icount_str)-1); 

        $this->assign('time_str',$time_str);
        $this->assign('scount_str',$scount_str);
        $this->assign('icount_str',$icount_str);
        $this->assign('area_fenbu',$area_fenbu);
        $this->display();
    }

    

}