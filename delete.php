<?php
include "./config.php";

$stuid=$_GET["stuid"];

// echo $stuid.$name.$gender.$hobby;
if ($stuid!=="") {
  deleByStuid($stuid);
  // insertOne(10005,'小王','男','电影');

}
 ?>
