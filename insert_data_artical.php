<html>
<head>
	<meta charset="UTF-8">
	<title>插入文章数据</title>
	<link rel="stylesheet" type="text/css" href="MSH.css"/>
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
if(empty($_POST['artical_heading'])||empty($_POST['content']))
{
	echo'<script>alert("文章标题或内容为空,请返回修改");top.location="write_artical.php"</script>';
	exit();
}
date_default_timezone_set('prc');
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql = "INSERT INTO artical(artical_head,artical_content,artical_time,artical_edit,artical_type)
VALUES('".$_POST['artical_heading']."','".$_POST['content']."','".date("y-m-d h:i:s",time())."','". $_SESSION['username']."','".$_POST['artical_type']."')";
if(mysqli_query($db, $sql)) {
	echo "<script>if(confirm('发表成功，返回查看文章？取消继续发表')){top.location='MSH.php'}else{top.location='write_artical.php'} </script>";
} 
?>		
</body>
</html>