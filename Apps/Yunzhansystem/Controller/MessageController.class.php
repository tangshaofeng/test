<?php
/**
 * @Author: xiaochenchen
 * @Date:   2016-01-04 11:33:50
 * @Last Modified by:   xiaochenchen
 * @Last Modified time: 2016-08-26 16:15:16
 */

namespace Yunzhansystem\Controller;
use Think\Controller;
class MessageController extends Controller {

    /* 初始化 */
    public function _initialize () {
        check_login();
        $this->MessageModel=D('Message');
    }


    public function index(){
        $str ='1=1 ';$page_num = 0; $page_num = 10;
        $count = $this->MessageModel->where($str)->count();
        $Page = new \Think\Page($count,25);
        $show = $Page->show();// 分页显示输出
        $list = $this->MessageModel->where($str)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }



    public function add()
    {
        if (IS_POST){
            if ($this->MessageModel->create()) {
                if (false !== $this->MessageModel->add()) {
                  $this->success('数据添加成功！',U('Yunzhansystem/Message/index'));
                  exit;
                } else {
                  $this->error('数据写入错误');
                }
            } else {
            // 字段验证错误
            $this->error($this->MessageModel->getError());
            }
        }
        $this->display('edit');
    }

    public function edit()
    {
        if (IS_POST){
            if ($this->MessageModel->create()) {
                if (false !== $this->MessageModel->save()) {
                  $this->success('数据修改成功！',U('Yunzhansystem/Message/index'));
                  exit;
                } else {
                  $this->error('数据修改错误');
                }
            } else {
            // 字段验证错误
            $this->error($this->MessageModel->getError());
            }
        }

        $id=I('get.id');
        if (empty($id)){$this->error('非法操作');}
        $info=$this->MessageModel->find($id);
        $this->assign('id',$id);
        $this->assign('info',$info);
        $this->display();
    }



    public function more_del()
    {
       if (IS_POST){
         $spaceid=I('post.id');
         if (empty($spaceid)){$this->error('请选择操作对象');}
         foreach ($spaceid as $key=>$val){
            $this->MessageModel->where('id='.$val)->delete();
         }
         $this->redirect(U('Yunzhansystem/Message/index'));
       }
       else
       {
       $this->error('非法操作');
       }

    }


}