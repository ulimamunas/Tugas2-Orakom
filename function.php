<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_kompor";

$conn = mysqli_connect($servername,$username,$password,$dbname);

function query($query){
  global $conn;
  $result = mysqli_query($conn,$query);
  $rows=[];
  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;

}

  // if ($conn){
  //   echo("yey");
  // }
  // else{
  //   die("Connection Fail: ".mysqli_connect_error());
  // } 

?>