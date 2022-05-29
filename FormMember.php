<?php 
session_start();
if (!isset($_SESSION['nomor_member'])) {
    header("Location: ErrorPage.php");
}
require('./Model.php');

if (isset($_GET['id_member'])) {
    editmember();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles.css">
    
   <?php echo (isset($_GET['id_member'])) ? "<title>Update Data | Buku</title>": "<title>Tambah Data | Buku</title>" ?> 
</head>

<body class="body bg-secondary">

    <?php
        $title1='FormMember';
        include('./Template.php')
    ?>

    <div class=" p-3 container mt-5 center bg-dark text-white" style="width: fit-content;">
    <div class="border border-light p-2">
    <form action="" method="post">

            <div class="row">
                <div class="col" style="width: 250px">
                    Nama_member    
                </div>
                <div class="col" style="width: 250px;">
                    <input type="text" name="nama_member" <?php echo (isset($_GET['id_member'])) ?  "value = " . $result[0]["nama_member"] . "" : "value = '' "; ?> required> <br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    Nomor Member    
                </div>
                <div class="col" style="width: 250px;">
                    <input type="text" name="nomor_member" <?php echo (isset($_GET['id_member'])) ?  "value = " . $result[0]["nomor_member"] . "" : "value = '' "; ?> required> <br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    Alamat    
                </div>
                <div class="col" style="width: 250px;">
                    <textarea name="alamat" cols="25" rows="5" required> <?php echo (isset($_GET['id_member'])) ?  $result[0]["alamat"]  : ""; ?> </textarea> <br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    Tanggal Mendaftar   
                </div>
                <div class="col" style="width: 250px;">
                    <input type="datetime-local" name="tgl_daftar" <?php echo (isset($_GET['id_member'])) ?  "value = " . date('Y-m-d\TH:i', strtotime($result[0]["tgl_mendaftar"])) . "" : "value = '' "; ?> required> <br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    Tanggal Terakhir Bayar   
                </div>
                <div class="col" style="width: 250px;">
                    <input type="date" name="tgl_terakhir_bayar" <?php echo (isset($_GET['id_member'])) ?  "value = " . $result[0]["tgl_terakhir_bayar"] . "" : "value = '' "; ?> required><br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    <?php 
                    if (isset($_GET['id_member'])) {
                        echo "<button type=\"submit\" name=\"update\" class=\"btn btn-warning\">Update</button>";
                    }else {
                        echo "<button type=\"submit\" name=\"submit\" class=\"btn btn-success\">Tambah</button>";  
                    }
                    ?>   
                </div>
            </div>
    </form>
    </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $tgl_daftar = date_create($_POST['tgl_daftar']);
        $tgl_daftar = date_format($tgl_daftar, "Y-m-d H:i:s");
        tambahdatamember($_POST['nama_member'], $_POST['nomor_member'], $_POST['alamat'], $tgl_daftar, $_POST['tgl_terakhir_bayar']);
    }
    if (isset($_POST['update'])) {
        $tgl_daftar = date('Y-m-d H:i:s', strtotime($_POST['tgl_daftar']));
        updatemember($_GET['id_member'], $_POST['nama_member'], $_POST['nomor_member'], $_POST['alamat'], $tgl_daftar, $_POST['tgl_terakhir_bayar']);
    }
    ?>

</body>

</html>