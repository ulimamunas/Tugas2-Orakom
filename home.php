<?php
include "function.php";

$komporquery = query("SELECT * FROM kompor")

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Indikator Suhu</title>

<script type="text/javascript" src="jquery/jquery.min.js"></script>
</head>

<body>
<header>
  <h1 class="header" id="header">INDIKATOR SUHU</h1>
</header>

  <table width="800px" height="500px" cellspacing="0" cellpadding="15" border="10px" align="center">
    <tr>
      <td style="background-color: #202020;">
        <div class="kompor"></div>
        <div class="komporhijau"></div>
        <?php foreach ($komporquery as $kq) :?>
          <?php
          if($kq["suhu40"]==1){
            echo
            '<div class="komporhijau" style="display:flex;"></div>';
          }
          else {
            echo
            '<div class="komporhijau" style="display:none;"></div>';
          }
          ?>
          <?php endforeach;?>
        <div class="komporkuning"></div>
        <?php foreach ($komporquery as $kq) :?>
          <?php
          if($kq["suhu60"]==1){
            echo
            '<div class="komporkuning" style="display:flex;"></div>';
          }
          else {
            echo
            '<div class="komporkuning" style="display:none;"></div>';
          }
          ?>
          <?php endforeach;?>
        <div class="kompormerah"></div>
        <?php foreach ($komporquery as $kq) :?>
          <?php
          if($kq["suhu80"]==1){
            echo
            '<div class="kompormerah" style="display:flex;"></div>';
          }
          else {
            echo
            '<div class="kompormerah" style="display:none;"></div>';
          }
          ?>
          <?php endforeach;?>
      </td>
      <td style="background-color: #202020;">
        <div class="on">
          <button>ON</button>
        </div>
        <?php //$i=0?>
        <?php foreach($komporquery as $kq) :?>
          <?php
            if($kq["suhu40"]==1){
              echo
              '<div class="empatpuluh nyala" >
                <a href="active.php?id='.$kq["id"].'&suhu40=0"><button>40°C</button></a>
              </div>';
            }
            else {
              echo
              '<div class="empatpuluh mati" >
                <a href="active.php?id='.$kq["id"].'&suhu40=1"><button>40°C</button></a>
              </div>';
            }
          ?>
          <?php
            if($kq["suhu60"]==1){
              echo
              '<div class="enampuluh nyala" >
                <a href="active.php?id='.$kq["id"].'&suhu60=0"><button>60°C</button></a>
              </div>';
            }
            else {
              echo
              '<div class="enampuluh mati" >
                <a href="active.php?id='.$kq["id"].'&suhu60=1"><button>60°C</button></a>
              </div>';
            }
          ?>
          <?php
            if($kq["suhu80"]==1){
              echo
              '<div class="delapanpuluh nyala" >
                <a href="active.php?id='.$kq["id"].'&suhu80=0"><button>80°C</button></a>
              </div>';
            }
            else {
              echo
              '<div class="delapanpuluh mati" >
                <a href="active.php?id='.$kq["id"].'&suhu80=1"><button>80°C</button></a>
              </div>';
            }
          ?>
        <?php //$i++; ?>
        <?php endforeach;?>

      </td>
    </tr>
  </table>

  <script type="text/javascript" src="script.js"></script>
  <script type="text/javascript" src="scriptcoding.js"></script>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>
</html>
