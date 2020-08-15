<?php

namespace app\common\validate;


use think\Validate;

class Book extends Validate
{
    //验证规则
    protected $rule = [
        'isbn|图书编号' => 'require',
        'name|图书名称' => 'require',
        'price|图书价格' => 'require|float',
        'num|图书库存' => 'require|number',
        'picture|图书图片' => 'require',
    ];

    //验证场景
    protected $scene = [
        'bookadd' => ['isbn', 'name', 'price', 'num', 'picture'],
        'bookedit' => ['name', 'price', 'num', 'picture']
    ];
}
