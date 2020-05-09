<?php
/**
 * Created by PhpStorm.
 * User: cherishfall
 * Date: 2019-04-24
 * Time: 12:39
 */
    session_start();

    //注销时，将session数组中的所有变量清空，并跳转至登陆页面
    if($_GET['action'] == 'logout'){
        if(isset($_SESSION['con'])){
           @ mysqli_close($_SESSION['con']);
        }

        $_SESSION = array();
        session_destroy();

        header("Location: login.html");
    }else{

        header("Location: login.html");
    }
