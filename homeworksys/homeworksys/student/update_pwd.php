<?php
/**
 * Created by PhpStorm.
 * User: cherishfall
 * Date: 2019-04-25
 * Time: 08:50
 */

session_start();
if(!isset($_SESSION['login_flag']) || !isset($_SESSION['studentid']))
    header("Location: ../logout.php?action=logout");

require_once '../class/student_class.php';

$id = $_SESSION['studentid'];
$new_pwd = $_POST['new_pwd'];
$confirm_pwd = $_POST['confirm_pwd'];



//UPDATE student  SET studentpwd = '123456789' WHERE studentid = 145
$query = "update student set studentpwd = '$new_pwd' where studentid = $id";

if($new_pwd == $confirm_pwd){
    if(student_class::update_pwd($query)){
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

