<?php

namespace app\common\model;


use think\Model;
use PHPMailer\sendEmail;

class User extends Model
{
    public function login($data)
    {
        //验证数据
        $validate = new \app\common\validate\User();
        if ($validate->scene('login')->check($data) == 0) {
            return $validate->getError();
        }

        //数据库查询数据
        //密码使用MD5加密
        $data['pwd'] = md5($data['pwd']);
        $res = $this->where($data)->find();
        if ($res) {
            return '1';
        } else {
            return '邮箱或者密码错误！';
        }
    }

    //管理员用户注册
    public function register($data)
    {
        //验证数据
        $validate = new \app\common\validate\User();
        if ($validate->scene('register')->check($data) == 0) {
            return $validate->getError();
        }

        //数据库查询数据数据是否存在
        $res = $this->where('email', $data['email'])->find();
        if ($res) {
            return '账户已存在！';
        } else {
            //添加数据到数据库
            $this->create([
                'email' => $data['email'],
                'pwd' => md5($data['pwd']),
            ]);
            return 1;
        }
    }

    //找回密码----邮箱验证码发送
    public function forget($data)
    {
        //设置4位随机数
        $code = rand('1000', '9999');
        session('code', $code);
        //验证数据
        $validate = new \app\common\validate\User();
        if ($validate->scene('forget')->check($data) == 0) {
            return $validate->getError();
        }
        //数据库查询数据
        $res = $this->where($data)->find();
        if ($res) {
            $result = SendEmail::SendEmail('找回密码', '验证码：' . $code, '770117176@qq.com');
            if ($result) {
                return '1';
            }
        } else {
            return $res;
        }
    }

    //找回密码--密码重置
    public function reset($data)
    {
        //验证数据
        $validate = new \app\common\validate\User();
        if ($validate->scene('reset')->check($data) == 0) {
            return $validate->getError();
        }
        //更新数据
        //先查询数据
        $res = $this->where('email', $data['email'])->find();
        $res['pwd'] = md5($data['pwd']);
        //更新数据
        $res->save();
        return 1;
    }

}