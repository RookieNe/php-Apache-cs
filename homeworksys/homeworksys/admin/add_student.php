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
    $classid = $_POST['classid'];
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    if(isset($_POST['tel'])){
        $tel = $_POST['tel'];
    }else{
        $tel = 'NULL';
    }

    //INSERT INTO `student` (`studentid`, `classid`, `studentname`, `studentpwd`, `studenttel`)
    // VALUES (103, 10, '李零三', '123456', '183521090103');
    $query = "insert into student(studentid, classid, studentname, studentpwd, studenttel) values "
        ."($id, $classid, '$name', '$pwd', '$tel')";
    echo $query.'<br />';

    if(admin_class::add_student($query)){
        header('refresh:1; url=./add_student.html');
        echo '插入成功,1秒后返回<br /';

    }else{

        header('refresh:1; url=./add_student.html');
        echo '插入失败, 1秒后返回<br />';
    }



