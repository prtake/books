<?php

namespace app\admin\controller;

use think\Controller;

class User extends Controller
{
    //退出登录
    public function loginout()
    {
        session( null);
        $this->success('退出成功', 'admin/User/login');

    }

    public function login()
    {
        //渲染页面前先检查session是否有保存邮箱
        if (session('?email')) {
            $this->redirect('admin/Book/booklist');
            return;
        }
        //接收的数据是否由Ajax传递
        if (request()->isAjax()) {
            //获取接收数据
            $data = [
                'email' => input('email'),
                'pwd' => input('pwd'),
            ];
            //使用模块检测数据
            $res = model('User')->login($data);
            //当返回数据为1时表示登录成功-----然后使用内置方式返回数据
            if ($res == 1) {
                //将邮箱保存在session中保持登录状态
                session('email', $data['email']);
                $this->success('登录成功', 'admin/Book/booklist');
            } else {
                $this->error($res);
            }
        }
        return view();
    }

    //注册管理员账户
    public function register()
    {
        //接收的数据是否由Ajax传递
        if (request()->isAjax()) {
            //获取接收数据
            $data = [
                'email' => input('email'),
                'pwd' => input('pwd'),
                'conpwd' => input('conpwd'),
                'captcha' => input('captcha'),
            ];
            //使用模块检测数据
            $res = model('User')->register($data);
            //当返回数据为1时表示登录成功-----然后使用内置方式返回数据
            if ($res == 1) {
                $this->success('注册成功', 'admin/User/login');
            } else {
                $this->error($res);
            }
        }
        return view();
    }

    //邮箱验证码发送验证
    public function forget()
    {
        //接收的数据是否由Ajax传递
        if (request()->isAjax()) {
            //获取接收数据
            $data = [
                'email' => input('email'),
            ];
            //使用模块检测数据
            $res = model('User')->forget($data);
            //当返回数据为1时表示登录成功-----然后使用内置方式返回数据
            if ($res == 1) {
                $this->success('验证码已发送');
            } else {
                $this->error($res);
            }
        }
        return view();
    }

    //重置密码
    public function reset()
    {
        //接收的数据是否由Ajax传递
        if (request()->isAjax()) {
            //获取接收数据
            $data = [
                'email' => input('email'),
                'pwd' => input('pwd'),
                'code' => input('code'),
            ];
            //使用模块检测数据
            $res = model('User')->reset($data);
            //当返回数据为1时表示登录成功-----然后使用内置方式返回数据
            if ($res == 1) {
                $this->success('密码已重置', 'admin/User/login');
            } else {
                $this->error($res);
            }
        }
    }
}