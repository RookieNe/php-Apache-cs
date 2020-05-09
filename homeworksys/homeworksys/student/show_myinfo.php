<?php
/**
 * Created by PhpStorm.
 * User: cherishfall
 * Date: 2019-04-26
 * Time: 08:39
 */

    session_start();
    if(!isset($_SESSION['login_flag']) || !isset($_SESSION['studentid']))
        header("Location: ../logout.php?action=logout");

    require_once '../class/student_class.php';
    if($_GET['action'] == 'yes'){

        //echo '<a href="#">返回</a><br />';
        student_class::show_myinfo($_SESSION['studentid']);

    }else{
        header("Location: ../logout.php?action=logout");
    }