<?php require('./Model.php');

    session_start();
    if(!isset($_SESSION['AdminLoginId'])){
        header("location:error.php");
    }

    if (isset($_GET['id_buku'])) {
    editbuku();
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

   <?php echo (isset($_GET['id_buku'])) ? "<title>Update Data | Buku</title>": "<title>Tambah Data | Buku</title>" ?> 
</head>

<body class="body bg-secondary">

    <?php
        $title1='FormBuku';
        include('./Template.php')
    ?>

    <div class=" p-3 container mt-5 center bg-dark text-white" style="width: fit-content;">
    <div class="border border-light p-2">
    <form action="" method="post">

            <div class="row">
                <div class="col" style="width: 250px">
                    Judul Buku    
                </div>
                <div class="col" style="width: 250px;">
                    <input type="text" id="judul" name="judul" <?php echo (isset($_GET['id_buku'])) ?  "value = " . $result[0]["judul_buku"] . "" : "value = '' "; ?> required placeholder="Judul Buku"> <br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    Nama Penulis    
                </div>
                <div class="col" style="width: 250px;">
                    <input type="text" name="penulis" <?php echo (isset($_GET['id_buku'])) ?  "value = " . $result[0]["penulis"] . "" : "value = '' "; ?> required placeholder="Nama Penulis"> <br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    Penerbit    
                </div>
                <div class="col" style="width: 250px;">
                    <input type="text" name="penerbit" <?php echo (isset($_GET['id_buku'])) ?  "value = " . $result[0]["penerbit"] . "" : "value = '' "; ?> required placeholder="Penerbit"> <br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    Tahun Terbit   
                </div>
                <div class="col" style="width: 250px;">
                    <input type="text" name="tahunterbit" <?php echo (isset($_GET['id_buku'])) ?  "value = " . $result[0]["tahun_terbit"] . "" : "value = '' "; ?> required placeholder="Tahun Terbit"> <br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    <?php 
                    if (isset($_GET['id_buku'])) {
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
        tambahdatabuku($_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahunterbit']);
    }
    else if (isset($_POST['update'])) {
       updatebuku($_GET['id_buku'],$_POST['judul'],$_POST['penulis'],$_POST['penerbit'],$_POST['tahunterbit']);
    }
    ?>

</body>

</html>