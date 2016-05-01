<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="topic4.css"/>
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
$author=$row['author'];
$content=$row['content'];
$time=$row['time'];
echo <<<ENDHTML
<div class="center">
	<div class="author">
	$author
	</div>
	<div class="content">
	$content
	</div>
	<div class="time">
	$time
	</div>
ENDHTML;
	echo '<a href="answer.php?id='.$_GET['id'].'">回复</a></div>';
}
$sql="select * FROM answer where topic_id='".$_GET['id']."'";
$result=mysqli_query($db,$sql);
while($row = $result->fetch_assoc()){
$author=$row['author'];
$content=$row['answer_content'];
$time=$row['time'];
echo <<<ENDHTML
<div class="center">
	<div class="author">
	$author
	</div>
	<div class="content">
	$content
	</div>
	<div class="time">
	$time
	</div>
</div>
ENDHTML;
	// echo '<a href="answer.php?id='.$row['answer_id'].'">回复';
}
echo "<a href='topic3.php'>返回继续查看</a><br>";
echo "<a href='DreamWorld.php'>返回首页</a>";
?>

</body>
</html>