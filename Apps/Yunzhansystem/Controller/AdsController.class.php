<?php
/**
 * @Author: xiaochenchen
 * @Date:   2016-01-04 11:33:50
 * @Last Modified by:   xiaochenchen
 * @Last Modified time: 2017-02-23 11:04:55
 */

namespace Yunzhansystem\Controller;
use Think\Controller;
class AdsController extends Controller {

    /* 初始化 */
    public function _initialize () {
        check_login();
        $this->AdsModel=D('ads');
        $this->AdstypeModel=D('adstype');
    }


    public function index(){
        $catid=I('get.catid');
        if (empty($catid)){$this->error('非法操作');}
        $category = $this->AdstypeModel->find($catid);
        $this->assign('category',$category);
        $str ='1=1 ';$page_num = 0; $page_num = 10;
        $str .= ' AND catid='.$catid;
        $count = $this->AdsModel->where($str)->count();
        $Page = new \Think\Page($count,25);
        $show = $Page->show();// 分页显示输出
        $list = $this->AdsModel->where($str)->order('sort asc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key=>$val){
            if ($val['enddate'] < time()){
              $list[$key]['status']='<font class="red">已过期</font>';
            }else{
               $list[$key]['status']='显示';
            }
        }

        $this->assign('M_count',M_total_count('Ads',$str));
        $this->assign('list',$list);
        $this->assign('catid',$catid);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }





    public function add()
    {
        if (IS_POST){
            $startdate=I('post.startdate');
            $enddate=I('post.enddate');
            $catid=I('post.catid');
            if ($this->AdsModel->create()) {
                $this->AdsModel->startdate = strtotime($startdate);
                $this->AdsModel->enddate = strtotime($enddate);
                if (false !== $this->AdsModel->add()) {
                  $this->success('数据添加成功！',U('/index.php?m=Yunzhansystem&c=Ads&a=index&catid='.$catid));
                  exit;
                } else {
                  $this->error('数据写入错误');
                }
            } else {
            // 字段验证错误
            $this->error($this->AdsModel->getError());
            }
        }

        $catid=I('get.catid');
        if (empty($catid)){$this->error('非法操作');}
        $info['image'] = "nopic_small.gif";
        $this->assign('info',$info);
        $this->assign('catid',$catid);
        $this->display('edit');
    }



    public function edit()
    {
         if (IS_POST){
            $startdate=I('post.startdate');
            $enddate=I('post.enddate');
            $catid=I('post.catid');
            if ($this->AdsModel->create()) {
                $this->AdsModel->startdate = strtotime($startdate);
                $this->AdsModel->enddate = strtotime($enddate);
                if (false !== $this->AdsModel->save()) {
                  $this->success('数据修改成功！',U('/index.php?m=Yunzhansystem&c=Ads&a=index&catid='.$catid));
                  exit;
                } else {
                  $this->error('数据修改错误');
                }
            } else {
            // 字段验证错误
            $this->error($this->AdsModel->getError());
            }
        }
        $id=I('get.id');$catid=I('get.catid');
        if (empty($catid) || empty($id)){$this->error('非法操作');}
        $info=$this->AdsModel->find($id);
        if (empty($info['image'])){
             $info['image'] = "nopic_small.gif";
        }
        $this->assign('catid',$catid);
        $this->assign('id',$id);
        $this->assign('info',$info);
        $this->display();
    }




     public function more_del()
    {

        $status=I('get.action');
        $id=I('post.id');
        $catid=I('get.catid');
        $sort=I('post.listorders');
        if (empty($status)){$this->error('非法操作！');}
        if($status==2){
           if (empty($id)){$this->error('请选择操作对象！');}
        }
        //删除操作
        if ($status==2)
        {
           foreach ($id as $val)
           {
            
             $return=$this->AdsModel->where('id='.$val)->delete();
           }
        }
        //排序操作
        if($status==1)
        {
            foreach ($sort as $key=>$val)
           {
             $data=array();
             $data['sort']=$val;
             $return=$this->AdsModel->where('id='.$key)->save($data);
           }
        }

        $this->success('数据操作成功！',U('/index.php?m=Yunzhansystem&c=Ads&a=index&catid='.$catid));
        
    }


}