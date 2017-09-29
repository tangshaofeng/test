<?php
/**
 * @Author: xiaochenchen
 * @Date:   2016-01-04 10:51:04
 * @Last Modified by:   xiaochenchen
 * @Last Modified time: 2016-07-06 20:39:14
 */

namespace Yunzhansystem\Controller;
use Think\Controller;
class ConfigController extends Controller {

    /* 初始化 */
    public function _initialize () {
        check_login();
        $this->ConfigModel=D('config');
    }


    public function index(){
        if (IS_POST) {
            if ($this->ConfigModel->create()) {
                if (false !== $this->ConfigModel->save()) {
                  $this->success('数据更新成功！');
                  exit;
                } else {
                  $this->error('数据更新失败');
                }
            } else {
            // 字段验证错误
            $this->error($this->ConfigModel->getError());
            }
        }
        $id=1;
        $info=$this->ConfigModel->find($id);
        if (empty($info)){$this->error('内容未找到');exit;}
        $this->assign('info',$info);
        $this->display();
    }


}