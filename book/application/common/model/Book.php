<?php

namespace app\common\model;

use think\Model;

class Book extends Model
{
    //数据添加
    public function bookadd($data)
    {
        //验证数据
        $vaildate = new \app\common\validate\Book();
        if ($vaildate->scene('bookadd')->check($data) == 0) {
            return $vaildate->getError();
        }

        //查询ISBN是否存在
        $res = $this->where('isbn', $data['isbn'])->find();
        if ($res) {
            return 'ISBN已存在';
        } else {
            //添加到数据库
            $this->create($data);
            return 1;
        }

    }

    //编辑
    public function bookedit($data)
    {
        //验证数据
        $vaildate = new \app\common\validate\Book();
        if ($vaildate->scene('bookedit')->check($data) == 0) {
            return $vaildate->getError();
        }

        //查询数据
        $res = $this->where('isbn', $data['isbn'])->find();
        if ($res) {
            $res['name'] = $data['name'];
            $res['price'] = $data['price'];
            $res['num'] = $data['num'];
            $res['picture'] = $data['picture'];
            $res->save();
            return 1;
        }

    }
}