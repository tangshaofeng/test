<?php
/**
 * @Author: xiaochenchen
 * @Date:   2015-12-01 17:38:53
 * @Last Modified by:   xiaochenchen
 * @Last Modified time: 2016-07-06 21:28:49
 */
namespace Yunzhansystem\Model;
use Think\Model;
class AdminModel extends Model {
    protected $_validate = array(
        array('verify','check_verify','验证码错误！',1,'function',4),
        array('username','require','用户名必填！'),
        array('password','require','密码必填！',2),
        array('password','require','密码必填！',2,'',4)
    );

    protected $_auto = array(
        //array('password','','密码必填！')
    );

    Public function login()
    {
        $password = I('post.password');
        $username = I('post.username');
        $user=$this->where(array('username'=>$username))->find();
        if ($user['password'] !== password_md5($password)) {
                $this->error = '密码错误！';
                return false;
        }
         /* 更新登录信息 */
                $data = array(
                    'user_id'             => $user['user_id'],
                    'login'           => array('exp', '`login`+1'),
                    'last_login_time' => NOW_TIME,
                    'last_login_ip'   => get_client_ip(1),
                );
                //print_r($data); exit;
                $this->save($data);
                /* 记录登录SESSION和COOKIES */
                $auth = array(
                    'uid'             => $user['user_id'],
                    'username'        => $user['username'],
                    'last_login_time' => $user['last_login_time'],
                );
                session('user_auth', $auth);
                session('user_auth_sign', data_auth_sign($auth));
                return true;
    }