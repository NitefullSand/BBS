<html>
<head>
	<meta charset="UTF-8">
	<title>话题详细信息</title>
</head>
<body>
<?php
session_start();
echo "欢迎" . $_SESSION['username']."<br>";
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql="select * FROM topic where topic_id='".$_GET['id']."'";
$result=mysqli_query($db,$sql);
while($row = $result->fetch_assoc()){
echo $row['author']."<br>";
echo $row['content']."<br>";
echo $row['time']."<br>";
}
echo "<a href='topic3.php'>返回继续查看</a><br>";
?>
</body>
</html>