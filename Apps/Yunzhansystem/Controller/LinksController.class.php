<?php
/**
 * @Author: xiaochenchen
 * @Date:   2016-01-04 11:33:50
 * @Last Modified by:   xiaochenchen
 * @Last Modified time: 2017-02-28 13:07:02
 */

namespace Yunzhansystem\Controller;
use Think\Controller;
class LinksController extends Controller {

    /* 初始化 */
    public function _initialize () {
        check_login();
        $this->LinksModel=D('Links');
        $this->LinksTypeModel=D('Linkstype');
    }


    public function index(){
        $str ='1=1 ';$page_num = 0; $page_num = 10;
        $count = $this->LinksModel->where($str)->count();
        $Page = new \Think\Page($count,25);
        $show = $Page->show();// 分页显示输出
        $list = $this->LinksModel->where($str)->order('sort asc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('catid',$catid);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }





    public function add()
    {
        if (IS_POST){

            if ($this->LinksModel->create()) {
                if (false !== $this->LinksModel->add()) {
                  $this->success('数据添加成功！',U('/index.php?m=Yunzhansystem&c=Links&a=index'));
                  exit;
                } else {
                  $this->error('数据写入错误');
                }
            } else {
            // 字段验证错误
            $this->error($this->LinksModel->getError());
            }
        }
        $cateType = $this->LinksTypeModel->select();
        $this->assign('cateType',$cateType);
        $this->display('edit');
    }



    public function edit()
    {
         if (IS_POST){
            
            if ($this->LinksModel->create()) {
                if (false !== $this->LinksModel->save()) {
                  $this->success('数据修改成功！',U('/index.php?m=Yunzhansystem&c=Links&a=index'));
                  exit;
                } else {
                  $this->error('数据修改错误');
                }
            } else {
            // 字段验证错误
            $this->error($this->LinksModel->getError());
            }
        }
        $id=I('get.id');
        if (empty($id)){$this->error('非法操作');}
        $cateType = $this->LinksTypeModel->select();
        $this->assign('cateType',$cateType);
        $info=$this->LinksModel->find($id);
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
            
             $return=$this->LinksModel->where('id='.$val)->delete();
           }
        }
        //排序操作
        if($status==1)
        {
            foreach ($sort as $key=>$val)
           {
             $data=array();
             $data['sort']=$val;
             $return=$this->LinksModel->where('id='.$key)->save($data);
           }
        }

        $this->success('数据操作成功！',U('/index.php?m=Yunzhansystem&c=links&a=index'));
        
    }


}