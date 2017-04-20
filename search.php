<?php
include "./config.php";

$type=$_GET["type"];
$param=$_GET["param"];

// echo $stuid.$name.$gender.$hobby;
if ($type=="name") {
  getDataByName($param);
} else {
  getDataByStuid($param);
}


 ?>
