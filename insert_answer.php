<?php
session_start();
echo "欢迎" . $_SESSION['username']."<br>";
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>插入回复</title>
	<link rel="stylesheet" type="text/css" href="topic4.css"/>
</head>
<body>
<?php 
date_default_timezone_set('prc');
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql = "INSERT INTO answer(topic_id,answer_content,author,time)
VALUES('".$_POST['topic_id']."','".$_POST['answer_content']."','". $_SESSION['username']."','".date("y-m-d h:i:s",time())."')";
if(mysqli_query($db, $sql)) {
    echo "回复成功";
	echo "<a href='detailed_topic.php?id=".$_POST['topic_id']."'>返回查看</a><br/>";
} 
else{
	echo $_POST['topic_id'];
	echo "请重新回复";
}
?>		
</body>
</html>