<?php
/**
 * Created by PhpStorm.
 * User: cherishfall
 * Date: 2019-04-25
 * Time: 08:50
 */

    session_start();
    if(!isset($_SESSION['login_flag']) || !isset($_SESSION['adminid']))
        header("Location: ../logout.php?action=logout");

    require_once '../class/admin_class.php';

    $id = $_POST['id'];
    $new_pwd = $_POST['new_pwd'];
    $confirm_pwd = $_POST['confirm_pwd'];

    $kind = $_POST['kind'];
    $kind_id = $_POST['kind'].'id';
    $kind_pwd = $_POST['kind'].'pwd';

    //UPDATE student  SET studentpwd = '123456789' WHERE studentid = 145
    $query = "update $kind set $kind_pwd = '$new_pwd' where $kind_id = $id";

    if($new_pwd == $confirm_pwd){
        if(admin_class::update_pwd($query)){
            header('refresh:1; url=./update_pwd.html');
            echo '密码修改成功,1秒后自动返回<br />';

        }else{
            header('refresh:1; url=./update_pwd.html');
            echo '修改密码失败<br />';


        }


    }else{
        header('refresh:1; url=./update_pwd.html');
        echo "两次输入密码不一致，请重新输入<br />";

    }

