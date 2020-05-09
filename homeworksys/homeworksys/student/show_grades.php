<?php
/**
 * Created by PhpStorm.
 * User: cherishfall
 * Date: 2019-04-26
 * Time: 08:42
 */

    session_start();
    if(!isset($_SESSION['login_flag']) || !isset($_SESSION['studentid']))
        header("Location: ../logout.php?action=logout");

    require_once '../class/student_class.php';
    if($_GET['action'] == 'yes'){


        $studentid = $_SESSION['studentid'];
        //echo '<a href="#">返回</a><br />';
        student_class::show_grades($studentid);

    }else{
        header("Location: ../logout.php?action=logout");
    }