<?php
include "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="stylebaru.css">
    <title>Rekap Sum Suhu</title>
</head>
<body>
	<center><h1>REKAP SUM SUHU</h1></center>

    <!-- <form action="recap.php" class="row" method="post">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-info" name="hari">Hari</button>
            <button type="submit" class="btn btn-info" name="bulan">Bulan</button>
            <button type="submit" class="btn btn-info" name="tahun">Tahun</button>
        </div>
    </form> -->

    <!-- <?php
    $recap = query("SELECT SUM(suhu40) AS suhu40, SUM(suhu60) AS suhu60, SUM(suhu80) AS suhu80, date FROM instb GROUP BY DATE (date)");

    if(isset($_POST['hari'])){
        $recap = query("SELECT SUM(suhu40) AS suhu40, SUM(suhu60) AS suhu60, SUM(suhu80) AS suhu80, date FROM instb GROUP BY DAY (date)");
    }
    if(isset($_POST['bulan'])){
        $recap = query("SELECT SUM(suhu40) AS suhu40, SUM(suhu60) AS suhu60, SUM(suhu80) AS suhu80, date FROM instb GROUP BY MONTH (date)");
    }
    if(isset($_POST['tahun'])){
        $recap = query("SELECT SUM(suhu40) AS suhu40, SUM(suhu60) AS suhu60, SUM(suhu80) AS suhu80, date FROM instb GROUP BY YEAR (date)");
    }
    ?> -->


<table align="center" cellspacing='0' style="margin-bottom: 50px; margin-top: 30px;">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>40°C</th>
            <th>60°C</th>
            <th>80°C</th>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach ($recap as $rcp):?>
            <tr>
                <td><?= $rcp['date'];?></td>
                <td><?= $rcp['suhu40'];?></td>
                <td><?= $rcp['suhu60'];?></td>
                <td><?= $rcp['suhu80'];?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <form action="recap.php" class="row" method="post">
        <div class="col-4"></div>
            <div class="col-2">
                <input type="date" name="tanggal" class="form-control mb-2">
            </div>
            <div class="col-2">
                <input type="date" name="tanggal2" class="form-control mb-2">
            </div>
        <div class="col-4"></div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-info mb-3">Sort</button>
            </div>
    </form>
    <?php
    // $qall = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM dapur GROUP BY DATE (create_date)";
    $q1 = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM dapur WHERE suhu='suhu40' GROUP BY DATE (create_date)";
    $q2 = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM dapur WHERE suhu='suhu60' GROUP BY DATE (create_date)";
    $q3 = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM dapur WHERE suhu='suhu80' GROUP BY DATE (create_date)";
    
    if(isset($_POST['tanggal'],$_POST['tanggal2'])){
        // $qall = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM dapur GROUP BY DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' ";
        $q1 = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM dapur WHERE suhu='suhu40' AND DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' GROUP BY DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' ";
        $q2 = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM dapur WHERE suhu='suhu60' AND DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' GROUP BY DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' ";
        $q3 = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM dapur WHERE suhu='suhu80' AND DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' GROUP BY DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' ";
    }

    // $degreeall = query($qall);
    $degree1 = query($q1);
    $degree2 = query($q2);
    $degree3 = query($q3);

    ?>

    <!-- <table align="center" cellspacing='0' style="margin-bottom: 50px;">
        <thead>
            <tr>
                <td>suhu</td
                <td>tanggal</td>
                <td>durasi</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($degreeall as $d):?>
        <tr>
            <td><?= $h['suhu'];?></td
            <td><?= $h['create_date'];?></td>
            <td><?= $h['durasi'];?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table> -->
    <table align="center" cellspacing='0' style="margin-bottom: 50px;">
        <thead>
            <tr>
                <td>tanggal</td>
                <td>suhu</td>
                <td>durasi</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($degree1 as $d1):?>
        <tr>
            <td><?= $d1['create_date'];?></td>
            <td><?= $d1['suhu'];?></td>
            <td><?= $d1['durasi'];?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <table align="center" cellspacing='0' style="margin-bottom: 50px;">
        <thead>
            <tr>
                <td>tanggal</td>
                <td>suhu</td>
                <td>durasi</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($degree2 as $d2):?>
        <tr>
            <td><?= $d2['create_date'];?></td>
            <td><?= $d2['suhu'];?></td>
            <td><?= $d2['durasi'];?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <table align="center" cellspacing='0' style="margin-bottom: 50px;">
        <thead>
            <tr>
                <td>tanggal</td>
                <td>suhu</td>
                <td>durasi</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($degree3 as $d3):?>
        <tr>
            <td><?= $d3['create_date'];?></td>
            <td><?= $d3['suhu'];?></td>
            <td><?= $d3['durasi'];?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </center>
</body>
</html>