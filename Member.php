<?php
session_start();
if (!isset($_SESSION['nomor_member'])) {
    header("Location: ErrorPage.php");
}
require('./Model.php');
if (isset($_GET['id_member'])) {
    hapusmember($_GET['id_member']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan | Member</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles.css">

</head>
<body class="body bg-secondary">
    
<?php
        $title1 = 'member';
        include('Template.php');
    ?>

    <div class="container mt-4">   
    <a href="FormMember.php" class="btn btn-success">Tambah Data</a>
    </div>

    <div class="container" style="width:fit-content">
        <table class="table table-bordered table-striped table-dark">
            <tr>
                <th>Id Member</th>
                <th>Nama Member</th>
                <th>Nomor Member</th>
                <th>Alamat</th>
                <th>Tanggal Mendaftar</th>
                <th>Tanggal Terakhir Bayar</th>
                <th>Aksi</th>
            </tr>
            <?= viewData("member") ?>
    </div>


</body>
</html>