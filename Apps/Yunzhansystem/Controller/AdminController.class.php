<?php
/**
 * @Author: xiaochenchen
 * @Date:   2016-01-07 10:57:54
 * @Last Modified by:   xiaochenchen
 * @Last Modified time: 2016-07-07 14:28:16
 */

namespace Yunzhansystem\Controller;
use Think\Controller;
class AdminController extends Controller {

    /* 初始化 */
    public function _initialize () {
        check_login();
        $this->AdminModel=D('Admin');
        $this->MenuModel=D('Menu');
    }


    public function index(){
        
       
        $list = $this->AdminModel->where('status=0')->select();
        $this->assign('list',$list);
        $this->display();
    }





    public function add()
    {
        if (IS_POST){
            $data['username'] = I('post.username');
            $data['userpwd'] = md5(I('post.userpwd'));
            $data['create_time'] = time();
            if ($this->AdminModel->create($data)) {
               
                if (false !== $this->AdminModel->add()) {
                  $this->success('数据添加成功！',U('Yunzhansystem/Admin/index'));
                  exit;
                } else {
                  $this->error('数据写入错误');
                }
            } else {
            // 字段验证错误
            $this->error($this->AdminModel->getError());
            }
        }

       
        $this->display('edit');
    }



    public function edit()
    {
         if (IS_POST){
            $data['id'] = I('post.id');
            $data['username'] = I('post.username');
            $data['userpwd'] = md5(I('post.userpwd'));
            
            if ($this->AdminModel->create($data)) {
                if (false !== $this->AdminModel->save()) {
                  $this->success('数据修改成功！',U('Yunzhansystem/Admin/index'));
                  exit;
                } else {
                  $this->error('数据修改错误');
                }
            } else {
            // 字段验证错误
            $this->error($this->AdminModel->getError());
            }
        }
        $id=I('get.id');
        if (empty($id)){$this->error('非法操作');}
        $info=$this->AdminModel->find($id);
        $this->assign('id',$id);
        $this->assign('info',$info);
        $this->display();
    }



     public function del()
    {
        $id=I('get.id');
        if (empty($id)){$this->error('非法操作');}
        if (false !== $this->AdminModel->delete($id)) {
                  $this->success('数据删除成功！',U('Yunzhansystem/Admin/index'));
                  exit;
        } else {
                  $this->error('数据修改错误');
        }

    }

    public function root()
    {
    if (IS_POST){
        $root = I('post.root');

        $data['id'] = I('post.id');
        $data['root'] = serialize($root);
        
        if ($this->AdminModel->create($data)) {
            if (false !== $this->AdminModel->save()) {
                  $this->success('数据修改成功！',U('Yunzhansystem/Admin/index'));
                  exit;
                } else {
                  $this->error('数据修改错误');
                }
            } else {
            // 字段验证错误
            $this->error($this->AdminModel->getError());
        }
    }
    $id=I('get.id');
    if (empty($id)){$this->error('非法操作');}
    $info=$this->AdminModel->find($id);
    $menu_list = $this->MenuModel ->where('pid=0 and display=1')->select();
    $info['root']=unserialize($info['root']);

    $this->assign('id',$id);
    $this->assign('info',$info);
    $this->assign('menu_list',$menu_list);
    $this->display();
    }





}