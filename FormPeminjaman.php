<?php
session_start();
if (!isset($_SESSION['nomor_member'])) {
    header("Location: ErrorPage.php");
}

require('./Model.php');

if (isset($_GET['id_peminjaman'])) {
    editpeminjaman();
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
    
   <?php echo (isset($_GET['id_peminjaman'])) ? "<title>Update Data | Buku</title>": "<title>Tambah Data | Buku</title>" ?> 
</head>

<body class="body bg-secondary">

    <?php
        $title1='FormPeminjaman';
        include('./Template.php')
    ?>

    <div class=" p-3 container mt-5 center bg-dark text-white" style="width: fit-content;">
    <div class="border border-light p-2">
    <form action="" method="post">

            <div class="row">
                <div class="col" style="width: 250px">
                    Tanggal Peminjaman    
                </div>
                <div class="col" style="width: 250px;">
                    <input type="date" name="tgl_peminjaman" <?php echo (isset($_GET['id_peminjaman'])) ?  "value = " . $result[0]["tgl_peminjaman"] . "" : "value = '' "; ?> required> <br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    Tanggal Pengembalian    
                </div>
                <div class="col" style="width: 250px;">
                    <input type="date" name="tgl_kembali" <?php echo (isset($_GET['id_peminjaman'])) ?  "value = " . $result[0]["tgl_kembali"] . "" : "value = '' "; ?> required> <br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    <?php 
                    if (isset($_GET['id_peminjaman'])) {
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
        tambahdatapeminjaman($_POST['tgl_peminjaman'], $_POST['tgl_kembali']);
    }
    if (isset($_POST['update'])) {
        updatepeminjaman($_GET['id_peminjaman'], $_POST['tgl_peminjaman'], $_POST['tgl_kembali']);
    }
    ?>

</body>

</html>