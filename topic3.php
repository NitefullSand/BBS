<html>
<head>
    <meta charset="UTF-8">
    <title>查看话题</title>
</head>
<body>
<?php
session_start();
echo "欢迎" . $_SESSION['username']."<br>";
?>
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