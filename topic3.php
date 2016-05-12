<html>
<head>
    <meta charset="UTF-8">
    <title>查看话题</title>
    <link rel="stylesheet" type="text/css" href="topic4.css"/>
    <link rel="stylesheet" href="about_me.css"/>
	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include 'top_class.php';
session_start();
if (isset($_SESSION['username']))
{
	
}
else{
	echo "<script>alert('请登录');top.location='login.php';</script>";
	exit();
}

?>
<div class="new">
<a href="topic.php">点我留言</a>
</div>
<?php
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql="select * FROM topic";
$result=mysqli_query($db,$sql);
while($row = $result->fetch_assoc()){
echo $row['author']."<br>";
echo "<a href='topic4.php?id=".$row['topic_id']."''>".$row['heading']."</a><br>";
echo $row['content']."<br>";
echo $row['time']."<br>";
}
?>

</body>
</html>