<?php
// header('content-type:application/json;charset=utf8');
$servername="127.0.0.1";
$username="root";
$password="";
$dbname="myDB";

//创建表
function createTab(){
  global $servername,$username,$password,$dbname;
  $con=new mysqli($servername,$username,$password,$dbname);
  if ($con->connect_error) {
    die ("连接失败".$con->connect_error);
  }
  echo "连接成功！"."<br />";
  $sql="CREATE TABLE MyStudent(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    stuid INT(6) NOT NULL unique,
    name VARCHAR(30) NOT NULL,
    gender VARCHAR(30) NOT NULL,
    hobby VARCHAR(50) NOT NULL
  );";
  if ($con->query($sql)) {
    echo "创建表成功"."<br />";
  } else {
    echo "表创建失败".$con->error."<br />";
  }

  $con->close();
}
// createTab();
//插入一条数据
function insertOne($stuid,$name,$gender,$hobby){
  global $servername,$username,$password,$dbname;
  $con=new mysqli($servername,$username,$password,$dbname);
  if ($con->connect_error) {
    die ("连接失败".$con->connect_error);
  }
  // echo "连接成功！"."<br />";
  $sql="INSERT INTO MyStudent(stuid,name,gender,hobby) VALUES ('$stuid','$name','$gender','$hobby');";
  if ($con->query($sql)) {
    echo "数据保存成功";
  } else {
    echo "数据保存失败".$con->error;
  }

  $con->close();

}
// insertOne(100001,'rose','女','兵乓球');
//
//
//查询全部数据
function allData(){
  global $servername,$username,$password,$dbname;
  $conn=new mysqli($servername,$username,$password,$dbname);
  if ($conn->connect_error) {
    die("connect failed".$conn->connect_error);
  }
  // echo "connection successed";
  $sql="SELECT stuid,name,gender,hobby FROM MyStudent;";
  $result=$conn->query($sql);
  if ($result->num_rows>0) {
    # 输出每行数据
    $dataArr=array();
    while ($row=$result->fetch_assoc()) {
      $dataArr[]=$row;
    }
    // var_dump($dataArr);

    echo json_encode($dataArr, JSON_UNESCAPED_UNICODE);
  } else {
    echo "未查询到结果";
  }
  $conn->close();

}
// allData();


//根据姓名查询数据
function getDataByName($name){
  global $servername,$username,$password,$dbname;
  $conn=new mysqli($servername,$username,$password,$dbname);
  if ($conn->connect_error) {
    die("connect failed".$conn->connect_error);
  }

  $sql="SELECT * FROM MyStudent WHERE name='$name';";
  $result=$conn->query($sql);
  if ($result->num_rows>0) {
      $dataArr=array();
    # 输出每行数据
    while ($row=$result->fetch_assoc()) {
        $dataArr[]=$row;
    }
    echo json_encode($dataArr, JSON_UNESCAPED_UNICODE);
  } else {
    echo "未查询到结果";
  }
  $conn->close();
}
// getDataByName("rose");
//根据stuid查询数据
function getDataByStuid($stuid){
  global $servername,$username,$password,$dbname;
  $conn=new mysqli($servername,$username,$password,$dbname);
  if ($conn->connect_error) {
    die("connect failed".$conn->connect_error);
  }
  
  $sql="SELECT * FROM MyStudent WHERE stuid='$stuid';";
  $result=$conn->query($sql);
  if ($result->num_rows>0) {
      $dataArr=array();
    # 输出每行数据
    while ($row=$result->fetch_assoc()) {
        $dataArr[]=$row;
    }
    echo json_encode($dataArr, JSON_UNESCAPED_UNICODE);
  } else {
    echo "未查询到结果";
  }
  $conn->close();
}

//更新某一条数据
function updateByStuid($stuid,$name,$gender,$hobby){
  global $servername,$username,$password,$dbname;
  $conn=new mysqli($servername,$username,$password,$dbname);
  if ($conn->connect_error) {
    die("connect failed".$conn->connect_error);
  }

  $sql="UPDATE MyStudent SET name='$name' ,gender='$gender',hobby='$hobby' WHERE stuid='$stuid' ;";
  $result=$conn->query($sql);
  // var_dump($result);
  if ($result) {
    echo "修改成功";
  } else {
    echo "未查询到结果";
  }
  $conn->close();
}

// updateByStuid(10001,"rose","女","篮球");



//删除某一条数据
function deleByStuid($stuid){
  global $servername,$username,$password,$dbname;
  $conn=new mysqli($servername,$username,$password,$dbname);
  if ($conn->connect_error) {
    die("connect failed".$conn->connect_error);
  }
  $sql="DELETE FROM MyStudent  WHERE stuid='$stuid' ;";
  $result=$conn->query($sql);

  if ($result) {
    echo "删除成功";
  } else {
    echo "删除失败";
  }
  $conn->close();

}
// deleByStuid("10000");



 ?>
