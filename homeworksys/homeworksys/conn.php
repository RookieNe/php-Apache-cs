<?php
/**
 * Created by PhpStorm.
 * User: cherishfall
 * Date: 2019-04-24
 * Time: 12:39
 */

//数据库连接信息，
    define('DB_HOST', 'localhost');//主机名
    define('DB_USER', 'homeworksys');//用户名
    define('DB_PASSWORD', '123456789');//密码
    define('DB_DATABASE', 'homeworksys');//数据库名

//封装常用的数据库连接操作语句为一个函数
 function start_mysql()
 {
     //连接数据库
     $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD)
     or  die("连接错误: " . mysqli_connect_error());
     //选择数据库
     mysqli_select_db($con, DB_DATABASE);
     //设置字符集为utf-8
     mysqli_set_charset($con,"utf8");

     return $con;
 }
