<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="topic4.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="about_me.css"/>
	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<title>话题首页</title>
</head>
<body>
<div class="welcome">
<?php
include 'top_class.php';
if(isset($_SESSION['username']))
{
} else {
	echo "<script>alert('请登录');  top.location='login.php'; </script>";
	//header("Location:login.php");
	exit;
}

?>
</div>
<!-- <div class="content1">
<CENTER><FONT face=隶书 color=red size=15>
<MARQUEE direction=up behavior=alternate width=60 height=120>欢</MARQUEE><FONT color=yellow>
<MARQUEE direction=up behavior=alternate width=60 height=80>迎</MARQUEE><FONT color=brown>
<MARQUEE direction=up behavior=alternate width=60 height=120>来</MARQUEE><FONT color=green>
<MARQUEE direction=up behavior=alternate width=60 height=80>到</MARQUEE><FONT color=orange>
<MARQUEE direction=up behavior=alternate width=290 height=120>NitefuiiSand</MARQUEE><FONT color=green>
</div> -->
<div class="btn_">
<button class="btn btn-info" onclick="location='Love.php'">网站首页</button>
<button type="button" class="btn btn-success">留言板</button>
<div class="Tform">
<form action="insert_data_topic.php" method="post">
		<table>
			<tr>
	            <td><?php echo $_SESSION['username'];?></td>
	        </tr>
			<tr>
				<td>标题:</td>
				<td><input type="text" name="heading"/></td>
			</tr>
			<tr>
				<td>内容:</td>
				<td><textarea name="content" rows="5" cols="40"></textarea></td>
			</tr>
			<tr>
				<td>时间:</td>
				<td><?php date_default_timezone_set('prc');  $time = time();echo date("y-m-d h:i:s",$time) ?></td>
			</tr>
			<tr>
	            <td colspan="2" style="text-align:center;">
	            <input type="submit" name="submit" value="发表" />
	            </td>
            </tr>
		</table>
</form>
</div>
</body>
</html>
