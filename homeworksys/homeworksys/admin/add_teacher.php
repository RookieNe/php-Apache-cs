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
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];

    if(isset($_POST['office'])){
        $office = $_POST['office'];
    }else{
        $office = 'NULL';
    }
    if(isset($_POST['tel'])){
        $tel = $_POST['tel'];
    }else{
        $tel = 'NULL';
    }

    //INSERT INTO `student` (`studentid`, `classid`, `studentname`, `studentpwd`, `studenttel`)
    // VALUES (103, 10, '李零三', '123456', '183521090103');
    $query = "insert into teacher(teacherid, teachername, teacherpwd, teacheroffice, teachertel) values "
        ."($id, '$name', '$pwd', '$office','$tel')";
    echo $query.'<br />';

    if(admin_class::add_teacher($query)){

        header('refresh:1; url=./add_teacher.html');
        echo '插入成功,1秒后返回<br /';


    }else{
        header('refresh:1; url=./add_teacher.html');
        echo '插入失败,1秒后返回<br />';
    }



