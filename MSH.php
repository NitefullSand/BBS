<html>
<head>
	<meta charset="UTF-8">
	<title>漫生活</title>
	<link rel="stylesheet" href="about_me.css"/>
	<link rel="stylesheet" href="MSH.css">
	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include 'top_class.php';
session_start();
?>
<div class="btn_">
<button class="btn btn-info" onclick="location='Love.php'">网站首页</button>
<button type="button" class="btn btn-success">漫生活</button>
<button class="btn btn-info" onclick="location='write_artical.php'">点我发表文章喔</button>
<!-- <hr> -->
</div>
<span class="hh">
“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。
</span>
<?php
$type="";
if(isset($_GET['type']))
{
	$type=$_GET['type'];
}

$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
//查询话题数目
$sql="select count(*) from artical";
if($type!="")
{
	$sql=$sql." where artical_type=' " . $type."'";
}
$result=mysqli_query($db,$sql);
$artical_rows=$result->fetch_assoc()['count(*)'];
//计算分页数目
$pages_count=floor($artical_rows/25);
if($artical_rows==0||$artical_rows%25!=0)
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
$artical_index=($page_index-1)*25;
//分页查询话题
$sql="select * FROM artical limit ".$artical_index.", 5";
if($type!="")
{
	$sql="select * FROM artical where artical_type='" . $type ."' limit ".$artical_index.", 5";
}
$result=mysqli_query($db,$sql);
while($row = $result->fetch_assoc()){
	$artical_head=$row['artical_head'];
	$artical_id=$row['artical_id'];
	$artical_edit=$row['artical_edit'];
	$content=substr($row['artical_content'], 0,400);
	$time=$row['artical_time'];
	$artical_type=$row['artical_type'];
echo <<<ENDHTML
<div class="all_news">
	<div class="aheading">
		<a href="detailed_artical.php?id=$artical_id">$artical_head</a>
	</div>
	发布时间:$time
	作者:$artical_edit
	<span class="artical_type">$artical_type</span>
	$content
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
	<li><a href="MSH.php?index='.($page_index-1).'">&laquo;</a></li>';
		for($i=1;$i<=$pages_count;$i++)
		{
			if($i==$page_index)
			{
				echo '<li><a style="color:#FF0000">'.$i.'</a></li>';
			}
			else{
				echo '<li><a href="MSH.php?index='.$i.'">'.$i.'</a></li>';
			}
		}
	echo '<li><a href="MSH.php?index='.($page_index+1).'">&raquo;</a></li>
	</ul></div>';
?>
<div class="class_type">
<div class="class_type1">
<button class="button1" onclick="location='MSH.php?type=日记'">日記</button>
<button type="button" class="button2" onclick="location='MSH.php?type=欣赏'">欣賞</button>
</div>
<div class="class_type2">
<button class="button3" onclick="location='MSH.php?type=程序人生'">程序人生</button>
<button type="button" class="button4" onclick="location='MSH.php?type=经典语录'">經典語錄</button>
</div>
</div>

</body>
</html>