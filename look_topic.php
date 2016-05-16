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
if (!isset($_SESSION['username']))
{
	echo "<script>alert('请登录');top.location='login.php';</script>";
	exit();
}
?>
<div class="btn_">
<button class="btn btn-info" onclick="location='Love.php'">网站首页</button>
<button type="button" class="btn btn-success">留言板</button>
</div>
<!-- <div class="all_news"> -->
<div class="point_me">
<a href="topic.php"><button class="btn btn-info">点我留言</button></a>
</div>
<?php
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
//查询话题数目
$sql="select count(*) from topic";
$result=mysqli_query($db,$sql);
$topic_rows=$result->fetch_assoc()['count(*)'];
//计算分页数目
$pages_count=floor($topic_rows/5);
if($topic_rows==0||$topic_rows%5!=0)
{
	$pages_count=$pages_count+1;
}
//分页索引
if(isset($_GET['index']))
{
	$page_index=$_GET['index'];
}
else{
	$page_index=1;
}
if($page_index<1)
{
	$page_index=1;
}else if($page_index>$pages_count){
	$page_index=$pages_count;
}
//话题索引
$topic_index=($page_index-1)*5;
//分页查询话题
$sql="select * FROM topic limit ".$topic_index.", 5";
$result=mysqli_query($db,$sql);
while($row = $result->fetch_assoc()){
	$heading=$row['heading'];
	$topic_id=$row['topic_id'];
	$author=$row['author'];
	$content=$row['content'];
	$time=$row['time'];
echo <<<ENDHTML
<div class="all_news">
	$author;
	<div class="cheading">
		<a href="detailed_topic.php?id=$topic_id">$heading</a>
	</div>
	$content;
	$time;
</div>
ENDHTML;
}
?>
</div>
<?php
//显示分页
echo '
<div class="pages">
<ul class="pagination">
	<li><a href="look_topic.php?index='.($page_index-1).'">&laquo;</a></li>';
		for($i=1;$i<=$pages_count;$i++)
		{
			if($i==$page_index)
			{
				echo '<li><a style="color:#FF0000">'.$i.'</a></li>';
			}
			else{
				echo '<li><a href="look_topic.php?index='.$i.'">'.$i.'</a></li>';
			}
		}
	echo '<li><a href="look_topic.php?index='.($page_index+1).'">&raquo;</a></li>
	</ul></div>';
?>
</body>
</html>