<?php
include "./config.php";

$stuid=$_GET["stuid"];
$name=$_GET["name"];
$gender=$_GET["gender"];
$hobby=$_GET["hobby"];
// echo $stuid.$name.$gender.$hobby;
if ($stuid!==""&&$name!==""&&$gender!==""&&$hobby!=="") {
  insertOne($stuid,$name,$gender,$hobby);
  // insertOne(10005,'小王','男','电影');

}
 ?>
