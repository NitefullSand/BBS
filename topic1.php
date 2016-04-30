<!DOCTYPE html>
<html>
<head>
	<title>话题</title>
	<link rel="stylesheet" type="text/css" href="topic4.css"/>
<?php
session_start();
echo "欢迎" . $_SESSION['username'];
?>
</head>
<body>
<?php 
date_default_timezone_set('prc');
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql = "INSERT INTO topic(author,heading,content,time)
VALUES ('". $_SESSION['username']."','".$_POST['heading']."','".$_POST['content']."','".date("y-m-d h:i:s",time())."')";
if (mysqli_query($db, $sql)) {
    echo "发表成功";
	echo "<a href='topic3.php'>返回查看</a><br/>";
	echo "<a href='DreamWorld.php'>返回首页</a>";
} 

?>	
</body>
</html>