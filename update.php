<?php
include "./config.php";

$stuid=$_GET["stuid"];
$name=$_GET["name"];
$gender=$_GET["gender"];
$hobby=$_GET["hobby"];
// echo $stuid.$name.$gender.$hobby;
if ($stuid!==""&&$name!==""&&$gender!==""&&$hobby!=="") {
  updateByStuid($stuid,$name,$gender,$hobby);
  // updateByStuid(10001,"rose","女","篮球");;

}
 ?>
