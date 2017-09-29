<?php
namespace Yunzhansystem\Controller;
use Think\Controller;
class PublicController extends Controller {

    /* 初始化 */
    public function _initialize () {
       
        $this->AdminModel=D('Admin');
        $this->MenuModel=D('Menu');
    }
    
    public function index()
    {   
        check_login();
        $this->display();
    }


    /*管理员登录*/
    public function login(){
        if (IS_POST){
        
            $username=I('post.username');
            $password=I('post.password');
            $verify=I('post.verify');
            if (!check_verify($verify)){
                $this->error('验证码错误！',U('Yunzhansystem/Public/login'));
            }
            $user=$this->AdminModel->where(array('username'=>I('username')))->field(true)->find();
            if (empty($user)){
                $this->error('管理员不存在！',U('Yunzhansystem/Public/login'));
            }

            if ($user['userpwd'] !== md5($password)) {
                $this->error('密码错误！',U('Yunzhansystem/Public/login'));
            }
            $auth = array(
                    'uid'             => $user['id'],
                    'username'        => $user['username']
            );
            $last_login_time=date('Y-m-d H:i:s',$user['last_login_time']);
            //创建session
            session('user_auth', $auth);
            session('last_login_time', $last_login_time);
            session('last_login_ip', $user['last_login_ip']);
            session('system_level', $user['level']);
            //更新登录时间和登录ip
            $data['last_login_time'] = time();
            $data['last_login_ip'] =  $_SERVER["REMOTE_ADDR"];
            $this->AdminModel->where('id='.$user['id'])->save($data);
            $this->redirect('Index/index');
        }

        $this->display();
        
    }

    /*退出*/
    public function logout()
    {
        session('user_auth',null);
        $this->success('退出成功');
        $this->redirect('Public/login');
        
    }

    /*左侧菜单栏*/
    public function menu($mid = 0)
    {
        if ($mid==0){
            $mid=1;
        }
        /*获取权限*/
        $user_auth = session('user_auth');

        $Admin_root = $this->AdminModel->find($user_auth['uid']);
        $roots = unserialize($Admin_root['root']);
        foreach ($roots as $val){
              if (is_array($val)){
                 foreach ($val as $va){
                     if (is_array($va)){
                        foreach ($va as $v){
                            $Arr_str .= $v.','; 
                        }
                     }else{
                        $Arr_str .= $va.','; 
                     }
                 }
              }else{
               $Arr_str .= $val.','; 
              }
              
        }
        $root_array = explode(',',$Arr_str);

        $tree_list = $this->MenuModel->where('pid='.$mid.' and display=1')->order('sort asc,id desc')->select();
        foreach ($tree_list as $val){
            //if (in_array($val['id'],$root_array)){
                $tree_lists[]=$val;
            //}
            
        }
        $this->assign('tree_list',$tree_lists);
        $this->display('Public/menu');
    }

      /* 验证码 */
    public function verify(){
        $verify = new \Think\Verify();
        $verify->length = 4;
        $verify->fontSize = 25;
        $verify->entry();
    }



     /* 更新全站缓存 */
    public function deleteCache() {
        delete_dir(RUNTIME_PATH);
        $this->success('更新成功',U('Yunzhansystem/Index/indexs'));
        exit;
    }

}