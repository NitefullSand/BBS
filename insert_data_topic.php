<!DOCTYPE html>
<html>
<head>
	<title>插入话题数据</title>
	<link rel="stylesheet" type="text/css" href="topic4.css"/>
	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<?php
session_start();
// echo "欢迎" . $_SESSION['username'];
?>
</head>
<body>
<?php 
if(empty($_POST['heading'])||empty($_POST['content']))
{
	echo'<script>alert("标题或内容为空,请返回修改");top.location="topic.php"</script>';
	exit();
}
date_default_timezone_set('prc');
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql = "INSERT INTO topic(author,heading,content,time)
VALUES('". $_SESSION['username']."','".$_POST['heading']."','".$_POST['content']."','".date("y-m-d h:i:s",time())."')";
if(mysqli_query($db, $sql)) {
	echo "<script>if(confirm('发表成功，返回查看留言？取消返回首页')){top.location='look_topic.php'}else{top.location='love.php'} </script>";
} 
?>	
</body>
</html>