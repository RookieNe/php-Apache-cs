<?php
/**
 * Created by PhpStorm.
 * User: cherishfall
 * Date: 2019-04-24
 * Time: 13:28
 */

 //本页面2019-5-1 晚 由李凡修改
    session_start();
    //检查登陆标志位，防止非法访问
    if(!isset($_SESSION['login_flag']) || !isset($_SESSION['adminid']))
        header("Location: ../logout.php?action=logout");
    else
        $adminid = $_SESSION['adminid'];

?>

<!DOCTYPE html>
<html lang="zn">
<head>
    <meta charset="UTF-8">
    <title>管理员主页</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<div class="head clearfix">
    <div class="headlogo left">
        <h2><a href="#">成绩管理</a></h2>
    </div>
    <ul class="headnav left" id="headnav">
        <li id="menu_0" class="current-menu">
            <a href="#">首页</a>
        </li>
        <li id="menu_1">
            <a href="#">添加信息</a>
        </li>
        <li id="menu_2">
            <a href="#">修改密码</a>
        </li>
<!--        <li id="menu_3">
            <a href="#">查询统计</a>
        </li>-->
    </ul>
    <ul class="headlink right clearfix">
        <li id="link_0">
            <a href="#">Admin</a>
        </li>
        <li id="link_1">
            <a href="#">隐藏菜单</a>
        </li>
        <li id="link_2">
            <a href="index.php">首页</a>
        </li>
        <li id="link_4">
            <a href="../logout.php?action=logout">退出</a>
        </li>
    </ul>
</div><!--end head-->

<div class="leftmenu" id="leftmenu">
    <div id="leftmenu_0" class="leftmenu-item">
        <dl>
            <dt>首页</dt>
            <dd>
                <ul class="clearfix">
                    <li><a href="javascript:;" _link="main.html">当前信息</a></li>
					<li><a href="javascript:;" _link="show_myinfo.php?action=yes">个人信息</a></li>
                </ul>
            </dd>
        </dl>
    </div><!--end leftmenu_0-->

    <div id="leftmenu_1" class="leftmenu-item" style="display:none;">
        <dl>
            <dt>添加学生信息</dt>
            <dd>
                <ul class="clearfix">
                    <li><a href="javascript:;" _link="add_student.html">单个添加</a></li>
                    <!--<li><a href="javascript:;" _link="#">批量添加</a></li>-->
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>添加教师信息</dt>
            <dd>
                <ul class="clearfix">
                    <li><a href="javascript:;" _link="add_teacher.html">单个添加</a></li>
                    <!--<li><a href="javascript:;" _link="#">批量添加</a></li>-->
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>添加课程信息</dt>
            <dd>
                <ul class="clearfix">
                    <li><a href="javascript:;" _link="add_course.html">单个添加</a></li>
<!--                    <li><a href="javascript:;" _link="#">批量添加</a></li>-->
                </ul>
            </dd>
        </dl>
    </div><!--end leftmenu_1-->

    <div id="leftmenu_2" class="leftmenu-item" style="display:none;">
        <dl>
            <dt>修改密码</dt>
            <dd>
                <ul class="clearfix">
                    <li><a href="javascript:;" _link="update_pwd.html">修改用户密码</a></li>
                </ul>
            </dd>
        </dl>
    </div><!--end leftmenu_2-->

<!--    <div id="leftmenu_3" class="leftmenu-item" style="display:none;">
        <dl>
            <dt>查询成绩及统计</dt>
            <dd>
                <ul class="clearfix">
                    <li><a href="javascript:;" _link="#">按课号查询</a></li>
                    <li><a href="javascript:;" _link="#">按学号查询</a></li>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>查询信息</dt>
            <dd>
                <ul class="clearfix">
                    <li><a href="#">查询学生信息</a></li>
                    <li><a href="#">查询教师信息</a></li>
                    <li><a href="#">查询课程信息</a></li>

                </ul>
            </dd>
        </dl>
    </div>&lt;!&ndash;end leftmenu_3&ndash;&gt;-->

</div>

<div class="rightmain">
    <div class="rightcontent">
        <iframe id="main" name="main" frameborder="0" scrolling="yes" src="main.html"></iframe>
    </div>
</div>

<!--JavaScript代码-->
<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">

    $(function(){
        $('#headnav li').click(function(){
            var _id = $(this).index();
            //alert(_id);

            //主导航与左侧导航关联
            $(this).addClass('current-menu').siblings().removeClass('current-menu');
            $('#leftmenu').find('.leftmenu-item').eq(_id).css('display','block').siblings('.leftmenu-item').css('display','none');
        });

        $('#link_1').click(function(){
            if(false == $('#leftmenu').is(':visible')){
                $('#leftmenu').css('display','block');
                $(this).children('a').text('隐藏菜单');
                $('body').addClass('showleftmenu').removeClass('hideleftmenu')
            }else {
                $('#leftmenu').css('display','none');
                $(this).children('a').text('显示菜单');
                $('body').addClass('hideleftmenu').removeClass('showleftmenu')
            }
        });

        var d = true;

        $('#leftmenu dl dt').click(function(){
            // if(false == $(this).siblings('dd').is(':visible')){
            //     $(this).css('background-position','right 12px');
            // }else {
            //     $(this).css('background-position','right -40px');
            // }
            $(this).siblings('dd').slideToggle('fast');//.siblings('dt').css('background-position','right -40px');
            if(d == true){
                $(this).css('background-position','right -40px');
                d = false;
            }else {
                $(this).css('background-position','right 12px');
                d = true;
            }
        });

        //左侧菜单切换
        $('#leftmenu dl dd ul li a').click(function(){
            var _link = $(this).attr('_link');

            //alert(_link);
            $('#main').attr('src', _link);
            $(this).addClass('current-menuleft').parent().siblings().children().removeClass('current-menuleft');
            $(this).parents('dl').siblings().find('dd ul li a').removeClass('current-menuleft');
        });


    });

</script>

</body>
</html>