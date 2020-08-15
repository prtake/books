<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//];

use think\Route;

Route::rule('/', 'index/Index/index', 'get|post');
Route::rule('login', 'admin/User/login', 'get|post');
Route::rule('loginout', 'admin/User/loginout', 'get|post');
Route::rule('register', 'admin/User/register', 'get|post');
Route::rule('forget', 'admin/User/forget', 'get|post');
Route::rule('reset', 'admin/User/reset', 'get|post');
Route::rule('booklist', 'admin/Book/booklist', 'get|post');
Route::rule('bookadd', 'admin/Book/bookadd', 'get|post');
Route::rule('details/[:isbn]', 'admin/Book/details', 'get|post');
Route::rule('bookdelete/[:isbn]', 'admin/Book/bookdelete', 'get|post');
Route::rule('bookedit/[:isbn]', 'admin/Book/bookedit', 'get|post');
Route::rule('template', 'admin/Book/template', 'get|post');
