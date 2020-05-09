<?php
/**
 * Created by PhpStorm.
 * User: cherishfall
 * Date: 2019-04-24
 * Time: 12:40
 */
    //开启 session
    session_start();

    //导入数据库连接参数
    require_once 'conn.php';

    //登陆检查函数，如果查询到，返回查询到的信息，
    //其他情况下返回false
    function login_check($user_id ,$pwd, $user_kind){

        $user_kind_id = $user_kind.'id';
        $user_kind_pwd = $user_kind.'pwd';

        //判断用户id和用户密码非空
        if($user_id != '' && $pwd != ''){

            //连接数据库
            $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD)
            or  die("连接错误: " . mysqli_connect_error());
            //选择数据库
            mysqli_select_db($con, DB_DATABASE);
            //设置字符集为utf-8
            mysqli_set_charset($con,"utf8");
            //拼接字符串
            $query = "select * from $user_kind where $user_kind_id = '$user_id' and $user_kind_pwd = '$pwd'";

            //在数据库中比对
            if($result = mysqli_query($con, $query)) {
                //获取查询结果
                $row = mysqli_fetch_assoc($result);

                //设置登陆标志位，login_flag
                $_SESSION["login_flag"] = '1';
                return $row;
            }
            else{
                return false;
            }
        }else{
            return false;
        }

    }


    //从表单获取用户id和密码
    $user_id = trim($_POST['user_id']);
    $pwd = trim($_POST['pwd']);
    $user_kind = $_POST['user_kind'];
    $url = "./$user_kind/index.php";

    //分类别设置 sesion信息
    if($row = login_check($user_id, $pwd, $user_kind)){
        $_SESSION['login_flag'] = '1';
        if($user_kind == 'admin')
            $_SESSION['adminid'] = $row['adminid'];
        elseif ($user_kind == 'teacher')
            $_SESSION['teacherid'] = $row['teacherid'];
        elseif ($user_kind == 'student')
            $_SESSION['studentid'] = $row['studentid'];

        //设置好后跳转到各用户主页
        header("Location: $url");
    }else{
        header("refresh:1; url=logout.php?action=logout");
        echo '密码或用户名错误！';

    }



