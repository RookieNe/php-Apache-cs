<?php
/**
 * Created by PhpStorm.
 * User: cherishfall
 * Date: 2019-04-24
 * Time: 12:30
 */
    //开启会话
    session_start();

    //查看是否有设置的sesion变量
    if(isset($_SESSION['login_flag']) && $_SESSION['login_flag'] == '1'){
        if(isset($_SESSION['adminid'])){
            header('Location: ./admin/index.php');
        }elseif(isset($_SESSION['teacherid'])){
            header('Location: ./teacher/ndex.php');
        }elseif(isset($_SESSION['studentid'])){
            header('Location: ./student/index.php');
        }else{
            header("refresh:1; url=logout.php?action=logout");
            echo "访问出错，1秒后将自动转跳至登陆界面<br />";

        }
    }else{
        header("Location: login.html");
    }

