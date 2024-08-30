<?php
include "function.php";
$id = $_GET['id'];
$suhu40 = $_GET['suhu40'];
$suhu60 = $_GET['suhu60'];
$suhu80 = $_GET['suhu80'];
if(isset($suhu40)){
  $updatequery = "UPDATE kompor SET suhu40=$suhu40 WHERE id=$id";
  if($suhu40==1){
    mysqli_query($conn, "INSERT INTO dapur(suhu,status_suhu) VALUES ('suhuu40',$suhu40)");
  }
  if($suhu40==0){
    mysqli_query($conn, "UPDATE dapur SET tgl_mati=NOW(), suhu='suhu40', status_suhu='0' WHERE suhu='suhuu40'");
  }
  mysqli_query($conn,"INSERT INTO instb(suhu40, suhu60, suhu80) VALUES ($suhu40,0,0)");
}
if(isset($suhu60)){
  $updatequery = "UPDATE kompor SET suhu60=$suhu60 WHERE id=$id";
  if($suhu60==1){
    mysqli_query($conn, "INSERT INTO dapur(suhu,status_suhu) VALUES ('suhuu60',$suhu60)");
  }
  if($suhu60==0){
    mysqli_query($conn, "UPDATE dapur SET tgl_mati=NOW(), suhu='suhu60', status_suhu='0' WHERE suhu='suhuu60'");
  }
  mysqli_query($conn,"INSERT INTO instb(suhu40, suhu60, suhu80) VALUES (0,$suhu60,0)");
}
if(isset($suhu80)){
  $updatequery = "UPDATE kompor SET suhu80=$suhu80 WHERE id=$id";
  if($suhu80==1){
    mysqli_query($conn, "INSERT INTO dapur(suhu,status_suhu) VALUES ('suhuu80',$suhu80)");
  }
  if($suhu80==0){
    mysqli_query($conn, "UPDATE dapur SET tgl_mati=NOW(), suhu='suhu80', status_suhu='0' WHERE suhu='suhuu80'");
  }
  mysqli_query($conn,"INSERT INTO instb(suhu40, suhu60, suhu80) VALUES (0,0,$suhu80)");
}
mysqli_query($conn, $updatequery);

header('location:index.php');
?>