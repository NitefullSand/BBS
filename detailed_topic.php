<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="topic4.css"/>
	<title>话题详细信息</title>
	<link rel="stylesheet" href="about_me.css"/>
	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>

<?php
$tid=$_GET['id'];
include 'top_class.php';
session_start();
echo <<<ENDHTML
<div class="btn_">
<button class="btn btn-info" onclick="location='Love.php'">网站首页</button>
<button type="button" class="btn btn-success">留言板</button>
</div>
ENDHTML;
//echo "欢迎" . $_SESSION['username']."<br>";
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql="select * FROM topic where topic_id='".$tid."'";
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
	<a href="answer.php?id=$tid">回复</a>
</div>
ENDHTML;
}

//查询回复数目
$sql="select count(*) from answer";
$result=mysqli_query($db,$sql);
$answer_rows=$result->fetch_assoc()['count(*)'];
//计算分页数目
$pages_count=floor($answer_rows/7);
if($answer_rows==0||$answer_rows%7!=0){
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
if ($page_index<1) {

	$page_index=1;
}
else if ($page_index>$pages_count) {
	$page_index=$pages_count;
}
//回复索引
$answer_index=($page_index-1)*7;
//分页查询回复
$sql="select * FROM answer where topic_id=".$tid." limit ".$answer_index.",7";
$result=mysqli_query($db, $sql);
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
	<a href="answer.php?id=$tid">回复</a>
</div>
ENDHTML;
// echo '<a href="answer.php?id='.$_GET['id'].'">回复</a></div>';
}
//显示分页
echo '
<div class="pages">
<ul class="pagination">
	<li><a href="detailed_topic.php?id='.$tid.'&index='.($page_index-1).'">&laquo;</a></li>';
		for($i=1;$i<=$pages_count;$i++)
		{
			if($i==$page_index)
			{
				echo '<li><a style="color:#FF0000">'.$i.'</a></li>';
			}
			else{
				echo '<li><a href="detailed_topic.php?id='.$tid.'&index='.$i.'">'.$i.'</a></li>';
			}
		}
	echo '<li><a href="detailed_topic.php?id='.$tid.'&index='.($page_index+1).'">&raquo;</a></li>
	</ul></div>';
?>
<div class="my_ability">
<h5>网名：NitefullSand</h5>
<h5>姓名:刘艳</h5>
<h5>籍贯:吉林 长春</h5>
<h5>现居:安徽 合肥工业大学</h5>
<h5>喜欢的书:《三国演义》</h5>
<h5>座右铭:态度决定一切</h5>

<img src="bbs_images/卡通.jpg" width="300px" height="500px">
</div>
</body>
</html>