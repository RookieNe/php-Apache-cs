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
    $teacherid = $_POST['teacherid'];
    $name = $_POST['name'];


    //INSERT INTO `student` (`studentid`, `classid`, `studentname`, `studentpwd`, `studenttel`)
    // VALUES (103, 10, '李零三', '123456', '183521090103');
    $query = "insert into course(courseid, teacherid, coursename) values "
        ."($id, $teacherid, '$name')";
    echo $query.'<br />';

    if(admin_class::add_course($query)){

        header('refresh:1; url=./add_course.html');
        echo '插入成功,1秒后返回<br /';

        //echo $id.' '.$classid.' '.$name;

    }else{
        header('refresh:1; url=./add_course.html');
        echo '插入失败, 1秒后返回<br />';
    }



