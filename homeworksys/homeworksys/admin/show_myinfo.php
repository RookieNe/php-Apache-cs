<?php
/**
 * Created by PhpStorm.
 * User: cherishfall
 * Date: 2019-04-26
 * Time: 20:39
 */

    //本页面2019-5-1 晚 由李凡修改
    session_start();
    if(!isset($_SESSION['login_flag']) || !isset($_SESSION['adminid'])){
        header("Location: ../logout.php?action=logout");
    } else{
        $adminid = $_SESSION['adminid'];
    }


    require_once '../conn.php';
    if($_GET['action'] == 'yes'){

        $con= start_mysql();
        $query = "select adminid, adminname, admintel from admin where adminid = $adminid";
        $result = mysqli_query($con, $query);

        $row = mysqli_fetch_assoc($result);
        //print_r($row);
        //2019.5.1 19:04 change by lifan
        $id = $row['adminid'];
        $name = $row['adminname'];
        $tel = $row['admintel'];
		
		//2019.5.1 23:07 change by chenchuwen
	echo '	
	<!DOCTYPE html>
	<html lang="zh">
	<head>
    <meta charset="UTF-8">
    <title>增加课程</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body background="../img/background.png">
	<table class="hovertable">
    <tr>
        <th>ID</th>
        <td>';    echo  "$id<br />"; echo '	</td>
    </tr>
	    <tr>
        <th>姓名</th>
        <td>';    echo  "$name<br />"; echo '	</td>
    </tr>
	    <tr>
        <th>电话</th>
        <td>';    echo  "$tel<br />"; echo '	</td>
    </tr>
	</table>
	</body>
	</html>
	';
        mysqli_free_result($result);
        mysqli_close($con);

        echo '<br />';
    }else{
       // header("Location: ../logout.php?action=logout");
    }