<?php
session_start();
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>插入回复</title>
	<link rel="stylesheet" type="text/css" href="topic4.css"/>
<!-- 	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> -->
</head>
<body>
<?php 
if(empty($_POST['content']))
{
	echo'<script>alert("回复内容为空,请返回重新回复");top.location="answer.php?id='.$_POST['topic_id'].'";</script>';
	exit();
}
date_default_timezone_set('prc');
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql = "INSERT INTO answer(topic_id,answer_content,author,time)
VALUES('".$_POST['topic_id']."','".$_POST['content']."','". $_SESSION['username']."','".date("y-m-d h:i:s",time())."')";
if(mysqli_query($db, $sql)) {
	echo '<script>if(confirm("回复成功，返回查看留言？取消继续查看详情")){top.location="look_topic.php"}else{top.location="detailed_topic.php?id='.$_POST['topic_id'].'"};</script>';
} 
?>		
</body>
</html>