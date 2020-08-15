<?php
//// 应用公共文件
//use PHPMailer\PHPMailer;
//
///**
// * @desc 发送普通邮件
// * @param $title 邮件标题
// * @param $Address 收件人邮箱
// * @param $body 邮件正文
// * @return bool|string 返回是否发送成功
// */
//
//function SendEmail($title, $Address, $body)
//{
//    $mail = new PHPMailer();//实例化
//    $mail->IsSMTP();// 启用SMTP
//    $mail->Host = "smtp.qq.com";//SMTP服务器 以qq邮箱为例子 还可以是smtp.163.com 等等其它的smtp服务地址
//    $mail->Port = 465;//邮件发送端口 一般为465 不需要修改
//    $mail->SMTPAuth = true;//启用SMTP认证
//    $mail->SMTPSecure = "ssl";// 设置安全验证方式为ssl
//    $mail->CharSet = "UTF-8";//字符集
//    $mail->Encoding = "base64";//编码方式
//    $mail->Username = "770117176@qq.com";//你的邮箱(是开启了smtp服务的邮箱，随便写是无效的)
//    $mail->Password = "mfaituganrlkbdbh";//你的smtp服务密码（是服务密码不是登陆密码，写登陆密码也是无效的）
//    $mail->From = "770117176@qq.com";//发件人邮箱地址(这里也填smtp服务邮箱就好)
//    $mail->FromName = "你爸爸";//发件人的名字(这个就随便了，什么阿猫阿狗都行)  //下面这些不需要修改
//    $mail->Subject = $title;//邮件标题
//    $mail->AddAddress($Address);//收件人邮箱
//    $mail->IsHTML(true);//支持html格式内容
//    $mail->Body = $body;//邮件主体内容
//    if ($mail->Send()) {
//        return true;
//    } else {
//        return true;
//        "Mailer Error: " . $mail->ErrorInfo;// 输出错误信息
//    }
//}